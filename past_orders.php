<?php
session_start();

include_once("db_connect.php");
$email = $_SESSION["email"];
$find_id = "SELECT id FROM customer WHERE email='". $email ."';";
$result1 = $db->query($find_id);
$id = $result1->fetch();

$find_orders = "SELECT * FROM orders WHERE cid = " . $id[0] .";";
$result2 = $db->query($find_orders);
$orders = $result2->fetch();

$len = sizeof($orders);

for ($i = 0; $i < $len; $i = $i + 1){
    print $orders[$i];
}

?>
