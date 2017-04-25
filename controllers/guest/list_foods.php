<?php

$category_id = 1;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
$categories = CategoryRepository::getCategories();
$category = CategoryRepository::getCategory($category_id);
$foods = FoodRepository::getFoodsByCategory($category_id);
$_SESSION['food_list'] = $foods;
return 'views/food_list_view.php';

