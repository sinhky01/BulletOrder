<?php
//landing.php is the main page where a user can enter there information or register for a new login
// phpinfo();
include_once("db_connect.php"); //$db

if(isset($_GET['password']) && !empty($_GET['password'])){
  $pass = mysql_escape_string($_GET['password']); // Set email variable
  if ($pass == -1){
    phpAlert("invalid password!");
  }
}
$qStr = "SELECT * FROM customer;";
$t1Data = $db->query($qStr);

?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>

<html>
<head>
<!--
	<SCRIPT>
		function goToRegister(){
			header ("register.php");
		}
	</SCRIPT>
-->
  <title> Bullet Order </title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>Bullet Order</h2>

  <div class = "logo">
    <img src="logo.png" alt="Logo">
  </div>

  <form method = "post" action = "login.php">
    <table class = "table">
      <tr>
        <td/>
        <td> Login </td>
      </tr>
      <tr>
        <td> Email </td>
        <td><input type = 'text' name = 'email' placeholder = 'enter your email' /></td>
      </tr>
      <tr>
        <td> Password </td>
        <td><input type = 'password' name = 'password' placeholder = 'enter your password' /></td>
      </tr>
      <tr>
				<td/>
        <td><input type = 'submit' value = 'Login'/></td>
        <!--<td><input type = 'button' value = 'Register'/></td>
				<A HREF="http://www.cs.gettysburg.edu/~furu01/bullet/register.php">Register Now!</A>
-->
      </tr>
			<tr>
				<td/>
				<td><A HREF="http://www.cs.gettysburg.edu/~furu01/bullet/register.php">Register Now!</A></td>
			</tr>
		  <tr>
				<td/>
				<td><A HREF="http://www.cs.gettysburg.edu/~furu01/bullet/forgetPass.html">Forgot Password?</A></td>
			</tr>
    </table>
  </form>

</body>
</html>
