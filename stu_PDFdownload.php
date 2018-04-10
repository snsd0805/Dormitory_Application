<?php
require_once('Acada-tcpdf_min-master/tcpdf.php');
include_once "Datamanger.php";
session_start();
if(empty($_SESSION['uid']))
    header("Location:index.php");
$work=new user();
$work->STU_DOWNLOAD();
?>