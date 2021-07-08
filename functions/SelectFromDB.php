<?php
// $mysqli->query("SET NAMES 'utf8'");
// ФУНКИЯ ВЫБОРА параметров для запроса в БД, Сделано по ебнуому, чтобы можно было выбирать в любом порядке параметры
function selectForCapWhereAll($mysqli, $maker, $typeProduct, $material, $dn , $width , $height , $load_class, $uklon, $delta_width,$delta_height,$sort) {
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
  empty($dn)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
    empty($width)?$sql_width="":$sql_width=" AND `width`='".$width."'";
        if (($sql_width<>"") and  ($delta_width<>"")) {
          $delta_w1 = $width - $delta_width;
          $delta_w2 = $width + $delta_width;
          $sql_width=" AND `width`>".$delta_w1." AND `width`<".$delta_w2;
          }
     
   
     } else {
    empty($width)?$sql_width="":$sql_width=" `width`='".$width."'";
    if (($sql_width<>"") and  ($delta_width<>"")) {
      $delta_w1 = $width - $delta_width;
      $delta_w2 = $width + $delta_width;
      $sql_width=" `width`>".$delta_w1." AND `width`<".$delta_w2;
      }


  }
  empty($width)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
  empty($height)?$sql_height="":$sql_height=" AND `height`='".$height."'";
  if (($height<>"") and  ($delta_height<>"")) {
          $delta_h1 = $height - $delta_height;
          $delta_h2 = $height + $delta_height;
          $sql_height=" AND `height`>".$delta_h1." AND `height`<".$delta_h2;
     }
  } else {
    empty($height)?$sql_height="":$sql_height=" `height`='".$height."'";
    if (($height<>"") and  ($delta_height<>"")) {
        $delta_h1 = $height - $delta_height;
        $delta_h2 = $height + $delta_height;
        $sql_height=" `height`>".$delta_h1." AND `height`<".$delta_h2;
    }
  }
  empty($height)?$temp=0:$col=1; // 

if ($col == 1) { // условие если нет первого параметра
  empty($load_class)?$sql_load_class="":$sql_load_class=" AND `load_class`=$load_class";
  } else {
    empty($load_class)?$sql_load_class="":$sql_load_class=" `load_class`=$load_class";
  }
  empty($load_class)?$temp=0:$col=1; // 


// if ($col == 1) { // условие если нет первого параметра
//     empty($uklon)?$sql_uklon="":$sql_uklon=" AND `uklon`=$uklon";
//     } else {
//       empty($uklon)?$sql_uklon="":$sql_uklon=" `uklon`=$uklon";
//     }
//     empty($uklon)?$temp=0:$col=1; // 
  
    if ($col == 1) { // условие если нет первого параметра
      ($uklon == 1)?$sql_uklon=" AND `uklon`=1":$sql_uklon=" AND `uklon`=0";
      } else {
      ($uklon == 1)?$sql_uklon=" `uklon`= 1":$sql_uklon=" `uklon`= 0";
      }
      ($uklon == 1)?$temp=0:$col=1; // 
  //empty($uklon)?$sql_uklon=0:$sql_uklon=1;
        
    ////////////////// сортировка по высоте или ширине 
    $sql_sort="";
    if (($height<>"") or ($width<>"") or ($dn<>"") or ($typeProduct<>"")) {
    empty($sort)?$sql_sort="":$sql_sort=" ORDER BY ".$sort." ASC";
    }
      $sql = "SELECT * FROM `line_drain_lotki` WHERE  $sql_maker $sql_typeProduct $sql_material $sql_dn $sql_width $sql_height $sql_load_class $sql_uklon $sql_sort";

echo "=SQL_QUERY={".$sql."}=SQL_QUERY=<br>";


// echo "COL=".$col;
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
           $sql = "SELECT DISTINCT  * FROM `line_drain_lotki` WHERE `uklon` = 0
          --  LEFT JOIN `materials` ON line_drain_lotki.`material` = materials.`number`
          --  LEFT JOIN `typeProduct` ON line_drain_lotki.`typeProduct` = typeProduct.`number`
           ORDER BY line_drain_lotki.`id` ASC";

$fQuery = $mysqli->query($sql);
   //$arr_name = [];
  $arr_name = makeArrayFromObj($fQuery) ;
  return $arr_name;
}

?>