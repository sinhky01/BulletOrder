<?php
include_once("db_connect.php");

session_start();
$email = $_SESSION["email"];
// echo "<P>Useremail: " .  $email  . "</P>\n";

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
//updates user phone number
function changePhoneNum($data, $reset_link) {
	global $db;
	$newNum = $data['newNum'];
	$oldNum = $data['oldNum'];
	if (FALSE) {
		//TODO add error checking on phone number
	}
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
					/*for all paragraphs*/
					th, td {
						color: #002F6C;
						padding: 20px;
						align: center;
						border: none;
						border-bottom: 1px solid #d3d3d3;
						}    table td+td {
							text-align: right;
						}
						tr:hover {
							background-color: #f3f3f3;
						}
						table {
							border-collapse: collapse;
							border: none;
							align: center;
						}
						.submit_button{
							float: center;
						}
						body {
							background-color: white;
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

						body {
							background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.3) 100%), url("bulletbg.jpeg");
							background-color: #dbdfe5;
							background-size: 100%, 90%;
							padding-left: 10%;
							padding-right: 10%;
							text-align: center;
						}

						.newbutton {
							background-color: #E87722;
							border: none;
							color: white;
							padding: 15px 32px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;
							margin: 4px 2px;
							cursor: pointer;
						}
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

						input {
							margin-bottom: 8px;
						}

						form {
							background: #002F6C;
							font-family: arial;
							color: black;
							font-weight: bold;
							padding: 250px;

						}

						</STYLE>

					</HEAD>

					<BODY>
						<nav class="navbar navbar-light" style="background-color: #002F6C;">
							<div class="container-fluid">
								<div class="navbar-header">
									<a class="navbar-brand" href="#">BulletOrder</a>
								</div>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="logout.php">Logout</a></li>
									<li><a href="order_menu.php">Order Page</a></li>
									<li><a href="past_orders.php">Past Orders</a></li>
									<li><a href="profile.php">Profile</a></li>
								</ul>
							</div>
						</nav>

						<H1> Update Phone Number </H1>
						<!-- Abby Shope -->
						<DIV class="container">

							<DIV class="row">
								<DIV class="col-md-8">
									<FORM method='POST' action=<?php echo "changePhoneForm.php?op=update&link=". $reset_link?> <!--?op=update-->
										<INPUT type='text' name='oldNum' placeholder='Enter Old Phone Number'/> <BR />
										<INPUT type='text' name="newNum" placeholder='Enter New Phone Number'/> <BR />
										<BR />
										<INPUT class = "newbutton" type='submit' value='Update Phone Number!' />
									</FORM>
								</DIV>
								<DIV class="col-md-4"><P class="gray" >CS360 Spring 2018</P></DIV>
							</DIV> <!-- closes row 1 -->

						</DIV> <!-- closes container -->

					</BODY>
				</HTML>
