<HTML>
<?php
//Kyle Sinhart
// code to process user's comment form to mail to myself

include_once('db_connect.php');

$email   = "reset@bulletorder.com";   
$name    = "Account Services";    

$newpass = "";

$to      = $_POST['cEmail'];

for($i = 0; $i < 8; $i++){
	$newchar = rand(0,9);
	$newpass .= $newchar;
}

$content = "You have just reset your password. Your new password is: " . $newpass . " . To update your password, got to http://cs.gettysburg.edu/~sinhky01/speedBullet/changePasswordForm.php";

$pass_update = "UPDATE customer SET password=MD5('" . $newpass . "') WHERE email='" . $to . "';";

$result=$db->query($pass_update);

$subject = "Password Reset";

$header  = "From: $name <$email>\r\n";

$result2  = mail($to, $subject, $content, $header);

if ($result2 == FALSE) {
    echo "<P>Comment was not sent</P>\n";
}
else {
    echo "<P>Comment was sent successfully</P>\n";
}


echo $newpass;
echo $content;
?>
</HTML>

