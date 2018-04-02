<?php
include "abstract.php";
class CloseHeader extends widget
{
    protected $content;
    function __construct(widget $content)
    {
        $this->content=$content;
    }

    function draw()
    {
        echo $this->html_header();
        echo $this->nacvber();
        echo $this->content->draw();
        echo $this->footer();
    }

    function html_header()
    {
        $content=<<<CONTENT
       
        <head>
        <title>國立彰化高級中學 | 新生住宿申請表</title>
	<link rel="icon" href="img/favicon.ico" type="image/ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
CONTENT;
        return $content;
    }

    function nacvber()
    {
        $content=<<<CONTENT
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="index.php"><h1 class="title">    <img alt="國立彰化高級中學" src="img/favicon.ico" style="max-width:100px; margin-top: -6px;">
國立彰化高中</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="navbarNav">
    <ul class="navbar-nav">
      
      
    </ul>
  </div>
</nav>
CONTENT;
        return $content;
    }

    function footer()
    {
        $content=<<<CONTENT
    <nav class="navbar navbar-dark bg-dark " >
        <div class="container">
            <div class="row">

                <div class="col-6"></div>
                <div class="col-auto">
                    <h7 class="title" style="color: white">
                    系統建置：資訊媒體組</h7>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
   </nav>
 
CONTENT;
        return $content;
    }
}

class User_CloseHeader extends CloseHeader
{
    protected $content;
    function __construct(widget $content)
    {
        $this->content=$content;
    }

    function draw()
    {
        echo $this->html_header();
        echo $this->nacvber();
        echo $this->content->draw();
        echo $this->footer();
    }



    function nacvber()
    {
        $content=<<<CONTENT
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="index.php"><h1 class="title">    <img alt="國立彰化高級中學" src="img/favicon.ico" style="max-width:100px; margin-top: -6px;">
國立彰化高中</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php
        ">填寫申請表</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pdf.php
        ">下載PDF檔案</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php
        ">登出</a>
      </li>
    </ul>
  </div>
</nav>
CONTENT;
        return $content;
    }
}
class Admin_CloseHeader extends CloseHeader
{
    protected $content;
    function __construct(widget $content)
    {
        $this->content=$content;
    }

    function draw()
    {
        echo $this->html_header();
        echo $this->nacvber();
        echo $this->content->draw();
        echo $this->footer();
    }

    function nacvber()
    {
        $content=<<<CONTENT
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="list.php"><h1 class="title">    <img alt="國立彰化高級中學" src="img/favicon.ico" style="max-width:100px; margin-top: -6px;">
國立彰化高中</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse  " id="navbarNav">
    <ul class="navbar-nav">
     
      <li class="nav-item active">
        <a class="nav-link" href="list.php
        ">察看列表</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php
        ">登出</a>
      </li>
    </ul>
  </div>
</nav>
CONTENT;
        return $content;
    }
}
?>