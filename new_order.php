<?php

// Ruiwen Fu
// Create a new orders
// save to db order and order info
// send confirmation email to user.


include_once('db_connect.php');
session_start();
$email = $_SESSION["email"];
// echo "<P>Useremail: " .  $email  . "</P>\n";
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
// print $time;
$add1 = "INSERT INTO orders(order_id, cid, order_status, location) VALUES (".$time.",'".$cid."',". $order_status.",'".  $location . "');";
//print "\n" . $add1;
$result1 = $db->query($add1);
// if($result1 != FALSE){
//   print "<p>added.</p>";
// }
// else{
//   print "<p>not added.</p>";
// }
foreach ($list AS $id){
  $add2 = "INSERT INTO order_info(food_id, order_id) VALUES (".$id.",". $time. ");";
  // print "\n" . $add2;
  $result2 = $db->query($add2);
  // if($result2 != FALSE){
  //   print "<p>added.</p>";
  // }
  // else{
  //   print "<p>not added.</p>";
  // }
}
if($result2 != FALSE){// && $result2 != FALSE){
  // confirmation email
  $e_email = "reset@bulletorder.com";
  $e_name = "Account Services"; //$from
  $e_content = "You have successfully ordered food from bulletorder.\n" . $c_link;
  $to = $email;
  $subject = "Order Confirmation!";
  $e_content .= "Order time is: " . date("Y-m-d h:i:sa") . "\n";
  $e_content .= "food                 price\n";
  foreach ($list AS $id){
    $qStr = "SELECT name, price FROM food WHERE food.food_id = ".$id.";";
    $t1Data = $db->query($qStr);
    $data = $t1Data->fetch();
    $name = $data['name'];
    $price = $data['price'];
    $total_price = $total_price + (int)$price;
    $e_content .= add_space($name, 1) . "   |   ". add_space($price,2) . " \n";
  }
  $e_content .= "total = ". $total_price . " \n";
  $header = "From: $e_name <$e_email>\r\n";
  $result = mail($to, $subject, $e_content, $header);
  // if ($result == FALSE){
  //   echo "<p> A confirmation Email was not sent.</p\n>";
  // }
  // else {
  //   echo "<p> A confirmation Email was sent.</p\n>";
  // }
}
else{
  echo "<p> Order not created.</p\n>";
}

function add_space($string, $dir){
  $len = strlen($string);
  if($len < 18){
    if ($dir == 1){
      $makeup = 18 - $len;
      $string .= str_repeat(" ", $makeup);
    }
    else{
      $string = str_repeat(" ", $makeup) . $string;
    }
  }
  return $string;
}
?>


<html>
<head>
  <title>Bullet order Menu</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/heading.css">

  <style type="text/css">
  th, td {
    color: #002F6C;
    padding: 20px;
    align: center;
    border: none;
    border-bottom: 1px solid #d3d3d3;
    }    table td+td {
      text-align: right;
    }
    tr:hover {
      background-color: #f3f3f3;
    }
    table {
      border-collapse: collapse;
      border: none;
      align: center;
    }
    .submit_button{
      float: center;
    }
    body {
      background-color: white;
    }
    table {
      font-size: 20px;
      width: 100%;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      color: white;
      background-color: #002F6C;
    }
    li {
      float: right;
      background-color: #002F6C;
      color: white;
    }
    li a {
      display: block;
      padding: 20px 20px;
      text-align: center;
      color: white;
    }
    li a:hover {
      background-color:  #dbdfe5;
    }

    body {
      background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.3) 100%), url("bulletbg.jpeg");
      background-color: #dbdfe5;
      background-size: 100%, 90%;
      padding-left: 10%;
      padding-right: 10%
    }

    .newbutton {
        background-color: #002F6C;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    </style>
</head>

<body>
  <DIV class="row" font-size="20px">
    <nav class="navbar navbar-light" style="background-color: #002F6C;">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">BulletOrder</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><?php
          session_start(); //login session
          if ($email == NULL){
            echo "Login";
          }
          else{
            echo "Logout";
          }
          ?></a></li>
          <li><a href="order_menu.php">Order Page</a></li>
          <li><a href="past_orders.php">Past Orders</a></li>
          <li><a href="profile.php">Profile</a></li>
        </ul>
      </div>
    </nav>

  </DIV>
</br></br>
<DIV align="center" >
  <h1> Your order is completed. A confirmation email has been sent. </h1>
</br> </br>
</DIV>

<form method="post" action="order_confirm.php" style="position: absolute; left: 26%; width:50%;background-color: #f2f2f2;">
  <table align="center" style="border: none;width:90%;cellspacing = 0; cellpadding = 5">


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
    <tr><td><h1>  Order total: $<?php echo $total_price; ?></h1>
</td></tr>
    <!-- </tr> -->
  </table>
</form>
<DIV align="center">
</DIV>
</body>
</html>
