<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>

<?php
    $name=$_POST['name'];
    $school=$_POST['school'];
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $diet=$_POST['diet'];
    $height=$_POST['height'];
    $tel=$_POST['tel'];
    $stu_phone=$_POST['stu_phone'];
    $par_phone=$_POST['par_phone'];
    $fa_name=$_POST['fa_name'];
    $mo_name=$_POST['mo_name'];
    $address=$_POST['address'];

    echo $name."<br>".$school."<br>".$gender."<br>".$date."<br>".$diet."<br>".$height."<br>"
        .$tel."<br>".$stu_phone."<br>".$par_phone."<br>".$fa_name."<br>".$mo_name."<br>".$address;


?>
