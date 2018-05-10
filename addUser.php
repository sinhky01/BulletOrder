<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
//addUser connects to the SQL database and adds the information from register.php
include_once('db_connect.php');

// function that make links works on different folder names even different servers.
function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    //echo $page_link;
    return $page_link;
}
?>
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
<BODY>
<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
//addUser connects to the SQL database and adds the information from register.php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phonenum = $_POST['phonenum'];

$passW = $_POST['password'];
$passW = md5($passW);
//$passH = password_hash($passW, PASSWORD_DEFAULT);
$key = $name . $email . date('mY');
$key = md5($key);

$add1 = "INSERT INTO customer VALUE(" . $id . ", '" . $name . "', '". $passW . "', " . $phonenum . ", '" . $email . "', 15, 100, 0, '" . $key . "', 1, 'logo.png', 0);";

$result1 = $db->query($add1);
//$result2 = $db->query($add2);

if($result1 != FALSE){// && $result2 != FALSE){
  //print "<p>new user named " . $name . " has been added.</p>";



  // confirmation email
  $e_email = "reset@bulletorder.com";
  $e_name = "Account Services"; //$from
  $c_link = phpLink('confirm.php?email='. $email . '&key=' . $key);
  $e_content = "You have successfully signed up for Speed Bullet. Click the following link to confirm your account.\n" . $c_link;
  $to = $email;
  $subject = "Confirm your account on bulletorder!";

  $header = "From: $e_name <$e_email>\r\n";
  $result = mail($to, $subject, $e_content, $header);

  if ($result == FALSE){
    echo "<p> A confirmation Email was not sent, Invalid user info.</p\n>";
    $url = phpLink('register.php');
    header( "Location: $url" );

  }
  else {
    echo "<p> A confirmation Email was sent, please check your email.</p\n>";
		$url = phpLink('landing.php');
		print "<A href='" . $url . "' >Click here for landing page. ---</A>";
  }
}
else{
  echo "<p> Invalid user account.</p\n>";
  $url = phpLink('register.php?success=-1');
  header( "Location: $url" );
}
?>
</BODY>
</HTML>
