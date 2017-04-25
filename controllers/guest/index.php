<?php

if (isset($_SERVER['HTTPS'])) {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
    exit();
}
 


include_once 'models/food.php';

// Start session management with a persistent cookie
$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}

// Create a food list array if needed
if (empty($_SESSION['food_list'])) {
    $_SESSION['food_list'] = array();
}

//complete code listing for controllers/guest/index.php
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';
include_once 'models/cart.php';


if (isset($_POST['imgID']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['foodqty'])) {
    $imgID = $_POST['imgID'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['foodqty'];
    //$foods[$imgID] = array('name' => $name, 'price' => $price);
    //add_food_to_cart($imgID, $quantity);
}

// Include cart functions
require_once 'models/cart.php';

$hasAction = isset($_GET['action']);
//$hasAction = isset($_POST['action']);

if ($hasAction) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'list_foods';
}

//$content = include_once 'views/navigation_guest.php';
$content = include_once "controllers/guest/$action.php";
return $content;
