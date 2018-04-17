<?php
include_once("db_connect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$cost = $_POST['cost'];
$photo = $_POST['photo'];

$str="INSERT INTO food VALUES(" . $id . ",'" . $name ."'," . $cost . ",'" . $photo . "');";
$str2="INSERT INTO food_category VALUES(".$id.",'meal');";

$result1 = $db->query($str);
$result2 = $db->query($str2);
?>
