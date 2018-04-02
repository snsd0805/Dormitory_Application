<?php

    include "factory.php";
class Application_Form_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new Application_Form);
    }
}

class Insert_Complete_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new Insert_Complete);
    }
}
class Update_Complete_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new Update_Complete);
    }
}
class Insert_Data_Error_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new Insert_Data_Error);
    }
}
class Insert_Empty_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new Insert_Empty);
    }
}

class Stu_List_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new STU_LIST);
    }
}

class Stu_Login_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new STU_LOGIN);
    }
}
class Login_Error_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new LOGIN_ERROR);
    }
}
class Download_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new DOWNLOAD);
    }
}

?>