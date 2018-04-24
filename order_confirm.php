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
	background-color: #dbdfe5;
	}
  .submit_button{
    float: center;
  }
</style>
</head>

<body>
  <form method="post" action="order_confirm.php">
    <table align="center" style="border:none;width:80%;cellspacing = 0; cellpadding = 5">
            <?php
            if ($list != null){
              		print " <tr> <th>Order List</th> <th>Price</th> <th>Remove</th> </tr>";
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
        <center><input type = "submit" value = "Refresh"></center>
      </form>

    </body>
    </html>
