<?php

ob_start(); //ensure everything is done
session_start(); //login session

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
	$_SESSION["email"] = $pass['email'];
  $url = phpLink('profile.php');
  while (ob_get_status()){
      ob_end_clean();
  }
  header( "Location: $url" );

}
else{
  print "<h1>Password incorrect going back to home page</h1>";
  $url = phpLink('landing.php?password=-1');
  while (ob_get_status()){
      ob_end_clean();
  }
  header( "Location: $url" );
}


?>
<?php
function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    echo $page_link;
    return $page_link;
}
?>



<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
