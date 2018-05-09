<?php
session_start();
$email = $_SESSION["email"];
if ($email == null){
	$url = phpLink('landing.php?');
	header( "Location: $url" );
}

function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    echo $page_link;
    return $page_link;
}

?>


<HTML>
	<!-- Most of this was Abby with some minor additions by ruiwen -->
	<HEAD>

		<TITLE>Update Photo</TITLE>

		<META name="viewport" content="width=device-width, initial-scale=1">

			<LINK rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<LINK rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

					<SCRIPT src="js/jquery-1.11.3.min.js"> </SCRIPT>
					<SCRIPT src="js/bootstrap.min.js">     </SCRIPT>

					<STYLE type="text/css">
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
				      padding-right: 10%
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
				<nav class="navbar navbar-light" style="background-color: #002F6C;">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">BulletOrder</a>
						</div>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php"><?php
			        session_start(); //login session
			        if ($email == NULL){
			          echo "Login";
			        }
			        else{
			          echo "Logout";
			        }
			        ?></a></li>
							<li><a href="order_menu.php">Order Page</a></li>
							<li><a href="past_orders.php">Past Orders</a></li>
							<li><a href="profile.php">Profile</a></li>
						</ul>
					</div>
				</nav>

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
								<center>
								<INPUT class="newbutton" type="file" name="profilepicture"/> <BR /><BR />
							</center>

								<INPUT class="newbutton" type="submit" value="Change my photo!"/>

								</FORM>
						</DIV>
					</DIV> <!-- closes row 1 -->

				</DIV> <!-- closes container -->

			</BODY>
</HTML>
