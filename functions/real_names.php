<?php
function makerName ($maker) {
  switch ($maker) {
    case 0: {$makerName = "Производитель"; break;}
    case 1: {$makerName = "Gidrolica"; break;}
    case 2: {$makerName = "StandartPark"; break;}
    case 3: {$makerName = "MK_ZHBI"; break;}
    case 4: {$makerName = "Aquastok"; break;}
    break;
}
return $makerName;
}

function typeProductName ($typeProduct) {
switch ($typeProduct) {
  case 0: {$typeRoductName = "Тип продукции"; break;}
  case 1: {$typeRoductName = "Лоток"; break;}
  case 2: {$typeRoductName = "Пескоуловитель"; break;}
  case 3: {$typeRoductName = "Решетка"; break;}
  case 4: {$typeRoductName = "Крепеж"; break;}
  case 5: {$typeRoductName = "Дождеприемник"; break;}
  case 6: {$typeRoductName = "люк"; break;}
  case 7: {$typeRoductName = "Торцевая заглушка"; break;}
  case 8: {$typeRoductName = "Переходник"; break;}
  case 9: {$typeRoductName = "Корзина"; break;}
  break;
}

return $typeRoductName;
}


function materialName ($material) {
switch ($material) {
  case 0: {$materialName = "Материал"; break;}
  case 1: {$materialName = "Пластик"; break;}
  case 2: {$materialName = "Бетон"; break;}
  case 3: {$materialName = "Полимерпесок"; break;}
  case 4: {$materialName = "Сталь"; break;}
  case 5: {$materialName = "чугун"; break;}
  case 6: {$materialName = "композитбетон"; break;}
  case 7: {$materialName = "Полимербетон"; break;}
  break;
}
return $materialName;
}

// функция выбираем название продукта из списка
function dnName($dn) {
  switch ($dn) {
    case 0: {$dnName = "н/д"; break;}
    case 90: {$dnName = "DN90"; break;}
    case 100: {$dnName = "DN100"; break;}
    case 110: {$dnName = "DN110"; break;}
    case 150: {$dnName = "DN150"; break;}
    case 160: {$dnName = "DN160"; break;}
    case 200: {$dnName = "DN200"; break;}
    case 300: {$dnName = "DN300"; break;}
    case 400: {$dnName = "DN400"; break;}
    case 500: {$dnName = "DN500"; break;}
    break;
}
return $dnName;
}