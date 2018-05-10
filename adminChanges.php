<?php
//Kyle SInhart
//functions for adminMenu to use
include_once("db_connect.php");
session_start();
$email = $_SESSION['email'];
if($email==null){
	echo "<p> Invalid user account.</p\n>";
  $url = phpLink('profile.php');
  header( "Location: $url" );
}

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

//delete user account(kyle), also delete user's past orders (Ruwien)
function deleteUser($data){
	global $db;
	foreach ($_POST['cb'] AS $id){
		$str1 = "SELECT email FROM customer WHERE id='" . $id . "'";

		$result1 = $db->query($str1);
		$demail = $result1->fetch();

		$str="DELETE FROM customer WHERE id='". $id ."';";

		$result=$db->query($str);

		$str2="DELETE FROM orders WHERE cid='". $demail[0] ."';";

		$result2=$db->query($str2);

		if ($result != FALSE && $result2 != FALSE) {
			print "<p>user " . $id . " has been deleted.</p>";
		}
	}
	if ($end = 1){
		$_SESSION["email"] = "";
		session_destroy();
		$url = phpLink('landing.php?logout=1');
		header( "Location: $url" );
	}

}

?>
