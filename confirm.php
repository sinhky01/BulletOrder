<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
include_once('db_connect.php');

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

include_once('db_connect.php');

// Ruiwen Fu
// reading the link sent to user's email account and change confirm in database into true
// disable the link.

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['key']) && !empty($_GET['key'])){
  $email = mysql_escape_string($_GET['email']); // Set email variable
  $key = mysql_escape_string($_GET['key']); // Set hash variable

  $return = "SELECT * FROM customer WHERE email='" . $email . "' AND key_confirm='" . $key . "';";

  $result1 = $db->query($return);

  $pass = $result1->fetch();

  if ($email == $pass['email']) {
    print "<h1>Verification success</h1>";
    print "<h1>your account has been confirmed.</h1>";
		$url = phpLink('landing.php');
		print "<A href='" . $url . "' >Click here for landing page. ---</A>";
    $clear = "UPDATE customer SET key_confirm = '-1', confirm = 1 WHERE email = '" . $email . "' ;";
    $result2 = $db->query($clear);
  }
  else{
    print "<h1>Verification failed</h1>";
    // link to login page
  }
}else{
  print "<h1>invalid verification link</h1>";
}
?>
</BODY>
</HTML>
