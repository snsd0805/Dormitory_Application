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
            header("Location:login_error.php");
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
                    header("Location:check.php?error=1");
                else
                    header("Location:check.php?error=2");
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
                    header("Location:check.php?error=4");
                else
                    header("Location:check.php?error=2");
            }
        } else {
            header("Location:check.php?error=3");
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
}

class admin extends db
{
    static function STU_LIST_list(){
        $sql="SELECT  d `STU_LIST`.*,`STU_INFORMATION`.*,`STU_CONTACT`.* 
FROM `STU_LIST`,`STU_CONTACT`,`STU_INFORMATION` 
WHERE `STU_LIST`.`id`=`STU_INFORMATION`.`id` AND `STU_INFORMATION`.`id`=`STU_CONTACT`.`id`";
        return self::query($sql);
    }
}
?>