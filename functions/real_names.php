<?php
function makerName ($maker) {
  switch ($maker) {
    case 0: {$maker_temp = "Производитель"; break;}
    case 1: {$maker_temp = "Gidrolica"; break;}
    case 2: {$maker_temp = "StandartPark"; break;}
    case 3: {$maker_temp = "MK ZHBI"; break;}
    case 4: {$maker_temp = "Aquastok"; break;}
    break;
}
return $maker_temp;
}

function typeProductName ($typeProduct) {
switch ($typeProduct) {
  case 0: {$typeProduct_temp = "Тип продукции"; break;}
  case 1: {$typeProduct_temp = "Лоток"; break;}
  case 2: {$typeProduct_temp = "Пескоуловитель"; break;}
  case 3: {$typeProduct_temp = "Решетка"; break;}
  case 4: {$typeProduct_temp = "Решетка22"; break;}
  case 5: {$typeProduct_temp = "Решетка33"; break;}
  break;
}
return $typeProduct_temp;
}


function materialName ($material) {
switch ($material) {
  case 0: {$material_temp = "Материал"; break;}
  case 1: {$material_temp = "Пластик"; break;}
  case 2: {$material_temp = "Бетон"; break;}
  case 3: {$material_temp = "Полимербетон"; break;}
  case 4: {$material_temp = "Сталь"; break;}
  case 5: {$material_temp = "чугун"; break;}
  break;
}
return $material_temp;
}