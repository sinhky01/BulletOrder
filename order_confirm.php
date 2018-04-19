<?php
include_once('db_connect.php');
$list = $_POST['cborder'];

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
        <th>Remove</th>
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
                print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $id . "' checked ></TD>\n";
                print "</tr>";
              }
            }
            else{
              print "You have not select anything! ";
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
