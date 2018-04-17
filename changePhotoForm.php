<?php
session_start();
$email = $_SESSION["email"];
echo "<P>Useremail: " .  $email  . "</P>\n";
?>


<HTML>
	<HEAD>

		<TITLE>Update Photo</TITLE>

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
						color: white;
					}
					form {
						background: #002F6C;
						font-family: arial;
						color: white;
						font-weight: bold;
						padding: 250px;
					}

				</STYLE>

			</HEAD>

			<BODY>
				<DIV>
					<H1> Update photo </H1>
				</DIV>
				<DIV class="container">

					<DIV class="row">
						<DIV class="col-md-12">
							<FORM name="fmUpload"
								method="POST"
								action="updateProfilePhoto.php"
								enctype="multipart/form-data">

								<INPUT type="file" name="profile picture"/> <BR /><BR />

								<INPUT type="submit" value="Change my photo!"/>

								</FORM>
						</DIV>
					</DIV> <!-- closes row 1 -->

				</DIV> <!-- closes container -->

			</BODY>
</HTML>

