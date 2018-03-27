<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
//addUser connects to the SQL database and adds the information from register.php
include_once('db_connect.php');

print_r($_POST);

$id = $_POST['id']; 
$name = $_POST['name']; 
$email = $_POST['email']; 
$phonenum = $_POST['phonenum']; 

$passW = $_POST['password'];
//$passH = password_hash($passW, PASSWORD_DEFAULT); 


$add1 = "INSERT INTO customer VALUE(" . $id . ", '" . $name . "',MD5('" . $passW . "'), " . $phonenum . ", '" . $email . "', 15, 100);";


print $add1;
//print $add2;

$result1 = $db->query($add1);
//$result2 = $db->query($add2);

if($result1 != FALSE){// && $result2 != FALSE){
	print "<p>new user named " . $name . " has been added.</p>";
}


?>
