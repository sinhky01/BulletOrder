<?php
//Kyle Sinhart
include_once("db_connect.php");  // $db

include("adminChanges.php");

session_start();
$email = $_SESSION['email'];
if($email==null){
	echo "<p> Invalid user account.</p\n>";
  $url = phpLink('profile.php');
  header( "Location: $url" );
}
$str = "SELECT admin FROM customer WHERE email='" . $email . "'";

$result = $db->query($str);

if($result==0){
	echo "<p> Invalid user account.</p\n>";
  $url = phpLink('profile.php');
  header( "Location: $url" );
}

$op = $_GET['op'];

if($op=='add'){
	addMenuItem($_POST);
}
else if($op=='remove'){
	deleteUser($_POST);
}

?>

<HTML>
<HEAD>
<TITLE>Admin</TITLE>
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
	color: black;
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

<H1>Add New Menu Item</H1>

<FORM method='POST' action='adminMenu.php?op=add'>
<TABLE cellspacing='0' cellpadding='5'>
<TR>
<TD>ID: </TD>   <TD>  <INPUT type='text' name='id'   /> </TD><BR />
</TR>
<TR>
<TD>Name: </TD>  <TD> <INPUT type='text' name='name'  /></TD> <BR />
</TR>
<TR>
<TD>Cost: </TD> <TD><INPUT type='text' name='cost'  /> </TD> <BR />
</TR>
<TR>
<TD>Photo Link: </TD> <TD>  <INPUT type='text' name='photo' /> </TD>  <BR />
</TR>
<BR />
</TABLE>
<INPUT type='submit' value='Add new item' />


</FORM>

<H1>Delete User</H1>

<FORM method='POST' action='adminMenu.php?op=remove'>

<?php

$userData=$db->query("SELECT id, name FROM customer");
while ($row = $userData->fetch()) {

		$id   = $row['id'];
		$name = $row['name'];

		print "<TR>";

		print "<TD>" . $id   . "</TD>\n";
		print "<TD>" . $name . "</TD>\n";

		print "<TD><INPUT type='checkbox' name='cb[]' value='" . $id . "' /></TD>\n";

		print "</TR>\n";

	}
?>

<INPUT type='submit' value='Delete User' />
</FORM>

</BODY>
</HTML>

