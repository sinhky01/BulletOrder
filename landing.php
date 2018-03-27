<?php
//landing.php is the main page where a user can enter there information or register for a new login
// phpinfo();
include_once("db_connect.php"); //$db

$qStr = "SELECT * FROM customer;";
$t1Data = $db->query($qStr);

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
  <title> Bullet order </title>
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
				<A HREF="http://www.cs.gettysburg.edu/~sinhky01/speedBullet/register.php">Register Now!</A>
-->
      </tr>
			<tr>
				<td/>
				<td><A HREF="http://www.cs.gettysburg.edu/~sinhky01/speedBullet/register.php">Register Now!</A></td>
			</tr>
    </table>
  </form>

</body>
</html>
