<?php
include("./php/helperFunctions.php");

$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);

$id = $_GET['id'];
$response = getItemInfo($link, $id);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lan="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kudu Mart</title>

	<!-- BootStrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/e351a758ee.js" crossorigin="anonymous"></script>

	<!-- Custom Style -->
	<link rel="stylesheet" type="text/css" href="./css/item_page.css">

	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
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
			<p id="item_info"><?php echo $response['DESCRIPTION']?></p>
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

</body>
</html>