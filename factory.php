<?php

include "Product_Order.php";

abstract class creator
{
    abstract function factorymethod(product $product); //select FACTORY

    function startfactory(product $product){
        return $this->factorymethod($product);//FACTORY return PRODUCT
    }
}

class factory extends creator
{
    protected $product;
    function factorymethod(product $product)
    {
        $this->product=$product;
        return $this->product->getProperties(); //PRODUCT
    }
}
?>