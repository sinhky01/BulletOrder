<?php

include_once("db_connect.php");


$cid = 543453;
$order_status = 2;
$location = "bullet001";

$time =  date("h-i-s") .  date("-Y-m-d");
print $time;
$add1 = "INSERT INTO orders(cid, order_status, location) VALUES (".$cid.",". $order_status.",'".  $location . "');";
print "\n" . $add1;
$result1 = $db->query($add1);
if($result1 != FALSE){
  print "<p>added.</p>";
}
else{
  print "<p>not added.</p>";
}




?>
