<?php

$addFoodSubmitted = isset($_POST['addfood_submitted']);
if ($addFoodSubmitted) {
    $category_id = $_POST['category_id'];
    $imgID = $_POST['imgID'];
    $name = $_POST['food_name'];
    $price = $_POST['food_price'];

    // Validate the inputs
    if (empty($imgID) || empty($name) || empty($price)) {
        $error = "Invalid food data. Check all fields and try again.";
        include('db/db_error.php');
    } else {
        $category = CategoryRepository::getCategory($category_id);
        $food = new Food($imgID, $name, $price, $category);
        FoodRepository::addFood($food);
        
        // Display the Food List page for the current category
        header("Location: .?controller=admin&category_id=$category_id");
    }
}
else
{
    $categories = CategoryRepository::getCategories();
    return 'views/add_food_view.php';
}
