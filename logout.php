<?php
ob_start(); //ensure everything is done
session_start();
echo "<P>logging out!</P>\n";

$_SESSION["email"] = "";
session_destroy();
echo "<P>You successfully logged out!</P>\n";
$url = phpLink('landing.php?logout=1');
while (ob_get_status()){
    ob_end_clean();
}
header( "Location: $url" );

?>
<?php
function phpLink($page){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $link_element = explode("/", $actual_link);
    $curr_page = $link_element[5];
    $page_link = str_replace($curr_page,$page,$actual_link);
    return $page_link;
}
?>
