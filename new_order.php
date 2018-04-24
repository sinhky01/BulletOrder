<?php
include_once('db_connect.php');

session_start();
$email = $_SESSION["email"];
echo "<P>Useremail: " .  $email  . "</P>\n";
if ($email == NULL){
  print "<h1>Please login first!!!</h1>";
  $url = phpLink('landing.php?password=-3');
  header( "Location: $url" );
}

$list = $_POST['cborder'];
$cid = $email;

$order_status = 2;
$location = "bullet001";

$time =  date("his") .  date("Ymd");
print $time;
$add1 = "INSERT INTO orders(order_id, cid, order_status, location) VALUES (".$time.",'".$cid."',". $order_status.",'".  $location . "');";
print "\n" . $add1;
$result1 = $db->query($add1);

if($result1 != FALSE){
  print "<p>added.</p>";
}
else{
  print "<p>not added.</p>";
}

foreach ($list AS $id){
  $add2 = "INSERT INTO order_info(food_id, order_id) VALUES (".$id.",". $time. ");";
  print "\n" . $add2;
  $result2 = $db->query($add2);
  if($result2 != FALSE){
    print "<p>added.</p>";
  }
  else{
    print "<p>not added.</p>";
  }

}


if($result2 != FALSE){// && $result2 != FALSE){

  // confirmation email
  $e_email = "reset@bulletorder.com";
  $e_name = "Account Services"; //$from
  $e_content = "You have successfully ordered food from bulletorder.\n" . $c_link;
  $to = $email;
  $subject = "Order Confirmation!";
  foreach ($list AS $id){
    $qStr = "SELECT name, price FROM food WHERE food.food_id = ".$id.";";
    $t1Data = $db->query($qStr);
    $data = $t1Data->fetch();
    $name = $data['name'];
    $price = $data['price'];
    $total_price = $total_price + (int)$price;
    $e_content .= $name . " - ". $price . " \n";
  }
  $e_content .= "total = ". $total_price . " \n";
  $header = "From: $e_name <$e_email>\r\n";
  $result = mail($to, $subject, $e_content, $header);

  if ($result == FALSE){
    echo "<p> A confirmation Email was sent.</p\n>";
  }
  else {
    echo "<p> A confirmation Email was sent.</p\n>";
  }
}
else{
  echo "<p> Order not created.</p\n>";
}


?>
<html>
<head>
  <title>Bullet order Menu</title>
  <style type="text/css">
  table, th, td {
    border: 1px solid black;
    align: center;
  }
  .submit_button{
    float: center;
  }
</style>
</head>

<body>
  <form method="post" action="order_confirm.php">
    <table align="center" style="border: 1px solid black;width:60%;cellspacing = 0; cellpadding = 5">
      <tr>
        <th>Order List</th>
        <th>Price</th>
      </tr>
      <?php
      if ($list != null){
        $total_price = 0;
        foreach ($list AS $id){
          $qStr = "SELECT name, price FROM food WHERE food.food_id = ".$id.";";
          $t1Data = $db->query($qStr);
          $data = $t1Data->fetch();
          $name = $data['name'];
          $price = $data['price'];
          $total_price = $total_price + (int)$price;
          print "<tr>";
          print "<td>$name</td>\n";
          print "<td>$price</td>\n";
          print "</tr>";
        }
      }
      else{
        print "You have not select anything! ";
        // $url = phpLink('order_main.php');
        // header( "Location: $url" );
      }
      ?>
      <!-- </tr> -->
      <tr>
        <td colspan="3">total = <?php echo $total_price; ?></td>
      </tr>
      <tr>
        <td colspan="3">Your order is completed. A confirmation email has been sent.</td>
      </tr>

    </table>
  </form>

</body>
</html>
