<?php
// $mysqli->query("SET NAMES 'utf8'");
function selectForCap($mysqli) {
  $sql = "SELECT DISTINCT  * FROM `line_drain_lotki`
  LEFT JOIN `materials` ON line_drain_lotki.`material` = materials.`number`
  LEFT JOIN `typeProduct` ON line_drain_lotki.`typeProduct` = typeProduct.`number`
  ORDER BY line_drain_lotki.`id` ASC";

$fQuery = $mysqli->query($sql);
//$arr_name = [];
$arr_name = makeArrayFromObj($fQuery) ;
return $arr_name;
}
// Из объекиа данных считанных из БД мы формируем для работы массив с этими данными (выводим весь объем данных)
function selectAllArr($mysqli) {
           $sql = "SELECT DISTINCT  * FROM `line_drain_lotki`
           LEFT JOIN `materials` ON line_drain_lotki.`material` = materials.`number`
           LEFT JOIN `typeProduct` ON line_drain_lotki.`typeProduct` = typeProduct.`number`
           ORDER BY line_drain_lotki.`id` ASC";

$fQuery = $mysqli->query($sql);
   //$arr_name = [];
  $arr_name = makeArrayFromObj($fQuery) ;
  return $arr_name;
}

////////////////////////// выводим таблицу с установленной шириной 

function selectItemsByAllParam ($mysqli, $dn) {
  $dn_real = "SELECT GidrSech FROM dn WHERE `dn`='$dn'";

  if ($result = $mysqli->query($dn_real)) {
    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
      $dnn = $row['GidrSech'];
      // printf ($row['GidrSech']);
    }
}
  $sql= "SELECT * FROM line_drain_lotki WHERE `dn`='$dnn'";
  $fQuery = $mysqli->query($sql);
  $arr_name = makeArrayFromObj($fQuery);
return $arr_name;
}






function selectItemsByWidth ($mysqli, $width,$delta) {
  $widthMin = $width - 5;
  $widthMax = $width + 5;
  $sql= "SELECT * FROM line_drain_lotki 
  WHERE `width` >='$widthMin' AND
  `width` <='$widthMax'";

  $fQuery = $mysqli->query($sql);
  $arr_name = makeArrayFromObj($fQuery);
return $arr_name;

}
function selectItemsByHeight ($mysqli, $height) {
  $sql= "SELECT * FROM line_drain_lotki WHERE `height`='$height'";
  $fQuery = $mysqli->query($sql);
  $arr_name = makeArrayFromObj($fQuery);
return $arr_name;
}



function selectMakerFromBD ($mysqli, $maker) {
  $maker_real = "SELECT maker FROM makers WHERE `number`='$maker'";

  if ($result = $mysqli->query($maker_real)) {
    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
      $maker = $row['maker'];
      // printf ($row['GidrSech']);
    }
  }
  return $maker;
}
function selectTypeProductFromBD ($mysqli, $typeProduct) {
  $typeProduct_real = "SELECT typeProduct FROM typeproduct WHERE `number`='$typeProduct'";

  if ($result = $mysqli->query($typeProduct_real)) {
    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
      $typeProduct = $row['typeProduct'];
        }
  }
  return $typeProduct;
}


function selectTypeMaterialFromBD ($mysqli, $material) {
  $material_real = "SELECT material FROM materials WHERE `number`='$material'";

  if ($result = $mysqli->query($material_real)) {
    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
      $material = $row['material'];
      // printf ($row['GidrSech']);
    }
  }
  return $material;
}
function selectTypeDnFromBD ($mysqli, $dn) {
   $dn_real = "SELECT GidrSech FROM gidro WHERE `number`='$dn'";

  if ($result = $mysqli->query($dn_real)) {
    /* извлечение ассоциативного массива */
    while ($row = $result->fetch_assoc()) {
      $dn = $row['GidrSech'];
      // printf ($row['GidrSech']);
    }
  }
  return $dn;
}
function selectTypeLoadClassFromBD ($mysqli, $load_class) {

  $load_class_real = "SELECT load_class FROM load_classes WHERE `number`='$load_class'";

 if ($result = $mysqli->query($load_class_real)) {
   /* извлечение ассоциативного массива */
   while ($row = $result->fetch_assoc()) {
     $load_class = $row['load_class'];
     // printf ($row['GidrSech']);
   }
 }
 return $load_class;
}
  ?>