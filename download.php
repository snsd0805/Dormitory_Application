<?php
require_once('Acada-tcpdf_min-master/tcpdf.php');
include_once "Datamanger.php";
session_start();

$data=user::STU_LIST_list()->fetch();

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
?>