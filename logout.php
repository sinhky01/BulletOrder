<?php
ob_start(); //ensure everything is done
session_start();
echo "<P>logging out!</P>\n";

$_SESSION["email"] = "";
session_destroy();
echo "<P>You successfully logged out!</P>\n";
$url = 'http://www.cs.gettysburg.edu/~furu01/bullet/landing.php?logout=1';
while (ob_get_status()){
    ob_end_clean();
}
header( "Location: $url" );

?>
