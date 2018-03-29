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
        $widget=new CloseHeader($content);
        $widget->draw();
    }
}
class Insert_Complete implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new INSERT_COMPLETE_TEXT();
        $widget=new CloseHeader($content);
        $widget->draw();
    }
}

class STU_LIST implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new STU_LIST_TEXT();
        $widget=new CloseHeader($content);
        $widget->draw();
    }
}

?>