<?php
include_once('db_connect.php');
$cate = $_POST['select_cate'];
$qStr = "SELECT name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id WHERE category = ".$cate.";";
$t1Data = $db->query($qStr);


?>
<html>
<head>
  <title>Bullet order Menu</title>
</head>

<body>
  <table style="border: 1px solid black;width:100%;cellspacing = 0; cellpadding = 5">
    <tr>
      <th>food category</th>
      <th>food name</th>
      <th>select</th>
      <tr>
        <tr>
          <form method="post" action="order_menu.php">
            <?php
            if ($t1Data != FALSE){
              $nRows = $t1Data->rowCount();
              $nCols = $t1Data->columnCount();
              while ($row = $t1Data->fetch()) {

                $cate = $row['category'];
                $name = $row['name'];
                print "<TD><input type = 'submit' value = '". $cate . "'/></TD></br>";
                print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $name . "'></TD>\n";

              }
            }
            else{
              print "<td>There is no food left.</td>";
            }
            ?>
          </form>
        </tr>
      </table>

    </body>
    </html>
