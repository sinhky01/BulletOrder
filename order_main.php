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
