<?php
include_once('db_connect.php');
$qStr = "SELECT DISTINCT category FROM food_category;";
$t1Data = $db->query($qStr);
?>

<html>
<head>
  <title>Bullet Order Page</title>
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
	<ul>				
				<li><a href="logout.php">Logout</a></li>
  				<li><a href="order_main.php">Order Page</a></li>
  				<li><a href="past_orders.php">Past Orders</a></li>
  				<li><a href="profile.php">Profile</a></li>
				</ul>
  <table>
    <tr>
      <th>Available types</th>
      <tr>
        <td>
          <form method="post" action="order_menu.php">
		<div align="center">
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
            ?> </div>
          </form>
        </td>
      </table>

    </body>
    </html>
