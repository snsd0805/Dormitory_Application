<?php
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=output.csv");
$content = "Column1,tColumn2\nnRow1-1,nRow1-2";
$content = mb_convert_encoding($content , "Big5" , "UTF-8");
echo $content;
exit;
?>