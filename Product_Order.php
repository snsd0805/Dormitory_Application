<?php
    include "Product.php";

class Application_Form implements product
{
    function getProperties()
    {
        // TODO: Implement getProperties() method.
        $abc=<<<CONTENT
        <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <br><br>
            <h1>彰化高中107學年度新生住宿申請表</h1>
            <br><br>
            <table class="table table-striped">
                <form action="insert.php" method="post">
                    <tr>
                        <td>新生姓名：</td>
                        <td><input class="form-control" type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>畢業學校：</td>
                        <td><input class="form-control" type="text" name="school"></td>
                    </tr>
                    <tr>
                        <td>性別：</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label" for="exampleRadios1">男性</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label" for="exampleRadios1">女性</label>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>出生年月日：</td>
                        <td><input class="form-control" type="date" name="date">
                    </tr>
                    <tr>
                        <td>伙食葷素 ：</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="diet" value="animal_food">
                                <label class="form-check-label" for="exampleRadios1">葷</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="diet" value="vegetarian_food">
                                <label class="form-check-label" for="exampleRadios1">素</label>
                            </div>
                    </tr>
                    <tr>
                        </td>
                        <td>身高</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="height" value="up">183公分以上
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="height" value="down">183公分以下
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>家裡電話：(必填)</td>
                        <td>
                            <input class="form-control" type="text" name="tel">
                        </td>
                    </tr>
                    <tr>
                        <td>學生手機：</td>
                        <td>
                            <input class="form-control" type="text" name="stu_phone">
                        </td>
                    </tr>
                    <tr>
                        <td>家長姓名及手機</td>
                        <td>
                            手機：<input class="form-control" type="text" name="par_phone"><br>
                            父親姓名：(必填)<input class="form-control" type="text" name="fa_name">
                            母親姓名：(必填)<input class="form-control" type="text" name="mo_name">
                        </td>
                    </tr>
                    <tr>
                        <td>家裡住址：</td>
                        <td><input class="form-control" type="text" name="address"></td>
                    </tr>
            </table>
            <button type="submit" class="btn btn-primary">送出</button>
            </form>
            <BR><BR><BR><BR>
        </div>
        <div class="col-2"></div>
    </div>
</div>

</body>
CONTENT;


        return $abc;
    }
}
?>