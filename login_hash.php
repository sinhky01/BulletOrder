<?php

include_once('db_connect.php');

// print_r($_POST);  // $_GET when user send through GET method
$email = $_POST['email'];
$password = $_POST['password'];
print password_hash("1234", PASSWORD_DEFAULT);

// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
// print $hashed_password;
// $pass_return = 'SELECT password FROM customer WHERE email = "'. $email .'";';
//
// $result1 = $db->query($pass_return);
//
// $pass = $result1->fetch();
//
// $verify = password_verify($pass['password'], $hashed_password);
//
// if ($verify) {
//   print "<h1>Password correct going back to home page</h1>";
// }
// else{
//   print "<h1>Password incorrect going back to home page</h1>";
// }

?>
