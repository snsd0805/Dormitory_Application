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
        $widget=new User_CloseHeader($content);
        $widget->draw();
    }
}

class Insert_Complete implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new MSGbox("填寫完成<BR><a href=\"pdf.php\"><h1>下載pdf檔</h1></a> ");
        $widget=new User_CloseHeader($content);
        $widget->draw();
    }
}
class Update_Complete implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new MSGbox("更新資料完成<BR><a href=\"pdf.php\"><h1>下載pdf檔</h1></a> ");
        $widget=new User_CloseHeader($content);
        $widget->draw();
    }
}

class Insert_Data_Error implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new MSGbox("資料處理錯誤<br>不可多次填寫表單<BR><a href=\"index.php\"><h1>重新填寫新申請表</h1></a> ");
        $widget=new User_CloseHeader($content);
        $widget->draw();
    }
}

class Insert_Empty implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new MSGbox("資料不可為空<BR><a href=\"index.php\"><h1>繼續填寫新申請表</h1></a> ");
        $widget=new User_CloseHeader($content);
        $widget->draw();
    }
}

class STU_LIST implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new STU_LIST_TEXT();
        $widget=new Admin_CloseHeader($content);
        $widget->draw();
    }
}
class STU_LOGIN implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new STU_LOGIN_TEXT();
        $widget=new CloseHeader($content);
        $widget->draw();
    }
}
class LOGIN_ERROR implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new MSGbox("登入錯誤<BR><a href=\"index.php\"><h1>重新登入</h1></a> ");
        $widget=new CloseHeader($content);
        $widget->draw();
    }
}
class DOWNLOAD implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $content=new Download_TEXT();
        $widget=new USER_CloseHeader($content);
        $widget->draw();
    }
}

?>