<?php 
require_once("functions/select_params.php");


if (!empty($_GET['maker']))       {  $maker = $_GET['maker'];  }
if (!empty($_GET['typeProduct'])) {  $typeProduct = $_GET['typeProduct'];  }
if (!empty($_GET['material']))    {  $material = $_GET['material'];  }
if (!empty($_GET['dn']))          {  $dn = $_GET['dn'];  }
if (!empty($_GET['width']))       {  $width = $_GET['width'];  }
if (!empty($_GET['delta_width'])) {  $delta_width = $_GET['delta_width'];  }
if (!empty($_GET['height']))      {  $height = $_GET['height'];  }
if (!empty($_GET['delta_height'])){  $delta_height = $_GET['delta_height'];  }
if (!empty($_GET['load_class']))  {  $load_class  = $_GET['load_class'];  }
if (!empty($_GET['uklon']))       {  $uklon  = $_GET['uklon'];  }
if (!empty($_GET['sort']))        {  $sort  = $_GET['sort'];  }

$get_param=0; // количество передаваемых параметров в ГЕТ запросе
!isset($maker)?$maker = "": $get_param++ ;
!isset($typeProduct)?$typeProduct = "": $get_param++;
!isset($material)?$material = "": $get_param++  ;
!isset($dn)? $dn = "" : $get_param++ ;
!isset($width)?$width = "": $get_param++  ;
!isset($height)?  $height = "" : $get_param++ ;
!isset($load_class)? $load_class = "": $get_param++ ;
!isset($uklon)? $uklon = "": $get_param++ ;
!isset($delta_width)? $delta_width = "": $get_param++ ;
!isset($delta_height)? $delta_height = "": $get_param++ ;
!isset($sort)? $sort = "": $get_param++ ;


// echo "maker=". $maker."<br>";
// echo "typeProduct=". $typeProduct."<br>";
// echo "material=". $material."<br>";
// echo "dn=". $dn."<br>";
// echo "width=". $width."<br>";
// echo "height=". $height."<br>";
// echo "load_class=". $load_class."<br>";
// echo "uklon=". $uklon."<br>";


// Создаем массив по всем параметрам, есЛи не выбран ни один параметр, то выводим все таблицу
$get_param>0 ? $arr_for_upper_form = selectForCapWhereAll($mysqli, $maker, $typeProduct, $material,$dn , $width , $height , $load_class, $uklon, $delta_width,$delta_height, $sort):$arr_for_upper_form=selectAllArr($mysqli);
$i = "";
foreach ($arr_for_upper_form as $arr) {
    $arr_maker[$i] = $arr['maker'];
    $arr_typeProduct[$i] = $arr['typeProduct'];
    $arr_material[$i] = $arr['material'];
    $arr_dn[$i] = $arr['DN'];
    $arr_width[$i] = $arr['width'];
    $arr_height[$i] = $arr['height'];
    $arr_hload_class[$i] = $arr['load_class'];
 $i++;
 }

$arr_maker = array_unique($arr_maker);
$arr_typeProduct = array_unique($arr_typeProduct);
$arr_material = array_unique($arr_material);
$arr_dn = array_unique($arr_dn);
$arr_width = array_unique($arr_width);
$arr_height = array_unique($arr_height);
$arr_hload_class = array_unique($arr_hload_class);


// echo "<pre>";
// var_dump ($arr_dn);
// echo "<pre>";


asort($arr_maker);
asort($arr_typeProduct);
asort($arr_material);
asort($arr_dn);
asort($arr_width);
asort($arr_height);
asort($arr_hload_class);

// var_dump($arr_new_width);
echo <<<HTML
    
  <form>
    <div  class ="up_form">
<!--     ТИП ПРОДУКТА   -->
    <div class="mobile_web">
    <select size="1" name="maker">
HTML;



$maker_temp = selectMakerFromPerem($maker); // функция выбора производителя товара

echo  " <option selected value=".$maker.">".$maker_temp."</option>";
echo  " <option value=\"\">сброс</option>";

  foreach ($arr_maker  as $arr_m) 
    { 
        $arr_m_temp = selectMakerFromPerem($arr_m); // функция выбора производителя товара
        echo "<option value=".$arr_m.">".$arr_m_temp."</option>";
    }
   echo "</select> 
         </div>";

//    ТИП ПРОДУКТА   ********************************************************************        
echo <<<HTML
         <div class="mobile_web">
         <select size="1" name="typeProduct">
HTML;

$typeProduct_temp = selectTypeProductFromPerem($typeProduct); // функция выбираем название продукта из списка
// echo  " <option disabled >Тип продукции</option>";
    echo "<option selected value=".$typeProduct.">".$typeProduct_temp."</option>";
    echo  " <option value=\"\">сброс</option>";

  foreach ($arr_typeProduct  as $arr_t) 
            {
                $typeProduct_temp = selectTypeProductFromPerem($arr_t);// функция выбираем название продукта из списка
                echo "<option value=".$arr_t.">".$typeProduct_temp."</option>";
            }
    echo <<<HTML
    </select>
  </div>
