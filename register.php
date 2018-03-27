<!DOCTYPE HTML>
<!--
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu
//register.php contains all the fields for user information to be added to the SQL database
-->
<HTML>
<HEAD>

<TITLE>Sign Up for Speeding Bullet!</TITLE>

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
	color: black;
	font-weight: bold;
    	padding: 250px;

}

</STYLE>

</HEAD>

<BODY>
<H1> Welcome to Speeding Bullet! </H1>

<DIV class="container">

<DIV class="row">
<DIV class="col-md-12">
<FORM method='POST' action="addUser.php">
<INPUT type='text' name='name' placeholder='Name' /> <BR />
<INPUT type='text' name="id" placeholder='Student ID'/> <BR />
<INPUT type='text' name='email' placeholder='E-mail' /> <BR />
<INPUT type='text' name='phonenum' placeholder='Phone #'/> <BR />
<INPUT type ='password' name='password' placeholder='Password' />
<BR />
<INPUT type='submit' value='Sign Up' /> 
</FORM>
</DIV>
<DIV class="col-md-12"><P class="gray" >CS360 Spring 2018</P></DIV>
</DIV> <!-- closes row 1 -->

</DIV> <!-- closes container -->

</BODY>
</HTML>

