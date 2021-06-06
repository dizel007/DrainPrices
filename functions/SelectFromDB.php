<?php
// $mysqli->query("SET NAMES 'utf8'");
function selectForCapWhereAll($mysqli, $maker, $typeProduct, $material, $dn , $width , $height , $load_class) {
 $temp=0; 
$col=0; // вводим переменную, чтобы понять сколько параметров выбрано
if ($maker=="") {
  
        $sql_maker="";
    } else {
      $sql_maker="`maker`=$maker"; 
      $col=1;
    }

if ($col == 1) { // условие если нет первого параметра
  empty($typeProduct)?$sql_typeProduct="":$sql_typeProduct=" AND `typeProduct`=$typeProduct";
  } else {
    empty($typeProduct)?$sql_typeProduct="":$sql_typeProduct=" `typeProduct`=$typeProduct";
  }
empty($typeProduct)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
    empty($material)?$sql_material="":$sql_material=" AND `material`=$material";
    } else {
      empty($material)?$sql_material="":$sql_material=" `material`=$material";
    }
 empty($material)?$temp=0:$col=1; // 

 if ($col == 1) { // условие если нет первого параметра
  empty($dn)?$sql_dn="":$sql_dn=" AND `dn`=$dn";
  } else {
    empty($dn)?$sql_dn="":$sql_dn=" `dn`=$dn";
  }
  empty($material)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
    empty($width)?$sql_width="":$sql_width=" AND `width`=$width";
  } else {
    empty($width)?$sql_width="":$sql_width=" `width`=$width";
  }
  empty($material)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
  empty($height)?$sql_height="":$sql_height=" AND `height`=$height";
  } else {
    empty($height)?$sql_height="":$sql_height=" `height`=$height";
  }
  empty($material)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра

  empty($load_class)?$sql_load_class="":$sql_load_class=" AND `load_class`=$load_class";
  } else {
    empty($load_class)?$sql_load_class="":$sql_load_class=" `load_class`=$load_class";
  }
  empty($material)?$temp=0:$col=1; // 


    $sql = "SELECT * FROM `line_drain_lotki` WHERE  $sql_maker $sql_typeProduct $sql_material $sql_dn $sql_width $sql_height $sql_load_class";
echo "===".$sql."===<br>";
  $fQuery = $mysqli->query($sql);
//$arr_name = [];

$arr_name = makeArrayFromObj($fQuery) ;

// echo "<pre>";
// var_dump ($arr_name);
// echo "</pre>";


return $arr_name;
}



// Из объекиа данных считанных из БД мы формируем для работы массив с этими данными (выводим весь объем данных)
function selectAllArr($mysqli) {
           $sql = "SELECT DISTINCT  * FROM `line_drain_lotki`
          --  LEFT JOIN `materials` ON line_drain_lotki.`material` = materials.`number`
          --  LEFT JOIN `typeProduct` ON line_drain_lotki.`typeProduct` = typeProduct.`number`
           ORDER BY line_drain_lotki.`id` ASC";

$fQuery = $mysqli->query($sql);
   //$arr_name = [];
  $arr_name = makeArrayFromObj($fQuery) ;
  return $arr_name;
}

?>