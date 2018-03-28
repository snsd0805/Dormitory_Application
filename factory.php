<?php

include "Product_Order.php";

abstract class creator
{
    abstract function factorymethod(product $product);

    function startfactory(product $product){
        return $this->factorymethod($product);
    }
}

class factory extends creator
{
    protected $product;
    function factorymethod(product $product)
    {
        $this->product=$product;
        return $this->product->getProperties();
    }
}
?>