HTML;  
//ТИП ПРОДУКТА КОНЕЦ  ********************************************************************   -->

//           UKLON          -->
$uklon_temp = "";
if ($uklon == 1) {
  $uklon_temp = "checked" ;
}

  echo "<div class=\"mobile_web\">";
  echo      "<input type=\"checkbox\" name=\"uklon\" value=\"1\" ".$uklon_temp.">Уклон
            </div> ";




//  ГИДРАВЛИЧЕСКОЕ СЕЧЕНИЕ ****************************************************************


echo <<<HTML
            <div class="mobile_web">
            <select size ="1" name="dn">
HTML;
// echo  " <option disabled >Гидр.сечение</option>";

$dn_temp = selectDnFromPerem($dn);
echo  " <option selected value=\"" . $dn . "\">" . $dn_temp . "</option>";

echo  " <option value=\"\">сброс</option>";

foreach ($arr_dn as $arr_x) {
  $dn_temp = selectDnFromPerem($arr_x);
  echo "<option value=" . $arr_x . ">" . $dn_temp . "</option>";
}
echo <<<HTML
       </select>
           </div>
HTML;


//  ТИП МАТЕРИАЛА ****************************************************************

echo <<<HTML
    <div class="mobile_web">
       <select size ="1" name="material">
HTML;
$material_temp = selectMaterialFromPerem($material);
echo  " <option selected value=\"".$material."\">".$material_temp."</option>";
echo  " <option value=\"\">сброс</option>";
       foreach ($arr_material as $arr_x) 
          {
            $material_temp = selectMaterialFromPerem($arr_x);
            echo "<option value=".$arr_x.">".$material_temp."</option>";
          }
echo <<<HTML
       </select>
    </div>
HTML;


//     ШИРИНА   ********************************************************************    
echo <<<HTML
         <div class="mobile_web">
            <select size ="1" name="width">
HTML;

if ($width == "")  {echo  " <option value= \"\">Ширина</option>";}
 else {
    echo  " <option selected value=\"".$width."\">".$width."</option>";     
    }
    echo  " <option value=\"\">сброс</option>";
                    foreach ($arr_width  as $arr_w) 
                      {
                          echo "<option value=".$arr_w.">".$arr_w."</option>";
                      }
echo <<<HTML
       </select>
     </div>
HTML;



//   ДЕЛЬТА Ширины     ********************************************************************    

echo <<<HTML
            <div class="mobile_web">
            <select size ="1" name="delta_width">
HTML;
   
if ($delta_width <> "") {
     echo " <option selected value=".$delta_width.">".$delta_width."</option>";
      }
     else {
      echo  " <option selected disabled >/\W</option>";     
     }
      echo  " <option value=\"\">сброс</option>";
   for ($i=1;$i <21;$i++) {
           echo "<option value=".$i.">".$i."</option>";
                      }
echo <<<HTML
       </select>
           </div>
HTML;



//     ВЫСОТА     ********************************************************************    

echo <<<HTML
            <div class="mobile_web">
            <select size ="1" name="height">
HTML;


if ($height == "")  {echo  " <option value= \"\">Высота</option>";}
 else {
    echo  " <option selected value=\"".$height."\">".$height."</option>";     
    }
    echo  " <option value=\"\">сброс</option>";
                    foreach ($arr_height as $arr_h) 
                      {
                          echo "<option value=".$arr_h.">".$arr_h."</option>";
                      }
echo <<<HTML
       </select>
           </div>
HTML;


//   ДЕЛЬТА ВЫСОТы     ********************************************************************    
echo <<<HTML
            <div class="mobile_web">
            <select size ="1" name="delta_height">
HTML;
   
if ($delta_height <> "") {
     echo " <option selected value=".$delta_height.">".$delta_height."</option>";
      }
     else {
      echo  " <option selected disabled >/\H</option>";     
     }
      echo  " <option value=\"\">сброс</option>";
   for ($i=1;$i <21;$i++) {
           echo "<option value=".$i.">".$i."</option>";
                      }
echo <<<HTML
       </select>
           </div>
HTML;

//   Сортировка     ********************************************************************    

echo <<<HTML
            <div class="mobile_web">
            <select size ="1" name="sort">
                <option  value selected="">Сортировка</option>
                <option value="">сброс</option>
                <option  value="width">Ширина</option>
                <option  value="height">Высота</option>
            </select>
           </div>
HTML;
//////////////////////////////////////////////////////////////
echo <<<HTML

             <button type="submit">ОБНОВИТЬ</button>
        </div>
    </div>
   
</form>
<form>
<button type="submit">СБРОСИТЬ</button>
        </div>
    </div>
   
</form>
HTML;


// echo "
// <form action="?.width=".$width."" method="get" id="foobar">
//     <select name="year" onchange="document.getElementById('foobar').submit()">
//         <option></option>
//         <option>2010</option>
//         <option>2011</option>
//     </select>
//   </form>";

unset($arr_maker);
unset($arr_width);
unset($arr_height);
unset($arr_hload_class);

// unset($arr_for_upper_form);
