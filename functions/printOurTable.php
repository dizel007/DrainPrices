<?php

function printOurTable($arr_name) {
      echo "<div class =\"our_table\"> <table class=\"drawtable\">";
      $i=0;
      echo"<tr>
      <td class=\"hidden_class_column\">id</td>
      <td>Производитель</td>
      <td>Артикул</td>
      <td class=\"hidden_class_column\">Наименование</td>
      <td>Гидр.сечение</td>
      <td class=\"hidden_class_column\">Длина</td>
      
      <td class=\"hidden_class_column\">Ширина</td>
      <td class=\"hidden_class_column\">Высота</td>
          <td class=\"hidden_class_column\">Кл.Нагр</td>
      <td class=\"hidden_class_column\">Вес</td>
          <td  class=\"hidden_class_column\">Цена розн.</td>
      <td>Размер скидки</td>
      <td>Дата создания</td>
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

      echo "<tr class =\"\">
            <td class=\"\">".$arr_name[$i]['id']."</td>
            <td>".$arr_name[$i]['maker'] ."</td> 
            <td>".$arr_name[$i]['article']."</td>
            <td class=\"limit_width \">".$arr_name[$i]['name']."</td>
            <td>".$arr_name[$i]['DN']."</td>
            <td class=\"\">".$arr_name[$i]['length']."</td>  
            <td class=\"\">".$arr_name[$i]['width']."</td>
            <td class=\"\">".$arr_name[$i]['height']."</td>
            <td class=\"\">".$arr_name[$i]['load_class']."</td>
            <td class=\"\">".$arr_name[$i]['weight']."</td>
            <td class =\"\">".$arr_name[$i]['price']."</td>
            <td class =\"\">".$arr_name[$i]['discount']."</td>
            <td>".$arr_name[$i]['date_write']."</td>
            <td>".$arr_name[$i]['option_article']."</td>
            <td>".$arr_name[$i]['typeProduct']."</td>
            <td>".$arr_name[$i]['material']."</td>
            
          </tr>";
        }

      // echo "<br>";
    }
    echo "</table></div>";

  return 1;
}

?>