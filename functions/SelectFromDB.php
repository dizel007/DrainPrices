<?php
// $mysqli->query("SET NAMES 'utf8'");
// Из объекиа данных считанных из БД мы формируем для работы массив с этими данными (выводим весь объем данных)
function selectAllArr($mysqli) {

// $sql = "SELECT * FROM line_drain_lotki ,materials WHERE 'line_drain_lotki.material' = 'materials.number' ORDER BY id ASC";

// $sql = "SELECT * FROM `line_drain_lotki` as `t1`,
//                        `materials` as `t2`
//                        WHERE t1.`material` = t2.`number` and
//                        ";

// $sql = "SELECT * FROM `line_drain_lotki`,
//              `materials` ,
//              `typeProduct`
//              WHERE line_drain_lotki.`material` = materials.`number` AND
//                     line_drain_lotki.`typeProduct` = typeProduct.`number`
//                     ORDER BY line_drain_lotki.`id` ASC";

$sql = "SELECT DISTINCT  * FROM `line_drain_lotki`
            LEFT JOIN `materials` ON line_drain_lotki.`material` = materials.`number`
            LEFT JOIN `typeProduct` ON line_drain_lotki.`typeProduct` = typeProduct.`number`
            ORDER BY line_drain_lotki.`id` ASC";
           

                    


//$sql = "SELECT * FROM line_drain_lotki ORDER BY id ASC";

$fQuery = $mysqli->query($sql);
   //$arr_name = [];
  $arr_name = makeArrayFromObj($fQuery) ;
  return $arr_name;
}

////////////////////////// выводим таблицу с установленной шириной 


function selectItemsByWidth ($mysqli, $width) {
  $sql= "SELECT * FROM line_drain_lotki WHERE `width`='$width'";
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

  ?>