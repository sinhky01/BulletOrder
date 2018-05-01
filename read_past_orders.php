<?php
session_start();

include_once("db_connect.php");

if(isset($_GET['order']) && !empty($_GET['order'])){
  $order_id = mysql_escape_string($_GET['order']); // Set email variable
}

$find_orders = "SELECT food_id FROM order_info WHERE order_id = " . $order_id .";";
$result2 = $db->query($find_orders);
$list = $result2->fetchAll();
?>

<html>
<head>
  <title>Bullet Order Page</title>	 <ul>
  				<li><a href="order_main.php">Order Page</a></li>
  				<li><a href="past_orders.php">Past Orders</a></li>
  				<li><a href="profile.php">Profile</a></li>
				</ul>

  <style type="text/css">
	td {
	padding-top: 12px;
	padding-bottom: 9px;
	}
	table td+td {
	text-align: right;
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
</style>
</head>

<body>
  <form method="post" action="order_confirm.php">
    <table align="center" style="border:none;width:80%;cellspacing = 0; cellpadding = 5">

      <?php
      if ($list != null){
        print "      <tr>
        <th>Order List</th>
        <th>Price</th>
        </tr>";
        $total_price = 0;
        foreach ($list AS $id){
          $qStr = "SELECT name, price FROM food WHERE food.food_id = ".$id[0].";";
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
        print "Invalid order id! ";
      }
      ?>
    </tr>
    <td colspan="3">total = <?php echo $total_price; ?></td>
  </table>
</br></br>
</form>

</body>
</html>
