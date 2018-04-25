<?php
session_start();

include_once("db_connect.php");
$email = $_SESSION["email"];

$find_orders = "SELECT order_id, order_status FROM orders WHERE cid = '" . $email ."';";
print $find_orders;
$result2 = $db->query($find_orders);
$orders = $result2->fetch();


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
  </style>
</head>

<body>
  <form method="post" action="order_confirm.php">
 <table align="center" style="border:none;width:80%;cellspacing = 0; cellpadding = 5">
         <tr>
        <th>Order id</th>
        <th>Order status</th>
      </tr>
            <?php
            if ($orders != null){
              foreach ($orders as $key) {
                print $key;
                print "<tr>";
                print "<td>$key[0]</td>\n";
                print "<td>$key[1]</td>\n";
                print "</tr>";
              }
            }
            ?>
          </tr>
        </table>
      </form>

    </body>
    </html>
