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
echo "
<div class =\"up_form\">

<div class=\"mobile_web\">
<form action=\"\" method=\"get\" id=\"ppppp\">
    <label for=\"width\">Ширина : </label>
    <select size =\"1\" name=\"width\" onchange=\"document.getElementById('ppppp').submit()\">";
       foreach ($arr_width  as $arr_x) 
         {
             if (($_GET['width'] == $arr_x)) 
                      {
                  echo "<option selected width=\"".$arr_x."\">".$arr_x."</option>";
                      } else {
                    echo "<option width=\"".$arr_x."\">".$arr_x."</option>";
                      }
        }
        echo "</select>
</form>
</div>

    <div class=\"mobile_web\">
        <form action=\"index.php?width=100&height=".$height."\" method=\"get\" id=\"ppppp1\">
            <label for=\"height\">Высота : </label>
            <select size =\"1\" name=\"height\" onchange=\"document.getElementById('ppppp1').submit()\">";
               foreach ($arr_height  as $arr_x) 
                 {
                     if (($_GET['height'] == $arr_x)) 
                              {
                          echo "<option selected height=\"".$arr_x."\">".$arr_x."</option>";
                              } else {
                            echo "<option height=\"".$arr_x."\">".$arr_x."</option>";
                              }
                }
                echo "</select>
        
                </form>
        
    </div>





</div>

";


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