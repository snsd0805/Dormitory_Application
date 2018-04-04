<?php
require_once('Acada-tcpdf_min-master/tcpdf.php');
include_once "Datamanger.php";
session_start();
$work=new user();
$work->STU_DOWNLOAD();
?>