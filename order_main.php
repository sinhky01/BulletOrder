<?php
include_once('db_connect.php');
$qStr = "SELECT DISTINCT category FROM food_category;";
$t1Data = $db->query($qStr);



?>

<html>
<head>
  <title>Bullet order page</title>
</head>

<body>
  <table>
    <tr>
      <th>Available types</th>
      <tr>
        <td>
          <form method="post" action="order_menu.php">
            <?php
            if ($t1Data != FALSE){
              $nRows = $t1Data->rowCount();
              $nCols = $t1Data->columnCount();
              print "<select name='select_cate'>";
              while ($row = $t1Data->fetch()) {
                $cate = $row['category'];
                print "<option value='".$cate."'>".$cate."</option>";
              }
              print "</select>";
              print "<input type = 'submit' value = 'submit' style='border = 1px;'/></br>";
            }
            else{
              print "There is no food left";
            }
            ?>
          </form>
        </td>
      </table>

    </body>
    </html>
