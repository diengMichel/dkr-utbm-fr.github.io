<?php
include("./PageParts/db_logic.php");

if (isset($_POST["logout"])){
    DestroyLoginCookie();
}
unset($_POST);
//header("Location:http://".$rootpath."/index.php");
$redirect = "Location:http://".$rootpath."/index.php";
header($redirect);

?>