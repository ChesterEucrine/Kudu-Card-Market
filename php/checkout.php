<?php
include('helperFunctions.php');

session_start();

$username = "s1965919";
$password = "ICTPass1670";
$database = "d1965919";
$link = mysqli_connect("127.0.0.1", $username, $password, $database);
     	
$studentNo = $_SESSION['login_user'];
$new_bal = $_POST['NEW_BAL']; //get the calculated new user balance

//object for the helper functions class
$helper = new HelperFunctions;


$output = array();
//store all the cart items in an array
$cart_items = $helper->getCartItems($studentNo);

//get the full items from Market_NEW and add em to PURCHASES
for($i = 0; $i < count($cart_items); $i++)
{
	$id = $cart_items[$i]['MARKET_ID'];
	if($row = $helper->getItemInfo($id))
	{		
		$helper->addToPurch($studentNo, $row);

		//delete from cart the items
		$helper->deleteFromCart($studentNo, $id);	
	}

	//subtract money from the user when they check out	
	if ($result = mysqli_query($link, "update STUDENTS set KUDU_BUCKS='$new_bal' where STUDENT_NO='$studentNo';")) 
	{
		$output[] = "updated balace";
	}else
	{
		$output[] = ": Error updating balance: ";
	}	
}


echo json_encode($output);
?>
