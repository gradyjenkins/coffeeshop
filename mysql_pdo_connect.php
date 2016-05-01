<?php


$dbusername = "root";
$dbpassword = "root";
$hostname = "localhost"; 
$dbname = "SE_357_Coffeeshop_ER_Model";

//connection to the database
$db = new PDO('mysql:host=localhost:8889;dbname=SE_357_Coffeeshop_ER_Model;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  
?>
  