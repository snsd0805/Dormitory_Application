
<?php

ini_set("display_errors",1);
session_start();
    if(empty($_SESSION['uid']))
        header("Location:index.php");
    include_once "Datamanger.php";
    $insert=new user();
    $insert->check_form();
?>
