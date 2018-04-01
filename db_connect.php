<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
//connects to the SQL database
$host = "ada.cc.gettysburg.edu";
$dbase = bullet_s18;
$user = sinhky01;
$pass = sinhky01;


try{
	$db = new PDO("mysql:host=$host;dbname=$dbase",$user,$pass);
}

catch(PDOException $e){
	die("Error connecting to MYSQL server: ". $e->getMessage());
}
?>
