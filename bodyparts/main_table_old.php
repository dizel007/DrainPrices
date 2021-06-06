<?php

if (!empty($_GET['maker'])) {
  $maker = $_GET['maker'];
}
if (!empty($_GET['typeProduct'])) {
  $typeProduct = $_GET['typeProduct'];
}
if (!empty($_GET['material'])) {
  $material = $_GET['material'];
}
if (!empty($_GET['dn'])) {
  $dn = $_GET['dn'];
}
if (!empty($_GET['width'])) {
  $width = $_GET['width'];
}
if (!empty($_GET['height'])) {
  $height = $_GET['height'];
}
if (!empty($_GET['load_class'])) {
  $load_class  = $_GET['load_class'];
}
//$load_class ="1";

/// берем все данные с БД в виде массива
$arr_name = selectAllArr($mysqli);
///  фильтруем по производителю**************************************************
  if (isset($maker))
    {
    
      $i=0;
      $maker = selectMakerFromBD($mysqli, $maker);
      echo "Производитель :".$maker."; ";
                foreach ($arr_name as $key => $value) 
                {
                    if ($arr_name[$key]['maker'] == $maker) 
                      {
                        $new_arr_maker[$i] = $value; 
                        $i++;
                      } 
                }
                    unset($arr_name);
    } else 
        {
          $new_arr_maker = $arr_name;
          unset($arr_name);
        }

/// фильтруем по типу товара ************************************************
if (isset($typeProduct))
{
  $i=0;
  $typeProduct = selectTypeProductFromBD($mysqli, $typeProduct);
  echo "Тип продукта :".$typeProduct."; ";
             foreach ($new_arr_maker as $key => $value) 
             {
                if ($new_arr_maker[$key]['typeProduct'] == $typeProduct) 
                {
                  $new_arr_typeProduct[$i] = $value; 
                  $i++;
                } 
              }
          unset($new_arr_maker);

} else 
    {
      if (!empty($new_arr_maker))  $new_arr_typeProduct = $new_arr_maker;
      unset($new_arr_maker);
    }

////фильтруем по типу материалу ************************************************
if (isset($material))
{
  $i=0;
  $material = selectTypeMaterialFromBD ($mysqli, $material);
  echo "Материал :".$material."; ";
             foreach ($new_arr_typeProduct as $key => $value) 
             {
                if ($new_arr_typeProduct[$key]['material'] == $material) 
                {
                  $new_arr_material[$i] = $value; 
                  $i++;
                }  
              }
               unset($new_arr_typeProduct);

} 
  else {
    if (!empty($new_arr_typeProduct))  $new_arr_material = $new_arr_typeProduct;
    unset($new_arr_typeProduct);
       }

////фильтруем по типу материалу ************************************************
if (isset($dn)){
 $i=0;
  $dn = selectTypeDnFromBD ($mysqli, $dn);
  echo "Гидравлическое сечение :".$dn."; ";
             foreach ($new_arr_material as $key => $value) {
                if ($new_arr_material[$key]['DN'] == $dn) {
                  $new_arr_dn[$i] = $value; 
                  $i++;
                  } 
          }
          unset($new_arr_material);

} else {
  if (!empty($new_arr_material))  $new_arr_dn = $new_arr_material;
  unset($new_arr_material);

}

////фильтруем по типу ширине ************************************************
if (isset($width)){
  $i=0;
   echo "Ширина :".$width."; ";
              foreach ($new_arr_dn as $key => $value) {
                 if ($new_arr_dn[$key]['width'] == $width) {
                   $new_arr_width[$i] = $value; 
                   $i++;
                   } 
           }
           unset($new_arr_dn);

 } else {
  if (!empty($new_arr_dn))  $new_arr_width = $new_arr_dn;
  unset($new_arr_dn);

 }
 
 
////фильтруем по типу высоте ************************************************
if (isset($height)){
  $i=0;
   echo "Высота :".$height."; ";
              foreach ($new_arr_width as $key => $value) {
                 if ($new_arr_width[$key]['height'] == $height) {
                   $new_arr_height[$i] = $value; 
                   $i++;
                   } 
           }
           unset($new_arr_width);

 } else {
  if (!empty($new_arr_width))  $new_arr_height = $new_arr_width;
  unset($new_arr_width);

 }

////фильтруем по типу классу нагруке  ************************************************
if (isset($load_class)){
  $i=0;
   $load_class = selectTypeLoadClassFromBD ($mysqli, $load_class);
   echo "Класс Нагрузки :".$load_class."; ";
              foreach ($new_arr_height as $key => $value) {
                 if ($new_arr_height[$key]['load_class'] == $load_class) {
                   $new_arr_load_class[$i] = $value; 
                   $i++;
                   } 
           }
           unset($new_arr_height);

 } else {
  if (!empty($new_arr_height))  $new_arr_load_class = $new_arr_height;
  unset($new_arr_height);

 }


 if (!empty($new_arr_load_class))  {
   printOurTable($new_arr_load_class) ;
  }else {
  echo "<br><br>**************************    НЕТ ДАННЫХ   ***************************<br>";
 };
 unset($new_arr_load_class);
//   if  (($width <> "") && ($height =="")) {
//    echo "ШИРИНА :". $width;
//   $arr_name = selectItemsByWidth($mysqli,$width,0); // 0 - заменить на допустимый разбег по ширине
//   printOurTable($arr_name) ; 
//   }
//   elseif  (($height <> "") && (($width == ""))) {
//     echo "ВЫСОТА :". $height;
//    $arr_name = selectItemsByHeight($mysqli,$height);
//    printOurTable($arr_name) ; 
//    }
// else {
//    $arr_name = selectAllArr($mysqli);
//     printOurTable($arr_name) ;
// } 
  //$arr_name = selectArrByData($mysqli);
  
  

  



?>