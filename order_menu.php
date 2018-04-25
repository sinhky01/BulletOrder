<?php
include_once('db_connect.php');
$cate = $_POST['select_cate'];
$qStr = "SELECT food.food_id, name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id WHERE category = '".$cate."';";
$t1Data = $db->query($qStr);
?>
<html>
<head>
  <title>Bullet Order Menu</title>
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
