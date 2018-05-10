<HTML>
	<HEAD>

		<TITLE>Welcome</TITLE>

		<META name="viewport" content="width=device-width, initial-scale=1">

			<LINK rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<LINK rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

					<SCRIPT src="js/jquery-1.11.3.min.js"> </SCRIPT>
					<SCRIPT src="js/bootstrap.min.js">     </SCRIPT>

					<STYLE type="text/css">
					/*for all paragraphs*/
					p {
						padding: 100px;
						background: #002F6C;
						color: white;
						font-family: arial;
						text-align: center;
					}
					body {
						color: #002F6C;
					}
					p.gray {
						padding: 20px;
						font-size: 15px;
						font-weight: bold;
						text-align: center;
						background: #dbdfe5;
						font-family: arial;
					}
					h1 {
						text-align: center;
						color: #002F6C;
						font-family: arial;
						font-size: 72px;
					}
					body {
						text-align: center;
						font-family: arial;
					}
					input {
						margin-bottom: 8px;
					}
					form {
						background: #002F6C;
						font-family: arial;
						color: white;
						font-weight: bold;
						padding: 250px;
					}
					td {
						padding-top: 12px;
						padding-bottom: 9px;
					}
					table td+td {
						text-align: right;
					}
					table {
						font-size: 20px;
						width: 100%;
					}
					ul {
						list-style-type: none;
						margin: 0;
						padding: 0;
						overflow: hidden;
						color: white;
						background-color: #002F6C;
					}
					li {

						float: right;
						background-color: #002F6C;
						color: white;

					}
					li a {
						display: block;
						padding: 20px 20px;
						text-align: center;
						color: white;
					}
					li a:hover {
						background-color:  #dbdfe5;
					}
					.active {
						background-color: orange;
					}
				</STYLE>
			</HEAD>


<body>
	<?php
	//Kyle Sinhart
	// code to process user's comment form to mail to myself
	//Ruiwen
	//giving a link send to user's email and allow user to change password without entering their forgotten password.

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
	$url = phpLink('landing.php');
	print "<A href='" . $url . "' >Click here for landing page. ---</A>";

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
</body>
</HTML>
