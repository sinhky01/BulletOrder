<?php
include_once('db_connect.php');
$list = $_POST['cborder'];
?>
<html>
<head>
  <title>Bullet order Menu</title>
  <style type="text/css">
  th, td {
	color: #002F6C;
	padding: 20px;
   	align: center;
	border: none;
	border-bottom: 1px solid #d3d3d3;
  }
  td {
	text-align: center;
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
  
</style>
</head>

<body>
						 <ul>				
				<li><a href="logout.php">Logout</a></li>
  				<li><a href="order_main.php">Order Page</a></li>
  				<li><a href="past_orders.php">Past Orders</a></li>
  				<li><a href="profile.php">Profile</a></li>
				</ul>
  <form method="post" action="order_confirm.php">
    <table align="center" style="border:none;width:80%;cellspacing = 0; cellpadding = 5">

            <?php
            if ($list != null){
		print "      <tr>
        <th>Order List</th>
        <th>Price</th>
        <th>Remove</th>
      </tr>";
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
                print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $id . "' checked ></TD>\n";
                print "</tr>";
              }
            }
            else{
              print "You have not selected anything! ";
              // $url = phpLink('order_main.php');
              // header( "Location: $url" );
            }
            ?>
          </tr>
          <tr colspan="3">total = <?php echo $total_price; ?></tr>
        </table>
</br></br>
        <center><input type = "submit" value = "Refresh">
 <input type = "submit" value = "Confirm" formaction='new_order.php'></center>
      </form>

    </body>
    </html>
