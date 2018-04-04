<?php
class db
{
    static function connect(){
        $db_ip="127.0.0.1";
        $db_user="root";
        $db_password="pomelo8911285";
        $db_select="Dormitory_Application";
        $db_charset = "UTF8";

        $DSN="mysql:host=$db_ip;dbname=$db_select;charset=$db_charset";

        try{
            $db=new PDO($DSN,$db_user,$db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "連接失敗 ： " . $e->getMessage();
        }

        return $db;
    }

    function insert($sql){
        $insert=self::connect()->prepare($sql);
        if($insert->execute())
            return true;
        else
            return false;
    }

    function query($sql){
        $result=self::connect()->query($sql);
        return $result;
    }

}

class user extends db
{
    function check_login(){
        $uid=$_POST['uid'];
        $pwd=$_POST['pwd'];

        $sql="SELECT COUNT(*) FROM `STU_LOGIN` WHERE `uid`='$uid' AND `pwd`='$pwd'";
        $result=$this->query($sql)->fetch();
        if (!$result[0] == 0) {
            session_start();
            $_SESSION['uid']=$uid;
            header("Location:index.php");
        } else {
            header("Location:stu_login_error.php");
        }
    }

    function check_form(){
        session_start();
        if(isset($_SESSION['uid']))
            $uid=$_SESSION['uid'];
        include_once "config.ini";
        $data[0]=$_POST['name'];
        $data[1]=$_POST['school'];
        $data[2]=$_POST['gender'];
        $data[3]=$_POST['date'];
        $data[4]=$_POST['diet'];
        $data[5]=$_POST['height'];
        $data[6]=$_POST['tel'];
        $data[7]=$_POST['stu_phone'];
        $data[8]=$_POST['par_phone'];
        $data[9]=$_POST['fa_name'];
        $data[10]=$_POST['mo_name'];
        $data[11]=$_POST['address'];

        if($this->check_data($data)) {
            if ($data[2] == "male")
                $data[2] = 'M';
            else
                $data[2] = 'F';

            if ($data[4] == "animal_food")
                $data[4] = 'A';
            else
                $data[4] = 'V';

            if ($data[5] == "up")
                $data[5] = '1';
            else
                $data[5] = '0';
            print_r($data);
            $num = $data[1] - 1;//修正學校編號
            $data[1] = $school_name[$num];

            $error = 0;
            if($this->data_empty_check()) {
                $sql = "INSERT INTO `STU_LIST`(`id`,`uid`, `name`, `gender`, `birthday`) VALUES (NULL ,'$uid' ,'$data[0]','$data[2]','$data[3]')";
                echo $sql . "<br>";
                if (!$this->insert($sql))
                    $error++;
                $sql = "INSERT INTO `STU_INFORMATION`(`id`, `school`, `diet`, `height`) VALUES (NULL,'$data[1]','$data[4]','$data[5]')";

                echo $sql . "<br>";

                if (!$this->insert($sql))
                    $error++;
                $sql = "INSERT INTO `STU_CONTACT`(`id`, `tel`, `stu_phone`, `par_phone`, `fa_name`, `mo_name`, `address`) 
VALUES (NULL,'$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
                echo $sql . "<br>";

                if (!$this->insert($sql))
                    $error++;

                if ($error == 0)
                    header("Location:stu_check.php?error=1");
                else
                    header("Location:stu_check.php?error=2");
            }else{
                $ans=self::STU_LIST_list()->fetch();
                $id=$ans[0];

                $sql = "UPDATE `STU_LIST` SET `name`='$data[0]',`gender`='$data[2]',`birthday`='$data[3]' WHERE `uid`='$uid'";
                echo $sql . "<br>";
                if (!$this->insert($sql))
                    $error++;
                $sql = "UPDATE `STU_INFORMATION` SET `school`='$data[1]',`diet`='$data[4]',`height`='$data[5]' WHERE `id`='$id'";

                echo $sql . "<br>";

                if (!$this->insert($sql))
                    $error++;
                $sql = "UPDATE `STU_CONTACT` SET `tel`='$data[6]',`stu_phone`='$data[7]',`par_phone`='$data[8]',`fa_name`='$data[9]',`mo_name`='$data[10]',`address`='$data[11]' WHERE `id`='$id'";
                echo $sql . "<br>";

                if (!$this->insert($sql))
                    $error++;

                if ($error == 0)
                    header("Location:stu_check.php?error=4");
                else
                    header("Location:stu_check.php?error=2");
            }
        } else {
            header("Location:stu_check.php?error=3");
        }

    }

    function check_data($data){

        $empty=0;
        for($i=0;$i<=11;$i++){
            echo $data[$i]."<br>";
            if(empty($data[$i]))
                $empty++;
        }

        if($empty==0) {

            return true;
        }
        else{
            return false;

        }
    }
    function logout(){
        session_start();
        $_SESSION['uid']="";
    }
    function data_empty_check(){

        if(isset($_SESSION['uid']))
            $uid=$_SESSION['uid'];
        $sql="SELECT COUNT(*) FROM `STU_LIST` WHERE `uid`='$uid'";
        $result=$this->query($sql)->fetch();
        if($result[0]==0)
            return true;
        else
            return false;
    }
    static function STU_LIST_list(){
        if(isset($_SESSION['uid']))
            $uid=$_SESSION['uid'];
        $sql="SELECT `STU_LIST`.*,`STU_INFORMATION`.*,`STU_CONTACT`.* 
FROM `STU_LIST`,`STU_CONTACT`,`STU_INFORMATION` 
WHERE `STU_LIST`.`uid`='$uid' AND `STU_LIST`.`id`=`STU_INFORMATION`.`id` AND `STU_INFORMATION`.`id`=`STU_CONTACT`.`id`";
        return self::query($sql);
    }

    function STU_DOWNLOAD(){
        $data=self::STU_LIST_list()->fetch();

        if($data[3]=='F')
            $data[3]='女';
        else
            $data[3]='男';

        if($data[7]=='A')
            $data[7]='葷';
        else
            $data[7]='素';

        if($data[8]=='1')
            $data[8]='高於183cm';
        else
            $data[8]='低於183cm';

        $content=" <table cellspacing=\"0\" cellpadding=\"1\" border=\"1\">";
        $content.="<tr><td>報到序號</td><td>".$data[1]."</td></tr>";
        $content.="<tr><td>姓名</td><td>".$data[2]."</td></tr>";
        $content.="<tr><td>性別</td><td>".$data[3]."</td></tr>";
        $content.="<tr><td>生日</td><td>".$data[4]."</td></tr>";
        $content.="<tr><td>畢業學校</td><td>".$data[6]."</td></tr>";
        $content.="<tr><td>伙食</td><td>".$data[7]."</td></tr>";
        $content.="<tr><td>身高</td><td>".$data[8]."</td></tr>";
        $content.="<tr><td>家裡電話</td><td>".$data[10]."</td></tr>";
        $content.="<tr><td>學生手機</td><td>".$data[11]."</td></tr>";
        $content.="<tr><td>家長手機</td><td>".$data[12]."</td></tr>";
        $content.="<tr><td>父親姓名</td><td>".$data[13]."</td></tr>";
        $content.="<tr><td>母親姓名</td><td>".$data[14]."</td></tr>";
        $content.="<tr><td>住址</td><td>".$data[15]."</td></tr>";
        $content.="
  </table><br>
  <br><br>
    ";
        $pdf = new TCPDF("P", "mm", "A4", true, "UTF-8", false);
        $pdf -> setPrintHeader(false);						//是否有header
        $pdf -> setPrintFooter(false);						//是否有footer
        $pdf -> setAutoPageBreak(true);						//是否自動分頁
        $pdf -> setFontSubsetting(true);					//產生字型子集
        $pdf -> addPage();										//新增頁面
        $pdf -> setFont('droidsansfallback','','35','',true);	//設定字型
        $pdf -> writeHTML("<BR><BR>","","","","","C");								//撰寫內容
        $pdf->Write(0, '彰化高中宿舍新生申請表', '', 0, 'C', true, 0, false, false, 0);
        $pdf -> writeHTML("<BR><BR>","","","","","C");								//撰寫內容
        $pdf -> setFont('droidsansfallback','','15','',true);	//設定字型

        $pdf -> writeHTML("$content","","","","","C");								//撰寫內容

        $pdf -> Output('test.pdf', 'D');
    }
}

class admin extends db
{
    static function STU_LIST_list()
    {
        $sql = "SELECT `STU_LIST`.*,`STU_INFORMATION`.*,`STU_CONTACT`.* 
FROM `STU_LIST`,`STU_CONTACT`,`STU_INFORMATION` 
WHERE `STU_LIST`.`id`=`STU_INFORMATION`.`id` AND `STU_INFORMATION`.`id`=`STU_CONTACT`.`id`";
        return self::query($sql);
    }

