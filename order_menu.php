<?php
include_once('db_connect.php');

$qStr = "SELECT DISTINCT category FROM food_category;";
$t1Data = $db->query($qStr);
$list = $t1Data->fetchAll();
$cates = array();
foreach ($list as $key) {
  $qStr = "SELECT food.food_id, name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id WHERE category = '".$key[0]."';";
  $t1Data = $db->query($qStr);
  $food_list = $t1Data->fetchAll();
  array_push($cates, $food_list);
}
// print_r $cates;

?>
<html>
<head>
  <title>Bullet Order Page</title>

  <!-- <script>
  function hide() {
    var meal = document.getElementById("divmeal");
    var misc = document.getElementById("divmisc");

      meal.style.display = "none";
      misc.style.display = "block";
    }
  window.onload = hide;
  </script> -->


  <ul>
    <li><a href="order_menu.php">Order Page</a></li>
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
  ul {$t1Data
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
  <!-- <center><?php
  foreach ($list as $key) {
    print "<button id = button" . $key[0] . " type='button'>" . $key[0] . "</button>";
  }

  ?></center> -->
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
        foreach ($cates as $food_list) {
          foreach ($food_list as $key) {
            $cate = $key['category'];
            print "<div id = div".$cate . ">";
            print "<tr>";
            $name = $key['name'];
            $image = $key['picture'];
            $id = $key['food_id'];
            $price = $key['price'];
            print "<TD>" . $cate . "</TD>";
            print "<TD>" . $name . "</TD>";
            print "<TD><img src='".$image."' alt='".$name."' height=128></TD>";
            print "<TD>" . $price . "</TD>";
            print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $id . "'></TD>\n";
            print "</tr>";
            print "</div>";

          }
        }
        ?>
      </tr>
    </table>
  </br> </br>
  <center><input type = "submit" value = "submit order"></center>
</form>

</body>
</html>
