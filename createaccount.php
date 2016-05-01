<?php
//Model
include($_SERVER['DOCUMENT_ROOT']."/coffeeshop/coffeeshop_model.php");

//Controller
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	create_account($_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['email'], $_POST['password']);
	$url = "Location: http://" . $_SERVER['HTTP_HOST'] . 
		dirname($_SERVER['PHP_SELF'])
			. "/index.php";
	header($url);
	exit();
}

//View
include($_SERVER['DOCUMENT_ROOT'].'/coffeeshop/createaccount_view.html');
?>