<?php
session_start();

include_once("db_connect.php");
$email = $_SESSION["email"];

$find_orders = "SELECT order_id, order_status FROM orders WHERE cid = '" . $email ."';";

$result2 = $db->query($find_orders);
$orders = $result2->fetchAll();


function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    return $page_link;
}

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
         <tr>
        <th>Order id</th>
        <th>Order status</th>
      </tr>
            <?php
            if ($orders != null){
              foreach ($orders as $key) {
                print "<tr>";
                print "<td><a href=". phpLink("read_past_orders.php?order=". $key[0])  .">$key[0]</a></td>\n";
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
