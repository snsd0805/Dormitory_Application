<?php
include_once "Client_Order.php";
$error=$_GET['error'];
if($error=='1')
    $work=new Insert_Complete_Client();
else if ($error=='2')
    $work=new Insert_Data_Error_Client();
else if($error=='3')
    $work=new Insert_Empty_Client();
else
    $work=new Update_Complete_Client();
?>