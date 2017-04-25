<?php
//complete code listing for controllers/guest/index.php
if (!isset($_SERVER['HTTPS'])) {
    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
    exit();
}
session_start();
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';
include_once 'models/users_repository.php';

if (isset($_GET['category_id'])){
  $_SESSION['category_id'] =  $_GET['category_id'];
}
    
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_admin'])) {
    $action = "login";
} else {
    $hasAction = isset($_GET['action']);
    if ($hasAction) {
        $action = $_GET['action'];
    } else {
        $action = 'list_foods';
    }
}

$content = include_once "controllers/admin/$action.php";
return $content;
