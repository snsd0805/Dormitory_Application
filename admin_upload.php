<?php
session_start();
if(empty($_SESSION['uid']) OR $_SESSION['uid']!='9999')
    header("Location:admin_login.php");
include_once "Client_Order.php";
$work=new Admin_Upload_Client();
?>