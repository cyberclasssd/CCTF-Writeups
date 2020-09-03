<?php
    session_set_cookie_params(0,'.'); 
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }
?>
