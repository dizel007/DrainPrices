<?php


function MakeArrayFromObj ($fQuery) {
 
  $i=0;
  // формируем массив с данными по КП 
  if ($fQuery -> num_rows > 0) {
         while ($row = $fQuery -> fetch_assoc()) 
         {
         //echo "ID: {$row["id"]}; Название: {$row["m_cat_name"]};<hr>";// вывод категорий
         for ($k=1; $k<17; $k++) 
               {
               $arr_name[$i]['id'] = $row["id"];
               $arr_name[$i]['maker'] = $row["maker"];
               $arr_name[$i]['article'] = $row["article"];
               $arr_name[$i]['name'] = $row["name"];
               $arr_name[$i]['DN'] = $row["DN"];
               $arr_name[$i]['length'] = $row["length"];
               $arr_name[$i]['width'] = $row["width"];
               $arr_name[$i]['height'] = $row["height"];
               $arr_name[$i]['load_class'] = $row["load_class"];
               $arr_name[$i]['weight'] = $row["weight"];
               $arr_name[$i]['price'] = $row["price"];
               $arr_name[$i]['discount'] = $row["discount"];
               $arr_name[$i]['date_write'] = $row["date_write"];
               $arr_name[$i]['option_article'] = $row["option_article"];
               $arr_name[$i]['typeProduct'] = $row["typeProduct"];
               $arr_name[$i]['material'] = $row["material"];
              
               }
          $i++;
       }
     }
if (isset($arr_name)) {
            return $arr_name;
      }else {
        $false_arr[] = 1;
        return $false_arr;
      }
     
}


?>