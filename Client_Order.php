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

class Stu_List_Client
{
    protected $factory;
    function __construct()
    {
        $this->factory=new factory();
        echo $this->factory->startfactory(new STU_LIST);
    }
}
?>