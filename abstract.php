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
        include "config.ini";
        $content= <<<CONTENT
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br><br>
                        <h1>彰化高中107學年度新生住宿申請表</h1>
                                                 <font size="3" color="blue"><li><strong> 注意：如資料填報有誤，請重新填報本表 </strong></li>

                        <br><br>
                        <table class="table table-striped">
                            <form action="stu_insert.php" method="post">
                                <tr>
                                    <td>新生姓名：</td>
                                    <td><input  class="form-control"  type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>畢業學校：</td>
                                    <td><select name="school">
CONTENT;
        for($i=0;$i<$school_num;$i++){
            $num=$i+1;//0號學校會被判斷為空值 Datamanger再修正
            $content.="<option value='$num'>".$school_name[$i]."</option>";
        }
        $content.=<<<CONTENT
</select>
</td>
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
class MSGbox extends widget
{
    protected $msg;
    function __construct($msg)
    {
        $this->msg=$msg;
    }

    function draw(){
        return $this->MSGbox_text();
    }

    function MSGbox_text()
    {
        $content=<<<CONTENT
        <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"><h1>
CONTENT;
        $content.=$this->msg;
        $content.=<<<CONTENT
</h1>
</div></div></div>


CONTENT;
        return $content;
    }
}
class STU_LIST_TEXT extends widget
{
    function draw()
    {
        return $this->stu_list_text();
    }

    function stu_list_text(){
        include_once "Datamanger.php";

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
            <th scope=\"col\">報到序號</th>
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
        $list=admin::STU_LIST_list();
        while($row=$list->fetch()){
            if($row[3]=='M')
                $row[3]="男";
            else
                $row[3]="女";

            if($row[7]=='V')
                $row[7]="素";
            else
                $row[7]="葷";

            if($row[8]=='0')
                $row[8]="低於183";
            else
                $row[8]="高於183";
            $content.="<tr>";
            for($i=0;$i<=15;$i++){
                if($i!=5&&$i!=9)
                    $content.="<td>$row[$i]</td>";
            }
            $content.="</tr>";
        }
        $content.="</table>";
        return $content;
    }
}
class STU_LOGIN_TEXT extends widget
{
    function draw(){
        return $this->application_form_text();
    }

    function application_form_text()
    {
        include_once "config.ini";
        $content= <<<CONTENT
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br><br>
                        <h1>彰化高中107學年度新生住宿申請</h1>
                        <br>
                            <form action="stu_login_check.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">報到序號：</label>
    <input type="text" class="form-control" name="uid" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">身份證字號：</label>
    <input type="text" class="form-control" name="pwd" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-primary">登入</button>
</form> 
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

CONTENT;
        return $content;
    }
}
class ADMIN_LOGIN_TEXT extends widget
{
    function draw(){
        return $this->application_form_text();
    }

    function application_form_text()
    {
        include_once "config.ini";
        $content=<<<CONTENT
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br><br>
                        <h1>新生住宿申請管理員介面</h1>
                        <br>
                            <form action="admin_check.php" method="post">
  <div class="form-group">
    <label for="exampleInputPassword1">密碼：</label>
    <input type="text" class="form-control" name="pwd" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-primary">登入</button>
</form> 
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

CONTENT;
        return $content;
    }
}
class ADMIN_UPLOAD_TEXT extends widget
{
    function draw(){
        return $this->application_form_text();
    }

    function application_form_text()
    {
        include_once "config.ini";
        $content=<<<CONTENT
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <br><br>
                        <h1>新生住宿申請—上傳學生資料</h1>
                        <br>
                            <form action="admin_upload_check.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputPassword1">選取csv檔案上傳：</label>
    <input type="file" class="form-control" name="file">
  </div>
  
  <button type="submit" class="btn btn-primary">上傳</button>
</form> 
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

CONTENT;
        return $content;
    }
}
class Download_TEXT extends widget
{
    function draw(){
        return $this->download_text();
    }

    function download_text()
    {
        include_once "Datamanger.php";
        $data=user::STU_LIST_list()->fetch();
        if(!empty($data[3]) && $data[3]=='F')
            $data[3]='女';
        else
            $data[3]='男';

        if(!empty($data[7]) && $data[7]=='A')
            $data[7]='葷';
        else
            $data[7]='素';

        if(!empty($data[8]) && $data[8]=='1')
            $data[8]='高於183cm';
        else
            $data[8]='低於183cm';
        $content="<div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-2\"></div>
                    <div class=\"col-8\">
                        <br><br>
                        <h1>彰化高中107學年度新生住宿申請表</h1>
                        <font size=\"3\" color=\"blue\"><li><strong> 注意：如資料填報有誤，請回到「<a href='index.php'>填寫/修改申請單」</a>重新填報 </strong></li>
                        <font size=\"3\" color=\"blue\"><li><strong> 注意：請點選本頁面下方的「下載PDF檔」按鈕下載檔案，並自行列印申請表，於新生報到當天攜帶至報到處 </strong></li>
                        <br><br>
                        <table class=\"table table-striped\">
                         ";
        if(!empty($data[1])) {
            $content .= "<tr><td>報到序號</td><td>" . $data[1] . "</td></tr>";
            $content .= "<tr><td>姓名</td><td>" . $data[2] . "</td></tr>";
            $content .= "<tr><td>性別</td><td>" . $data[3] . "</td></tr>";
            $content .= "<tr><td>生日</td><td>" . $data[4] . "</td></tr>";
            $content .= "<tr><td>畢業學校</td><td>" . $data[6] . "</td></tr>";
            $content .= "<tr><td>伙食</td><td>" . $data[7] . "</td></tr>";
            $content .= "<tr><td>身高</td><td>" . $data[8] . "</td></tr>";
            $content .= "<tr><td>家裡電話</td><td>" . $data[10] . "</td></tr>";
            $content .= "<tr><td>學生手機</td><td>" . $data[11] . "</td></tr>";
            $content .= "<tr><td>家長手機</td><td>" . $data[12] . "</td></tr>";
            $content .= "<tr><td>父親姓名</td><td>" . $data[13] . "</td></tr>";
            $content .= "<tr><td>母親姓名</td><td>" . $data[14] . "</td></tr>";
            $content .= "<tr><td>住址</td><td>" . $data[15] . "</td></tr>";
            $content .= "
  </table><br>
  <a href='stu_PDFdownload.php'><button class='btn btn-primary'>下載PDF檔</button> </a>              
  <br><br></div></div></div>
    ";
        }else{
            $content .= "<tr><td>報到序號</td><td></td></tr>";
            $content .= "<tr><td>姓名</td><td></td></tr>";
            $content .= "<tr><td>性別</td><td></td></tr>";
            $content .= "<tr><td>生日</td><td></td></tr>";
            $content .= "<tr><td>畢業學校</td><td></td></tr>";
            $content .= "<tr><td>伙食</td><td></td></tr>";
            $content .= "<tr><td>身高</td><td></td></tr>";
            $content .= "<tr><td>家裡電話</td><td></td></tr>";
            $content .= "<tr><td>學生手機</td><td></td></tr>";
            $content .= "<tr><td>家長手機</td><td></td></tr>";
            $content .= "<tr><td>父親姓名</td><td></td></tr>";
            $content .= "<tr><td>母親姓名</td><td></td></tr>";
            $content .= "<tr><td>住址</td><td></td></tr>";
            $content .= "
  </table><br>
  <a href='stu_PDFdownload.php'><button class='btn btn-primary'>下載PDF檔</button> </a>              
  <br><br></div></div></div>
    ";
        }
        return $content;
    }
}

?>