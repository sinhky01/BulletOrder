<?php
//Kyle Sinhart
//Abagale Shope
//Ruiwen Fu

include_once('db_connect.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['key']) && !empty($_GET['key'])){
  $email = mysql_escape_string($_GET['email']); // Set email variable
  $key = mysql_escape_string($_GET['key']); // Set hash variable

  $return = "SELECT * FROM customer WHERE email='" . $email . "' AND key_confirm='" . $key . "';";

  $result1 = $db->query($return);

  $pass = $result1->fetch();

  if ($email == $pass['email']) {
    print "<h1>Verification success</h1>";
    print "<h1>your account has been confirmed.</h1>";
    $clear = "UPDATE customer SET key_confirm = '-1', confirm = 1 WHERE email = '" . $email . "' ;";
    $result2 = $db->query($clear);
    $url = phpLink('landing.php');		
    print "<A href='" . $url . "' >Click here for landing page. ---</A>";
  }
  else{
    print "<h1>Verification failed</h1>";
    // link to login page
  }
}else{
  print "<h1>invalid verification link</h1>";
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
