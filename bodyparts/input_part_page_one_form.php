<?php 

$arr_for_upper_form = selectAllArr($mysqli);

$i = "";
foreach ($arr_for_upper_form  as $arr) {
    $arr_maker[$i] = $arr['maker'];
    $arr_width[$i] = $arr['width'];
    $arr_height[$i] = $arr['height'];
    $arr_hload_class[$i] = $arr['load_class'];
 $i++;
 }
$arr_maker = array_unique($arr_maker);
$arr_width = array_unique($arr_width);
$arr_height = array_unique($arr_height);
$arr_hload_class = array_unique($arr_hload_class);

asort($arr_maker);
asort($arr_width);
asort($arr_height);
asort($arr_hload_class);

// var_dump($arr_new_width);
echo "<form>
    <div  class =\"up_form\">
          <div class=\"mobile_web\">
            <select size=\"1\" name=\"typeProduct\">
                <option selected value=\"0\">Выберите тип товара</option>
                <option value=\"1\">Лоток</option>
                <option value=\"2\">Решетка</option>
                <option value=\"3\">Комплект</option>
                <option value=\"4\">Пескоуловитель</option>
            </select>
            </div>

            <div class=\"mobile_web\">
              <select size=\"1\" name=\"material\">
                  <option selected value=\"0\">Выберите материал</option>
                  <option value=\"1\">Пластик</option>
                  <option value=\"2\">Бетон</option>
                  <option value=\"3\">Полимербетон</option>
                  <option value=\"4\">Полимерпесок</option>
              </select>
            </div>
            <div class=\"mobile_web\">
            <select size=\"1\" name=\"dn\">
                <option selected value=\"0\">Выберите DN</option>
                <option value=\"9\">DN90</option>
                <option value=\"1\">DN100</option>
                <option value=\"11\">DN100</option>
                <option value=\"15\">DN150</option>
                <option value=\"16\">DN160</option>
                <option value=\"2\">DN200</option>
                <option value=\"3\">DN300</option>
                <option value=\"4\">DN400</option>
                <option value=\"5\">DN500</option>
                
            </select>
            </div>

            <div class=\"mobile_web\">
                  <select size =\"1\" name=\"width\">
                  <option selected value=\"0\">Выберите ширину</option>";
                    foreach ($arr_width  as $arr_x) 
                      {
                          echo "<option width=\"".$arr_x."\">".$arr_x."</option>";
                      }
                      echo "</select>
            </div>
            
            <div class=\"mobile_web\">
            <select size =\"1\" name=\"height\">
            <option selected value=\"0\">Выберите высоту</option>";
              foreach ($arr_height  as $arr_x) 
                {
                    echo "<option height=\"".$arr_x."\">".$arr_x."</option>";
                }
                echo "</select>
      </div>
     
              <div class=\"mobile_web\">
              <select size=\"1\" name=\"clNagr\">
                  <option selected value=\"0\">Выберите класс нагрузки</option>
                  <option value=\"1\">A15</option>
                  <option value=\"2\">B125</option>
                  <option value=\"3\">C250</option>
                  <option value=\"4\">D400</option>
                  <option value=\"5\">E600</option>
                  <option value=\"6\">F900</option>
              </select>
            </div>


            
            <button type=\"submit\">ОБНОВИТЬ</button>
        </div>
    </div>
   
</form>";


// <form action="" method="get" id="foobar">
//     <select name="year" onchange="document.getElementById('foobar').submit()">
//         <option></option>
//         <option>2010</option>
//         <option>2011</option>
//     </select>
//   </form>




unset($arr_maker);
unset($arr_width);
unset($arr_height);
unset($arr_hload_class);

unset($arr_for_upper_form);




?>