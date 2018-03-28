<?php

abstract class widget
{
    abstract function draw();
}

class Application_Form_TEXT extends widget
{
    function draw(){
        return $this->application_form_text();
    }

    function application_form_text()
    {
        $content=<<<CONTENT
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
CONTENT;
        return $content;
    }
}
?>