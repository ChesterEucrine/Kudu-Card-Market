<?php
#include("./php/getUser.php");i
include("./php/helperFunctions.php");
include("./php/sessionHelper.php");

$helper = new HelperFunctions;
#echo $name;
$id = $_GET['id'];
$response = $helper->getItemInfo($id);

$resp = getUserSession();


/*if ($response['ERROR'] === true)
	if (isset($name))
		header("location: ../homepage.php");
	else
		header("location: ../index.php");
*/
$message = "please login first";
if(isset($_POST['buy_btn'])) { 
	if ($resp['code'] === 0) {
		#echo $resp['name'];
		if ($helper->buyItem($id, $resp['name']) === 0)
			$message = "Transaction Successfull";
		else
			$message = "Transaction Failed";
		echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./homepage.php');
			</script>" ;
	} else {
		#echo "set user";
		echo "
			<script type='text/javascript'>
				alert('$message');
				window.location.replace('./index.php');
			</script>" ;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kudu Mart</title>

	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

	<!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/e351a758ee.js" crossorigin="anonymous"></script>

	<!-- Custom Style -->
	<link rel="stylesheet" type="text/css" href="./css/item_page.css">

	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- Navbar CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/navbar_.css">
	<link rel="stylesheet" type="text/css" href="https://lamp.ms.wits.ac.za/~s1965919/Kudu-Card-Market/css/dropbox.css">
	

	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	
</head>
<body>

	<div class="navbar">
		<a href="./homepage.php" class="tablinks active"><i class="fa fa-fw fa-home"></i>Home</a>

           
		<div id="cart" style="float:left; color:white">
			<a>Cart<span class="price" style="color:white"><i class="fa fa-shopping-cart"></i> <b id="cartNumber">0</b></span></a>
	        </div>
	
	
		<div class="dropdown">
	                 <button class="dropbtn" style="width:auto;"><b id="username"> <?php echo $resp['name'] ?> 
               		 </b>
               		 <i class="fa fa-caret-down"></i>
               		 </button>
               		 <div class="dropdown-content">

                       		 <a>Balance: R<b id="balance"> <script>
                       			 var balance = "<?php
                               		 include('php/getBalance.php');
                               		 echo $login_balance;
                               		 ?>";
                       			 document.getElementById("balance").innerHTML = balance;
                       			 </script>        
                       			 </b>
				 </a>

                        <a href="./history_page.html">
                       		 <i class="fa fa-fw fa-user"></i>History
                        </a>

                        <a href="./logout.php" class="tablinks">
                       		 <i class="fa fa-fw fa-home"></i> logout
                        </a>

                </div>
            </div>
		
	<img src="images/defaultIcon.jpg" style="dispay: inline-block;" width="44px" height="44px">
         
 
        </div>	

	

        <div id = "name_div" class="item-title" >
            <!--i class="fa fa-shopping-bag"></i--><h1 id="name"><?php echo $response['NAME'] ?></h1>
            <!--a class="tablinks" onclick="main(event,'search')"><i class="fa fa-fw fa-search"></i> Search</a>
            <a onclick="document.getElementById('login').style.display='block'" style="width:auto;">
                <i class="fa fa-fw fa-user"></i> Login
            </a>
	    <div class="topnav-right">
              <a class="tablinks"><i class="fas fa-user-alt"></i>Hello, User</a>
            </div>
            <div>
              <span id="user-text">Hello, User</span>
            </div-->
        </div>
	<div id="price_div">
	    <h4><?php echo 'R '.$response['PRICE']?><h4>
	</div>

	<div class="column">
		<div id="image_div" class="card">
			<img alt="Item image" id="image" width="500" height="400" src=<?php echo $response['URL']; ?>>;
		</div>
		<div id="item_info" class="container">
			<h6>DESCRIPTION</h6>
			<p id="item_info"><?php echo $response['DESCRIPTION']?></p>
		</div>
		<div id="item_info" class='container'>
			<h6>QTY:</h6>
			<p><?php echo $response['QTY']?></p>
		</div>
		<div id="item_info" class="container">
			<form method="post"> 
        			<input type="submit" name="buy_btn" value="BUY"/>
			</form>
		</div>
	</div>

	<script>
		/*var options = window.location.search.slice(1)
                      .split('&')
                      .reduce(function _reduce (/*Object* a, /*String* b) {
                        b = b.split('=');
                        a[b[0]] = decodeURIComponent(b[1]);
                        return a;
                      }, {});
		options = String(options);
		console.log(options);
		var opt = options.split("?");
		console.log(opt[0]);
		console.log(opt[1]);

		var myData = JSON.parse(opt[1]);
		var para = document.getElementById("name");
		var img = document.getElementById("item_image");
		var info = document.getElementById("item_info");
		var price = document.getElementById("price");

		para.innerText = myData['NAME'];
		img.setAttribute("src", myData['IMAGE_URL']);
		info.innerText = myData['DESCRIPTION'];
		price.innerText = myData['PRICE'];*/
	</script>

          <script>
            // Get the modal
            var modal = document.getElementById('login');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
          </script>

</body>
</html>