    static function check_login()
    {
        $pwd = $_POST['pwd'];
        if ($pwd == 'chsh508b')
            header("Location:admin_list.php");
        else
            header("Location:admin_login.php");

    }

    function STU_EXCEL_OUTPUT()
    {

        include "PHPExcel/PHPExcel.php";//引入文件
        $objPHPExcel = new PHPExcel();//实例化PHPExcel类 (相当于创建了一个excel表格)
        $objSheet = $objPHPExcel->getActiveSheet();//获取当前活动sheet的操作对象
        $objSheet->setTitle("宿舍申請清單");//给当前活动的sheet这只名称为demo
        $objSheet
            ->setCellValue("A1", "報到序號")
            ->setCellValue("B1", "姓名")
            ->setCellValue("C1", "性別")
            ->setCellValue("D1", "生日")
            ->setCellValue("E1", "畢業學校")
            ->setCellValue("F1", "伙食葷素")
            ->setCellValue("G1", "身高")
            ->setCellValue("H1", "家裡電話")
            ->setCellValue("I1", "學生手機")
            ->setCellValue("J1", "家長手機")
            ->setCellValue("K1", "父親姓名")
            ->setCellValue("L1", "母親姓名")
            ->setCellValue("M1", "住址");
        $number = 2;
        $data = self::STU_LIST_list();
        while ($row = $data->fetch()) {
            if ($row[3] == 'M')
                $row[3] = "男";
            else
                $row[3] = "女";

            if ($row[7] == 'V')
                $row[7] = "素";
            else
                $row[7] = "葷";

            if ($row[8] == '0')
                $row[8] = "低於183";
            else
                $row[8] = "高於183";
            $objSheet
                ->setCellValue("A$number", "$row[1]")
                ->setCellValue("B$number", "$row[2]")
                ->setCellValue("C$number", "$row[3]")
                ->setCellValue("D$number", "$row[4]")
                ->setCellValue("E$number", "$row[6]")
                ->setCellValue("F$number", "$row[7]")
                ->setCellValue("G$number", "$row[8]")
                ->setCellValue("H$number", "$row[10]")
                ->setCellValue("I$number", "$row[11]")
                ->setCellValue("J$number", "$row[12]")
                ->setCellValue("K$number", "$row[13]")
                ->setCellValue("L$number", "$row[14]")
                ->setCellValue("M$number", "$row[15]");
            $number++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=彰化高中宿舍申請清單.xls');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

    }

    function upload()
    {
        if (!empty($_FILES['file']['tmp_name'])) {
            echo "檔案名稱: " . $_FILES["file"]["name"] . "<br/>";
            echo "檔案類型: " . $_FILES["file"]["type"] . "<br/>";
            echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "暫存檔名：" . $_FILES["file"]["tmp_name"]."<br>";
            move_uploaded_file($_FILES["file"]["tmp_name"], "STU_UPLOAD_DATA/" . $_FILES["file"]["name"]);

            if ($file = fopen("STU_UPLOAD_DATA/" . $_FILES['file']['name'], "r")) {
                $error=0;
                while ($data = fgetcsv($file)) {
                    $num = $data[0];
                    $sn = $data[1];
                    $sql = "INSERT INTO `STU_LOGIN`(`uid`, `pwd`) VALUES ('$num','$sn')";
                    echo $USER_sql."<br>";
                    if(!parent::insert($sql))
                        $error++;
                }
                if($error==0){

                }
            }
        }else{
            echo "no";
        }
    }


}
?>