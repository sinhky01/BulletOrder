<?php
	include_once("db_connect.php");

	include("changePassword.php");

	$op = $_GET['op'];
	if ($op == 'update') {
		changePassword($_POST);
	}

?> 

<HTML>
<HEAD>

<TITLE>Change Password</TITLE>

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
<H1> Update Password </H1>

<DIV class="container">

<DIV class="row">
<DIV class="col-md-8">
<FORM method='POST' action="changePasswordForm.php?op=update">
<INPUT type='text' name='email' placeholder='Enter email'/> <BR />
<INPUT type='password' name='curPassword' placeholder='Current Password' /> <BR />
<INPUT type='password' name="newPassword1" placeholder='New Password'/> <BR />
<INPUT type='password' name='newPassword2' placeholder='Reenter New Password' /> <BR />
<BR />
<INPUT type='submit' value='Update Password!' /> 
</FORM>
</DIV>
<DIV class="col-md-4"><P class="gray" >CS360 Spring 2018</P></DIV>
</DIV> <!-- closes row 1 -->

</DIV> <!-- closes container -->

</BODY>
</HTML>
