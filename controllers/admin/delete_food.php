<?php

// Get the IDs
$food_id = $_POST['food_id'];
$category_id = $_POST['category_id'];

// Delete the food
FoodRepository::deleteFood($food_id);

// Display the Food List page for the current category
header("Location: .?controller=admin&category_id=$category_id");

