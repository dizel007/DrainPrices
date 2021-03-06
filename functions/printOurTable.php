<?php
// require_once("real_names.php");

require_once("select_params.php");

function printOurTable($arr_name) {
      echo "<div class =\"our_table\"> <table class=\"drawtable\">";
      $i=0;
      echo"<tr>
              <td class=>id</td>
              <td>Производитель</td>
              <td>Артикул</td>
              <td>Наименование</td>
              <td>Гидр.сечение</td>
              <td>Длина</td>
              <td>Ширина</td>
              <td>Высота</td>
              <td>Кл.Нагр</td>
              <td>Вес</td>
              <td>Цена розн.</td>
              <td>Цена дилер</td>
              <td>Дата обновл</td>
              <td>Доп. артикулы</td>
              <td>Тип Продукта</td>
              <td>Материал</td>
           </tr>";

      
      $realDate = date("m.d.y");
      $realDate=strtotime($realDate);
      $tempDate = "";
if (isset($arr_name)) {

  // Заполняем саму таблциу
        for ($i=0; $i<count($arr_name); $i++){

          // $maker_temp = makerName($arr_name[$i]['maker']);
          // $material_temp = materialName($arr_name[$i]['material']);
          // $typeProduct_temp = typeProductName($arr_name[$i]['typeProduct']);
          // $dnName = dnName($arr_name[$i]['DN']);

          $maker_temp = selectMakerFromPerem($arr_name[$i]['maker']);
          $material_temp = selectMaterialFromPerem($arr_name[$i]['material']);
          $typeProduct_temp = selectTypeProductFromPerem($arr_name[$i]['typeProduct']);
          $dnName = selectDnFromPerem($arr_name[$i]['DN']);


           echo "<tr>
            <td>".($i+1)."</td>
            <td>".$maker_temp."</td> 
            <td>".$arr_name[$i]['article']."</td>
            <td class=\"limit_width \">".$arr_name[$i]['name']."</td>
            <td>".$dnName."</td>
            <td>".$arr_name[$i]['length']."</td>  
            <td>".$arr_name[$i]['width']."</td>
            <td>".$arr_name[$i]['height']."</td>
            <td>".$arr_name[$i]['load_class']."</td>
            <td>".$arr_name[$i]['weight']."</td>
            <td class =\"price_real\">".$arr_name[$i]['price']."</td>
            <td class =\"price_dealer\">".$arr_name[$i]['discount']."</td>
            <td>".$arr_name[$i]['date_write']."</td>
            <td>".$arr_name[$i]['option_article']."</td>
            <td>".$typeProduct_temp."</td>
            <td>".$material_temp."</td>
            
          </tr>";
        }
    
    }
    echo "</table></div>";

  return 1;
}
