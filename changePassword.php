
<?php
//Abby Shope

include_once('db_connect.php');
//print_r($_POST);

//checks that passwords match, updates current user password
function changePassword($data, $reset_link) {

	global $db;
	$email = $data['email'];
	$newPassword1 = $data['newPassword1'];
	$newPassword2 = $data['newPassword2'];

	if ($newPassword1 != $newPassword2) {
		print "new passwords do not match";
	}	
	else {
		$pass_return = "SELECT * FROM customer WHERE email='" . $email . "' AND reset=" . $reset_link . ";";
		$result = $db->query($pass_return);
		if ($result == FALSE) {
			print "error, could not update password";
		}
		else {
			$pass = $result->fetch();
			$user_id = $pass['id'];
			$update_password = "UPDATE customer SET password=MD5('" . $newPassword1 . "'), reset = '1' WHERE id=$user_id;";

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
