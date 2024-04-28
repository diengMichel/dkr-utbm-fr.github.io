<?php
    if ( $loginStatus["Successful"] == false ) {
        $redirect = "Location:http://".$rootpath."/index.php";
        header($redirect);
    }
?>