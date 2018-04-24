<?php
include_once('db_connect.php');

session_start();
$email = $_SESSION["email"];
echo "<P>Useremail: " .  $email  . "</P>\n";
if ($email == NULL){
  print "<h1>Please login first!!!</h1>";
  $url = phpLink('landing.php?password=-3');
  header( "Location: $url" );
}



$cate = $_POST['select_cate'];
$qStr = "SELECT food.food_id, name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id WHERE category = '".$cate."';";
$t1Data = $db->query($qStr);

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
        <center><input type = "submit" value = "submit order"></center>
      </form>

    </body>
    </html>
