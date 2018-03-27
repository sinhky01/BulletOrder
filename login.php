<?php

// function back_home(){
//   print 'working on it';
//   header("Location:landing.php");
//   exit;
// }
//

include_once('db_connect.php');

// print_r($_POST);  // $_GET when user send through GET method
$email = $_POST['email'];
$password = $_POST['password'];

// $pass_return = 'SELECT MD5("password") FROM customer WHERE email = "'. $email .'";';

$pass_return = "SELECT * FROM customer WHERE email='" . $email . "' AND password=MD5('" . $password . "');";

$result1 = $db->query($pass_return);

$pass = $result1->fetch();

print $pass['email'];
if ($email == $pass['email']) {
  print "<h1>Password correct going back to home page</h1>";
  // print "<div action = 'redirect.php'><input type = 'submit' value = 'home'/></div>";
}
else{
  print "<h1>Password incorrect going back to home page</h1>";
  // print "<div action = 'redirect.php'><input type = 'submit' value = 'home'/></div>";
}

?>
