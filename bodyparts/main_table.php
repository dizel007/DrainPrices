<?php
$width ="";
$height ="";
//$date_start="";
//$date_end ="";


if (!empty($_GET['width'])) {
  $width = $_GET['width'];
}
if (!empty($_GET['height'])) {
  $height = $_GET['height'];
}

// ВЫВОДИМ ТАБЛИЦУ ПО ВЫБРАННОМУ ИНН
  if  (($width <> "") && ($height =="")) {
   echo "ШИРИНА :". $width;
  $arr_name = selectItemsByWidth($mysqli,$width);
  printOurTable($arr_name) ; 
  }
  elseif  (($height <> "") && (($width == ""))) {
    echo "Высота :". $height;
   $arr_name = selectItemsByHeight($mysqli,$height);
   printOurTable($arr_name) ; 
   }
else {
   $arr_name = selectAllArr($mysqli);
    printOurTable($arr_name) ;
} 
  //$arr_name = selectArrByData($mysqli);
  
  

  



?>