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

    function check_form(){
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

            $error = 0;
            $sql = "INSERT INTO `STU_LIST`(`id`, `name`, `gender`, `birthday`) VALUES (NULL ,'$data[0]','$data[2]','$data[3]')";
            echo $sql."<br>";
            if (!$this->insert($sql))
                $error++;
            $sql = "INSERT INTO `STU_INFORMATION`(`id`, `school`, `diet`, `height`) VALUES (NULL,'$data[1]','$data[4]','$data[5]')";
            echo $sql."<br>";

            if (!$this->insert($sql))
                $error++;
            $sql = "INSERT INTO `STU_CONTACT`(`id`, `tel`, `stu_phone`, `par_phone`, `fa_name`, `mo_name`, `address`) 
VALUES (NULL,'$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
            echo $sql."<br>";

            if (!$this->insert($sql))
                $error++;

            if ($error == 0)
                header("Location:check.php?error=1");
            else
                header("Location:check.php?error=2");

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

    static function STU_LIST_list(){
        $sql="SELECT `STU_LIST`.*,`STU_INFORMATION`.*,`STU_CONTACT`.* 
FROM `STU_LIST`,`STU_CONTACT`,`STU_INFORMATION` 
WHERE `STU_LIST`.`id`=`STU_INFORMATION`.`id` AND `STU_INFORMATION`.`id`=`STU_CONTACT`.`id`
ORDER BY `STU_LIST`.`id` DESC";
        return self::query($sql);
    }
}
?>