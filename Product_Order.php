<?php
    include "Product.php";
    include "Product_Header.php";
ini_set("display_errors", "On");

class Application_Form implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new Application_Form_TEXT();
        $widge=new CloseHeader($content);
        $widge->draw();

    }
}
?>