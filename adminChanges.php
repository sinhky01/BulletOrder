<?php
include_once("db_connect.php");
function addMenuItem($data){
	global $db;

	$id = $data['id'];
	$name = $data['name'];
	$cost = $data['cost'];
	$photo = $data['photo'];

	$str="INSERT INTO food VALUES(" . $id . ",'" . $name ."'," . $cost . ",'" . $photo . "');";
	$str2="INSERT INTO food_category VALUES(" . $id . ",'meal');";

	$result1 = $db->query($str);
	$result2 = $db->query($str2);
	if ($result1 != FALSE && $result2 != FALSE) {
		print "<p>new Menu item " . $name . " has been added.</p>";
	}
	else {
		print "<p>something terrible happened</p>";
	}
}

function deleteUser($data){
	global $db;
	
	$email = $data['email'];

	$str="DELETE FROM customer WHERE email='". $email ."';";
	
	$result=$db->query($str);

	if ($result != FALSE ) {
		print "<p>user " . $name . " has been deleted.</p>";
	}
}

?>
