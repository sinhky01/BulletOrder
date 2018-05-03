<?php
include_once('db_connect.php');
$cate = $_POST['select_cate'];
$qStr = "SELECT food.food_id, name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id WHERE category = '".$cate."';";
$t1Data = $db->query($qStr);
?>
<html>
<head>
  <title>Bullet Order Page</title>

					 <ul>				
				<li><a href="logout.php">Logout</a></li>
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
    <table align="center" style="border:none;width:90%;cellspacing = 0; cellpadding = 5">
      <tr>
        <th>food category</th>
        <th>food name</th>
        <th>images</th>
        <th>price</th>
        <th>select</th>
      </tr>
      <tr>
        <?php
        if ($t1Data != FALSE){
          $nRows = $t1Data->rowCount();
          $nCols = $t1Data->columnCount();
          while ($row = $t1Data->fetch()) {
            print "<tr>";
            $cate = $row['category'];
            $name = $row['name'];
            $image = $row['picture'];
            $id = $row['food_id'];
            $price = $row['price'];
            print "<TD>" . $cate . "</TD>";
            print "<TD>" . $name . "</TD>";
            print "<TD><img src='".$image."' alt='".$name."' height=128></TD>";
            print "<TD>" . $price . "</TD>";
            print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $id . "'></TD>\n";
            print "</tr>";
          }
        }
        else{
          print "<td>There is no food left.</td>";
        }
        ?>
      </tr>
    </table>
  </br> </br>
  <center><input type = "submit" value = "submit order"></center>
</form>

</body>
</html>
