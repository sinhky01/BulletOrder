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
	$newpass = MD5($newpass);

	$content = "You have just reset your password. To update your password, got to " . phpLink("changePasswordForm.php?link=". $newpass );

	$pass_update = "UPDATE customer SET reset='" . $newpass . "' WHERE email='" . $to . "';";

	$result=$db->query($pass_update);

	$subject = "Password Reset";

	$header  = "From: $name <$email>\r\n";

	$result2  = mail($to, $subject, $content, $header);

	if ($result2 == FALSE) {
		echo "<P>Invalid email address ! Retry !</P>\n";
	}
	else {
		echo "<P>We have reset your password, please check your email! </P>\n";
	}
	?>
	<?php
	function phpLink($page){
	    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	    $link_element = explode("/", $actual_link);
	    $curr_page = $link_element[5];
	    $page_link = str_replace($curr_page,$page,$actual_link);
	    return $page_link;
	}
	?>

</HTML>
