<?php
include_once('db_connect.php');
session_start();
$email = $_SESSION["email"];
//echo "<P>Useremail: " .  $email  . "</P>\n";

$str = "SELECT * FROM customer WHERE email='" . $email . "';";


$result = $db->query($str);
$user = $result->fetch();
//print_r( $user);

if ($result == FALSE) {
	echo "invalid user";
}
else {
	$phoneNum = $user['phonenum'];
	$balance = $user['balance'];
	$image = $user['picture'];
	if ($image === NULL ) {
		//$prompt = "You don't have a profile photo yet! Upload one to the right!";
	}
	else {
	$image = "./uploaded/" . $image;
	}

}

?>


<HTML>
	<HEAD>

		<TITLE>Your Speeding Bullet Profile</TITLE>

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
						color: #002F6C;
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
					a.thick{
						color: #002F6C;
						font-weight: bold;
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
					body {
						background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.3) 100%), url("bulletbg.jpeg");
					  background-color: #dbdfe5;
					  background-size: 100%, 90%;
					  padding-left: 10%;
					  padding-right: 10%
					}

				</STYLE>

			</HEAD>

			<BODY>  <DIV class="row">
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

				</DIV>
				<DIV class="row">
					</br>
					<H1> Your Speeding Bullet Profile </H1>
				</br></br>
				</DIV>
				<DIV class="container">

					<DIV class="row">
						<DIV class="col-md-4"><P class="gray" ><?php print"<img src='".$image."' alt='upload a photo to the right!' height=128>"; ?></P></DIV>
						<DIV class="col-md-8"> <table>
							<tr><td> Current Balance: $<?php echo $balance ?> </td>
								<td> <a class="thick" href="update_balance.php">Add Money</a></td>
							</tr>
							<tr> <td> Phone number: <?php echo $phoneNum ?> </td>
								<td> <a class="thick" href="changePhoneForm.php">Update Phone Number</a></td>
							</tr>
							<tr>
							<td>  </td>
							<td> <a class="thick" href="changePasswordForm.php">Change Password</a></td></tr>

							<tr><td>  </td>
								<td> <a class="thick" href="changePhotoForm.php">Update Profile Picture</a></td>
							</tr>

							<tr><td>  </td>
								<td> <a class="thick" href="past_orders.php">Past Orders</a></td>
							</tr>
							<tr><td>  </td>
								<td> <a class="thick" href="logout.php">Logout</a></td>
							</tr>
						</table></DIV>
					</DIV> <!-- closes row 1 -->
					<DIV class="row">
						<DIV class="col-md-13"><P class="gray" >CS360 Spring 2018 </br> Abby Shope </br> Ruiwen Fu </br> Kyle</P></DIV>
				</DIV> <!-- closes row 2 -->

				</DIV> <!-- closes container -->

			</BODY>
</HTML>
