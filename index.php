<?php
    include "Client_Order.php";
    session_start();
    if(empty($_SESSION['uid']))
        $work=new Stu_Login_Client;
    else
        $work=new Remind_Client;
    //Application_Form_Client
    
?>