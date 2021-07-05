<?php
// require_once "../connect_DB";
require_once ("../bodyparts/header.php"); // header HTML
require_once ("../connect_DB.php");
require_once ("../functions/makeArrFromObj.php");

// mb_internal_encoding("UTF-8");  // не работает
echo "НАЧАТ ВВОД ДАННЫХ ......... <br>";
$handle = fopen ("../_standartPark_beton_.txt", "r");
$array = null;
$zzz = 0;
if ($handle) {

   while (($buffer = fgets($handle)) !== false) {
      if ($zzz == 0)  { 
         $buffer = substr($buffer, 0, -3);  //substr($buffer, 3, -3); // Костыль чтобы вводить UTF-8 
        $zzz++;
        }
        else {
          $buffer = substr($buffer, 0, -3); 
        }

$arr = makeArrFromString($buffer); // делаем из строки с данным массив, чтобы выбрать артикул и производитель оттуда

$article = $arr[2]; // получаем артикул строки
$article = substr($article, 1, -1); // Костыль чтобы вводить UTF-8 
$maker = $arr[1]; // производитель товара
$maker = substr($maker, 1, -1); // Костыль чтобы вводить UTF-8 


// echo "<br> ooooooooooo--".$maker."--hhhhhhhhhhhhhh<br>";


$tempArr = findProductFromDb($article, $maker); // доставем из БД массив с данным артикулом

// echo "<pre>";
// var_dump ($arr);
// echo "<pre>";

if (($tempArr[0]['article'] == $article) and ($tempArr[0]['maker'] == $maker)) {
  // если такой артикул уже есть , то обновляем строку
   echo "<br> Артикул ".$article. " существует, обновляем данные c ценами по нему <br>";

   $price_old = $tempArr[0]['price'];
   $discount_old = $tempArr[0]['discount'];
   $price_new = $arr[10];
   $discount_new = $arr[11];
// Если цена или скидка изменилась , то записываем новую цену и скидку . Также обновляем дату записи
   if (($price_new != $price_old ) or ($discount_new != $discount_old)) {
          $article_t = "'".$article."'";
          $sql = "UPDATE `line_drain_lotki` SET `price` = $price_new, `discount` = $discount_new, `date_write` = CURDATE() WHERE `article` = $article_t";
          echo "ZZZ==  ".$sql." ==ZZZ<br><br>";

          $query = $mysqli->query($sql);
          if (!$query){
            echo "WE ARE DIE";
          die();
          printf("Соединение не удалось: ");
          }
          else {
            echo "WE DO IT MOTHER FUCKER<br>";
          }
   }  
} 
 else 
   {
   // Если артикул отсутствует, то вводим новую строку
      echo "<br>Добавляем новый товар<br>";       
      $sql = "INSERT INTO `line_drain_lotki` (`id`, `maker`, `article`, `name`, `DN`, `length`, `width`, `height`, `load_class`, `weight`, `price`, `discount`, `date_write`, `option_article`, `typeProduct`, `material` , `uklon`) VALUES $buffer";

       echo "<--".$sql."--><br>";
    
       $query = $mysqli->query($sql);
            if (!$query){
              echo "WE ARE DIE";
            die();
            printf("Соединение не удалось: ");
            }
            else {
              echo "Товар добавлен <br>";
            }
     }



      
    }
}
fclose($handle);
 
// echo "<pre>"; print_r($array)."<br>"; echo "</pre>";

function makeArrFromString ($buffer){
  $arr = explode(",", $buffer);
return $arr;
}

function findProductFromDb ($article, $maker) {


  $host="localhost";//имя  сервера
  $user="root";//имя пользователя
  $password="";//пароль
  $db="drain_prices";//имя  базы данных
  // подключаемся к БД
  
  $mysqli = new mysqli ($host, $user, $password, $db) or die("Нет подключения"); //подключение к серверу
  $mysqli->query("SET NAMES 'utf8'");
  
   // require_once ("../connect_DB.php");
   $article="'".$article."'"; 
   $sql = "SELECT *  FROM  `line_drain_lotki` WHERE `article` = $article and `maker` = $maker";
    // echo "<br>11111111---".$sql."----11111111111111<br>";
    $query = $mysqli->query($sql);
    $findArr = makeArrayFromObj($query);
  return $findArr;
}






  echo "END. <br>";
  
?>