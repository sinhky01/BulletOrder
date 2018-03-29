
<HTML>
<HEAD>
<TITLE> PASSWORD </TITLE>
</HEAD>
<BODY>

<?php
//Abby Shope

include_once('db_connect.php');

//print_r($_POST);

function changePassword($data) {

global $db;

$email = $data['email'];
$curPassword = $data['curPassword'];
$newPassword1 = $data['newPassword1'];
$newPassword2 = $data['newPassword2'];

if ($newPassword1 != $newPassword2) {
	print "new passwords do not match";
}
else {
	$pass_return = "SELECT * FROM customer WHERE email='" . $email . "' AND password=MD5('" . $curPassword . "');";
	//print $pass_return;	
	$result = $db->query($pass_return);
	if ($result == FALSE) {
		print "error, could not update password";
	}
	else {  
	$pass = $result->fetch();
	$user_id = $pass['id'];
	$update_password = "UPDATE customer SET password=MD5('" . $newPassword1 . "') WHERE id=$user_id;";
	//print $update_password;
	
		if ($db->query($update_password) != FALSE) {
			print "password updated successfully";
		}
		else {
			print "password could not be updated";
		}	
	}
}
}
?>
</BODY>
</HTML>
