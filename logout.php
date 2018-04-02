<?php
    include "Datamanger.php";
    $work=new user();
    $work->logout();
    header("Location:index.php");
?>