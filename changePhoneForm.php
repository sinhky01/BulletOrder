<?php
include_once("db_connect.php");

session_start();
$email = $_SESSION["email"];
echo "<P>Useremail: " .  $email  . "</P>\n";

if(isset($_GET['link']) && !empty($_GET['link'])){
	//$reset_link = mysql_escape_string($_GET['link']);
	//print $reset_link;
}
$op = $_GET['op'];
if ($op == 'update') {
	// if(isset($_GET['link']) && !empty($_GET['link'])){
	// 	$reset_link = mysql_escape_string($_GET['link']);
	// }
	changePhoneNum($_POST, $reset_link);
}

//Abby Shope
function changePhoneNum($data, $reset_link) {
	global $db;
	$newNum = $data['newNum'];
	$oldNum = $data['oldNum'];
	if (FALSE) {
		//TODO add error checking on phone number
	}	//TODO location!!!
	else {
		$pass_return = "SELECT * FROM customer WHERE phonenum='" . $oldNum . "' AND email='" . $email . "';";
		print $pass_return;
		$result = $db->query($pass_return);
		if ($result == FALSE) {
			print "error, could not update phone number";
		}
		else {
			$info = $result->fetch();
			$update_phone = "UPDATE customer SET phonenum='" . $newNum . "' WHERE email='" . $email . "';";
			if ($db->query($update_phone) != FALSE) {
				print "phone number updated successfully";
			}
			else {
				print "phone number could not be updated";
			}
		}
	}
}
?>

<HTML>
	<HEAD>

		<TITLE>Change Phone Number</TITLE>

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
					p.gray {
						padding: 50px;
						font-size: 25px;
						font-weight: bold;
						text-align: center;
						background: #dbdfe5;
						font-family: arial;
					}
					h1 {
						text-align: center;
						color: #002F6C;
						font-family: arial;
					}
					body {
						text-align: center;
						font-family: arial;
					}
					input {
						margin-bottom: 8px;
					}
					form {changePasswordForm.php?op=update&link=". $reset_link
						background: #002F6C;
						font-family: arial;
						color: black;
						font-weight: bold;
						padding: 250px;
					}
					</STYLE>

				</HEAD>

				<BODY>
					<H1> Update Phone Number </H1>

					<DIV class="container">

						<DIV class="row">
							<DIV class="col-md-8">
								<FORM method='POST' action=<?php echo "changePhoneForm.php?op=update&link=". $reset_link?> <!--?op=update-->
									<INPUT type='text' name='oldNum' placeholder='Enter Old Phone Number'/> <BR />
									<INPUT type='text' name="newNum" placeholder='Enter New Phone Number'/> <BR />
									<BR />
									<INPUT type='submit' value='Update Phone Number!' />
								</FORM>
							</DIV>
							<DIV class="col-md-4"><P class="gray" >CS360 Spring 2018</P></DIV>
						</DIV> <!-- closes row 1 -->

					</DIV> <!-- closes container -->

				</BODY>
</HTML>
