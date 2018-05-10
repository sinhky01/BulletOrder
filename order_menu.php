<?php
//Ruiwen Fu
//order_menu
// list out all the food in db


include_once('db_connect.php');
session_start();
$email = $_SESSION["email"];
if ($email == null){
	$url = phpLink('landing.php?');
	header( "Location: $url" );
}

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
function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    echo $page_link;
    return $page_link;
}


?>
<html>
<head>
  <title>Bullet Order Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/heading.css">
  <!-- <link rel="stylesheet" href="styles.css"> -->

  <!-- <script>
  function hide() {
  var meal = document.getElementById("divmeal");
  var misc = document.getElementById("divmisc");

  meal.style.display = "none";
  misc.style.display = "block";
}
window.onload = hide;
</script> -->
<nav class="navbar navbar-light" style="background-color: #002F6C;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BulletOrder</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><?php
      session_start(); //login session
      if ($email == NULL){
        echo "Login";
      }
      else{
        echo "Logout";
      }
      ?></a></li>
      <li><a href="order_menu.php">Order Page</a></li>
      <li><a href="past_orders.php">Past Orders</a></li>
      <li><a href="profile.php">Profile</a></li>
    </ul>
  </div>
</nav>
<!--
<ul>
</ul> -->

<style type="text/css">
th, td {
  color: #002F6C;
  padding: 20px;
  align: center;
  border: none;
  border-bottom: 1px solid #d3d3d3;
  }    table td+td {
    text-align: right;
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

  body {
    background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.3) 100%), url("bulletbg.jpeg");
    background-color: #dbdfe5;
    background-size: 100%, 90%;
    padding-left: 10%;
    padding-right: 10%
  }

  .newbutton {
      background-color: #002F6C;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
  }

  </style>
</head>
<body>
  <!-- <center><?php
  foreach ($list as $key) {
  print "<button id = button" . $key[0] . " type='button'>" . $key[0] . "</button>";
}

?></center> -->
<form method="post" action="order_confirm.php" style="position: absolute; left: 26%; width:50%;background-color: #f2f2f2;">
  <table align="center" style="border:none;cellspacing = 0; cellpadding = 5;">
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
<center><input type = "submit" class="newbutton" value = "submit order"></center>
</form>

</body>
</html>
