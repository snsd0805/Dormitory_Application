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
?>