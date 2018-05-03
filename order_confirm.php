<?php
include_once('db_connect.php');
$list = $_POST['cborder'];
?>
<html>
<head>
  <title>Bullet order Menu</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/heading.css">

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
  <nav class="navbar navbar-light" style="background-color: #002F6C;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">BulletOrder</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
        <li><a href="order_menu.php">Order Page</a></li>
        <li><a href="past_orders.php">Past Orders</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </div>
  </nav>

  <form method="post" action="order_confirm.php" style="position: absolute; left: 26%; width:50%;background-color: #f2f2f2;">
    <table align="center" style="border:none;width:80%;cellspacing = 0; cellpadding = 5">

            <?php
            if ($list != null){
		print "      <tr>
        <th>Order List</th>
        <th>Price</th>
        <th>Remove</th>
      </tr>";
              $total_price = 0;
              foreach ($list AS $id){
                $qStr = "SELECT name, price FROM food WHERE food.food_id = ".$id.";";
                $t1Data = $db->query($qStr);
                $data = $t1Data->fetch();
                $name = $data['name'];
                $price = $data['price'];
                $total_price = $total_price + (int)$price;
                print "<tr>";
                print "<td>$name</td>\n";
                print "<td>$price</td>\n";
                print "<TD><Input type = 'checkbox' name = 'cborder[]' value = '" . $id . "' checked ></TD>\n";
                print "</tr>";
              }
            }
            else{
              print "You have not selected anything! ";
              // $url = phpLink('order_main.php');
              // header( "Location: $url" );
            }
            ?>
          </tr>
          <tr colspan="3"><td>total = <?php echo $total_price; ?></td></tr>
        </table>
</br></br>
        <center><input type = "submit" class="newbutton" value = "Refresh">
 <input type = "submit" value = "Confirm" class="newbutton" formaction='new_order.php'></center>
      </form>

    </body>
    </html>
