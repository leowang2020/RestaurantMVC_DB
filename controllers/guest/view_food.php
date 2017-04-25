<?php

$food_id = 1;
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
}
$categories = CategoryRepository::getCategories();
$food_id = $_GET['food_id'];
$food = FoodRepository::getFood($food_id);
return 'views/food_view.php';