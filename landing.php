<?php
//Ruiwen wrote most of the landing page
//Abby did a bit of editing and design stuff
//landing.php is the main page where a user can enter there information or register for a new login
// phpinfo();
include_once("db_connect.php"); //$db

if(isset($_GET['password']) && !empty($_GET['password'])){
  $success = mysql_escape_string($_GET['password']); // Set email variable
}
if(isset($_GET['email']) && !empty($_GET['email'])){
  $f_email = mysql_escape_string($_GET['email']);
}
$qStr = "SELECT * FROM customer;";
$t1Data = $db->query($qStr);

?>
<?php
function phpAlert($msg) {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function phpLink($page){
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $link_element = explode("/", $actual_link);
  $curr_page = $link_element[5];
  $page_link = str_replace($curr_page,$page,$actual_link);
  return $page_link;
}
?>
<?php
$qStr = "SELECT food.food_id, name, price, picture, category FROM food LEFT JOIN food_category ON food.food_id = food_category.food_id;";
$t1Data = $db->query($qStr);
$food_list = $t1Data->fetchAll();
?>
<html>
<head>
  <!--
  <SCRIPT>
  function goToRegister(){
  header ("register.php");
}
</SCRIPT>
-->
<title> Bullet Order </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="css/heading.css">
<link rel="stylesheet" href="styles.css">
<STYLE type="text/css">
h2 {
  text-align: center;
  color: black;
  font-family: verdana;
  font-size: 58px;
  opacity: 1;
}
h4 {
  text-align: right;
  color: white;
  font-family: verdana;

}
th, td {
  color: #002F6C;
  padding: 20px;
  align: center;
  border: none;
  border-bottom: 1px solid #d3d3d3;
}
table td+td {
  text-align: right;
}
tr:hover {
  background-color: #f3f3f3;
}
A {
  color: white;
  font-family: verdana;
  text-shadow: 0px 0px 3px #000, -1px -1px #000, 1px 1px #000;
}
table {
  width: 30%;
  position: relative;
  float: right;
  color: #776E64;
  background-color: rgba(0, 47, 108, 0.8);
}
table td{
  width: 50%;
  text-align: right;
}
body {
  height: 100%;
  background-repeat: no-repeat;
  background-attachment: scroll;
}
.bg {
  height: 100%;
}
.top {
  width: 100%;
  background-color: rgba(0, 47, 108, 0.8);
  padding: 2%;
}
.central{
 position: absolute;
 left: 5%;
 top: 25%;
 width: 68%;
 /* height: 20%; */
 padding: 5%
}
</STYLE>
</head>
<body>
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

  <div class = "top">
    <h2 class="shadow text3" >Welcome to Speeding Bullet!</h2>
  </div>
</br>

<div class = "glogo">
  <img src="logo.png" alt="Logo" style="width: 5%; position: absolute; bottom: 5%; right: 5%">
</div>


  <form method = "post" action = "login.php">
    <table class = "table">
      <tr><td colspan="3" style="color:red; font-weight: bold;"><A href="http://www.gettysburg.edu/current_students/menu.dot"><h4>Click to see today's menu</h4></A></td></tr>

      <tr>
        <td colspan="3" style="color:red; font-weight: bold;"> <?php
        if ($success == -1){
          echo "Invalid Email ! Retry !";}
          else if ($success == -2){
            echo "Invalid Password ! Retry !";}
            ?></td>
          </tr>
          <!--  <tr>
          <td/>
          <td> Login </td>
        </tr> -->
        <tr>
          <td><A> Email </A></td>
          <td><input type = 'text' name = 'email' placeholder = 'enter your email' autocomplete="on" value = '<?php echo $f_email;?>'/></td>
        </tr>
        <tr>
          <td><A> Password  </A></td>
          <td><input type = 'password' name = 'password' placeholder = 'enter your password' /></td>
        </tr>
        <tr>
          <td/>
          <td><input type = 'submit' value = 'Login'/></td>
          <!--<td><input type = 'button' value = 'Register'/></td>
          <A HREF="http://www.cs.gettysburg.edu/~furu01/bullet/register.php">Register Now!</A>
        -->
      </tr>
      <tr>
        <td/>
        <td><A HREF="<?php echo phpLink("register.php");?>">Register Now!</A></td>
      </tr>
      <tr>
        <td/>
        <td><A HREF="<?php echo phpLink("forgetPass.html");?>">Forgot Password?</A></td>
      </tr>
    </table>
  </form>
</br> </br>

  <div class = "central">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <?php
        $count = 0;
        foreach ($food_list as $key) {
          if ($count == 0){
            print "<div class='item active'>\n";
          }
          else{
          print "<div class='item'>\n";
        }
          $image = $key['picture'];
          $name = $key['name'];
          print " <img src='" . $image ."' alt='". $name ."' style='width:100%;'>\n";
          print "</div>\n";
          $count = $count + 1;
          if ($count == 5){
            break;
          }
        }
        ?>
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div></div>
</body>
</html>
