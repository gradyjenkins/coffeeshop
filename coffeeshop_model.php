<?php

$dbusername = "root";
$dbpassword = "root";
$hostname = "localhost"; 
$dbname = "JSRC";

try{
	$connection = new PDO('mysql:host=localhost:8889;dbname=SE357_Coffeeshop', 'root', 'root');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo 'ERROR' . $e->getMessage();
		}
	

function login($email, $password)
{
	global $connection;
	$query = "SELECT email, password FROM customer_portal_access_credentials WHERE email = '".$email."'  AND password = '".$password."'";
	
	$result = $db->query($query);
	$row = $result->fetchAll(PDO::FETCH_ASSOC);
	
	$results_total = count($row);
	
	if($results_total == 1)
	{
		return true;
	}else{
		return false;
		}

}

function create_account($first_name, $last_name, $phone_number, $email, $password) 
{
	global $connection; 
	
	return;
	
	$insert = $connection->prepare("INSERT INTO Customers (Customer_FirstName, Customer_LastName, Customer_Phone_No) VALUES (:Customer_FirstName, :Customer_LastName, :Customer_Phone_No)");
	
	$insert->bindParam(':Customer_FirstName', $first_name, PDO::PARAM_STR);
	$insert->bindParam(':Customer_LastName', $last_name, PDO::PARAM_STR);
	$insert->bindParam(':Customer_Phone_No', $phone_number, PDO::PARAM_STR);
	$insert->execute();
	
	$insert = $connection->prepare("INSERT INTO customer_portal_access_credentials(customer_id, email, password) VALUES (:customer_id, :email, :password)");
	
	$insert->bindParam(':customer_id', $connection->lastInsertId(), PDO::PARAM_INT);
	$insert->bindParam(':email', $email, PDO::PARAM_STR);
	$insert->bindParam(':password', $password, PDO::PARAM_STR);
	$insert->execute();
}

function create_order() 
{
	global $connection;
}

function create_order_items() 
{
	global $connection;
}

function update_account($id,$first_name,$last_name,$phone_number,$email,$password)
{
	global $connection;
	
	$update = $connection->prepare("UPDATE Customers Set Customer_FirstName = :first_name , Customer_LastName = :last_name , Customer_Phone_No = :phone_number WHERE Customer_Id = :id");
	
	$update->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	$update->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	$update->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
	$update->bindParam(':id', $id, PDO::PARAM_STR);
	$update->execute();
	
	$update = $connection->prepare("UPDATE customer_portal_access_credentials SET email = :email , password = :password WHERE Customer_Id = :id");
	
	$update->bindParam(':email', $email, PDO::PARAM_STR);
	$update->bindParam(':password', $password, PDO::PARAM_STR);
	$update->bindParam(':id', $id, PDO::PARAM_STR);
	$update->execute();
}

?>