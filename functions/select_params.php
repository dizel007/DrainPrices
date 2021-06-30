<?php
// функция выбора производителя товара из списка
function selectMakerFromPerem($maker) {
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
// функция выбираем название продукта из списка
function selectTypeProductFromPerem($typeProduct) {
  switch ($typeProduct) {
    case 0: {$typeRoductName = "Тип продукции"; break;}
    case 1: {$typeRoductName = "Лоток"; break;}
    case 2: {$typeRoductName = "Пескоуловитель"; break;}
    case 3: {$typeRoductName = "Решетка"; break;}
    case 6: {$typeRoductName = "Торцевая заглушка"; break;}
    case 7: {$typeRoductName = "Переходник"; break;}
    case 8: {$typeRoductName = "Корзина"; break;}
    
     
    break;
}
return $typeRoductName;
}

// функция выбираем название продукта из списка
function selectDnFromPerem($dn) {
  switch ($dn) {
    case 0: {$dnName = "Гидр.Сечен"; break;}
    case 90: {$dnName = "DN90"; break;}
    case 100: {$dnName = "DN100"; break;}
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

// функция выбирает материал продукта из списка
function selectMaterialFromPerem($material) {
      switch ($material) {
        case 0: {$materialName = "Материал"; break;}
        case 1: {$materialName = "Пластик"; break;}
        case 2: {$materialName = "Бетон"; break;}
        case 3: {$materialName = "Полимербетон"; break;}
        case 4: {$materialName = "Сталь"; break;}
        case 5: {$materialName = "чугун"; break;}
        break;
    }

return $materialName;
}

?>