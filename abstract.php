<?php
include "Datamanger.php";
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
                                    <td><input  class="form-control"  type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>畢業學校：</td>
                                    <td><input class="form-control" placeholder="例：陽明國中" type="text" name="school"></td>
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
                                        <input class="form-control" placeholder="請加上區碼，例：047222121" type="text" name="tel">
                                    </td>
                                </tr>
                                <tr>
                                    <td>學生手機：</td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="例：0911222333" name="stu_phone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>家長姓名及手機</td>
                                    <td>
                                        手機：<input class="form-control" type="text" placeholder="例：0911222333" name="par_phone"><br>
                                        父親姓名：(必填)<input class="form-control" type="text" name="fa_name">
                                        母親姓名：(必填)<input class="form-control" type="text" name="mo_name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>家裡住址：</td>
                                    <td><input class="form-control" type="text" placeholder="例：彰化縣彰化市中興路78號
" name="address"></td>
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
class INSERT_COMPLETE_TEXT extends widget
{
    function draw(){
        return $this->check_error();
    }

    function check_error(){
        $error=$_GET['error'];
        if($error==1){
            return $this->insert_complete_text();
        }else if($error==2){
            return $this->insert_error_text();
        }else{
            return $this->insert_empty_text();
        }
    }
    
    function insert_complete_text()
    {
        $content=<<<CONTENT
        <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><h1>成功送出申請表</h1>
</div></div></div>
<div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><a href="index.php"><h1>繼續填寫新申請表</h1></a> 
</div></div></div>

CONTENT;
        return $content;
    }
    function insert_error_text()
    {
        $content=<<<CONTENT
        <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><h1>資料處理錯誤，<br>請與資訊媒體組聯繫</h1>
</div></div></div>
<div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><a href="index.php"><h1>繼續填寫新申請表</h1></a> 
</div></div></div>

CONTENT;
        return $content;
    }
    function insert_empty_text()
    {
        $content=<<<CONTENT
        <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><h1>資料不可為空</h1>
</div></div></div>
<div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><a href="index.php"><h1>繼續填寫新申請表</h1></a> 
</div></div></div>

CONTENT;
        return $content;
    }
}

class STU_LIST_TEXT extends widget
{
    function draw(){
        return $this->stu_diet_text();
    }

    function stu_select_list(){
        $list=$_GET['list'];
        if($list='1')
            return $this->stu_all_list_text();
        elseif ($list='2')
            return $
    }

    function stu_diet_text(){
        if($_GET[''])

        $content="<div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-2\"></div>
                    <div class=\"col-8\">
                        <br><br>
                        <h1>彰化高中107學年度新生住宿申請表</h1>
                     
                        <br><br>
                        <table class=\"table table-striped\">
                         <thead class=\"thead-light\">
    <tr>
      <th scope=\"col\">姓名</th>
      <th scope=\"col\">伙食</th>
    </tr>
  </thead>";
        $list=db::STU_LIST_list();
        while($row=$list->fetch()){
            if($row[6]=='V')
                $row[6]="素";
            else
                $row[6]="葷";

            $content.="<tr>";
            $content.="<td>".$row['1']."</td>";
            $content.="<td>".$row['6']."</td>";
            $content.="</tr>";
        }
        $content.="</table></div>                    <div class=\"col-2\"></div>
</div></div>";
        return $content;
    }

    function stu_all_list_text(){
        $content="<div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-2\"></div>
                    <div class=\"col-8\">
                        <br><br>
                        <h1>彰化高中107學年度新生住宿申請表</h1>
                        </div></div></div>
                        <br><br>
                        <table class=\"table table-striped\">
                         <thead class=\"thead-light\">
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">姓名</th>
      <th scope=\"col\">性別</th>
      <th scope=\"col\">出生年月日</th>
      <th scope=\"col\">畢業國中</th>
      <th scope=\"col\">伙食</th>
      <th scope=\"col\">身高</th>
      <th scope=\"col\">家裡電話</th>
      <th scope=\"col\">學生手機</th>
      <th scope=\"col\">家長手機</th>
      <th scope=\"col\">父親姓名</th>
      <th scope=\"col\">母親姓名</th>
      <th scope=\"col\">住址</th>
    </tr>
  </thead>";
        $list=db::STU_LIST_list();
        while($row=$list->fetch()){
            if($row[2]=='M')
                $row[2]="男";
            else
                $row[2]="女";

            if($row[6]=='V')
                $row[6]="素";
            else
                $row[6]="葷";

            if($row[7]=='0')
                $row[7]="低於183";
            else
                $row[7]="高於183";
            $content.="<tr>";
            for($i=0;$i<=14;$i++){
                if($i!=4&&$i!=8)
                $content.="<td>$row[$i]</td>";
            }
            $content.="</tr>";
        }
        $content.="</table>";
        return $content;
    }
}
?>