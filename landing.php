<?php
//landing.php is the main page where a user can enter there information or register for a new login
// phpinfo();
include_once("db_connect.php"); //$db

if(isset($_GET['password']) && !empty($_GET['password'])){
  $success = mysql_escape_string($_GET['password']); // Set email variable
}
if(isset($_GET['email']) && !empty($_GET['email'])){
  $f_email = mysql_escape_string($_GET['email']);
}
$qStr = "SELECT * FROM customer;";
$t1Data = $db->query($qStr);

?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    return $page_link;
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
  <STYLE type="text/css">
	h2 {
		text-align: center;
		color: #00437C;
		font-family: arial;
		font-size: 58px;
	}
	table {
 		width: 20%;
 		position: relative;
  		float: right;
		color: #776E64;
	}
	table td{
  		width: 50%;
  		text-align: right;
	}
	body {
		height: 100%;
   		background-repeat: no-repeat;
   		background-attachment: scroll;
	}
	.bg {
		height: 100%;
	}
  </STYLE>
</head>
<body>
  <h2>Welcome to Speeding Bullet!</h2>

  <div class = "logo">
    <img src="logo.png" alt="Logo">
  </div> 

  <form method = "post" action = "login.php">
    <table class = "table">    

      <tr>
        <td colspan="3" style="color:red;"> <?php
        if ($success == -1){
          echo "Invalid Email ! Retry !";}
        else if ($success == -2){
          echo "Invalid Password ! Retry !";}
          ?></td>
      </tr>
      <tr>
        <td/>
        <td> Login </td>
      </tr>
      <tr>
        <td> Email </td>
        <td><input type = 'text' name = 'email' placeholder = 'enter your email' autocomplete="on" value = '<?php echo $f_email;?>'/></td>
      </tr>
      <tr>
        <td> Password </td>
        <td><input type = 'password' name = 'password' placeholder = 'enter your password' /></td>
      </tr>
      <tr>
				<td/>
        <td><input type = 'submit' value = 'Login'/></td>
				</form>
        <!--<td><input type = 'button' value = 'Register'/></td>
				<A HREF="http://www.cs.gettysburg.edu/~furu01/bullet/register.php">Register Now!</A>
-->
      </tr>
			<tr>
				<td/>
				<FORM method="post" action="register.php">
				<td><input type = 'submit' value = 'Register'/></td>
				</FORM>
			</tr>
		  <tr>
				<td/>
				<FORM method="post" action="forgetPass.html">
				<td><input type = 'submit' value = 'Forgot Password'/></td>
				</FORM>
			</tr>
    </table>

</body>
</html>
