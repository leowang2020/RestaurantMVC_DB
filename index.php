<?php

/* 
 * Student Info: Name=JunWang, ID=12113
 * Subject: CS526A_HW#6_Spring_2016
 * Author: Jun
 * Filename: index.php
 * Date and Time: Mar 12, 2016 8:25:49 PM
 * Project Name: RestaurantMVC_DB
 */
//echo password_hash("abc", PASSWORD_DEFAULT);
//$isvalid = password_verify('abc', '$2y$10$JRIII.sSHoatOvARajUvqu5y3Vo.AFI5zPNB2CcEunVjlkqXBrJuy');
//echo $isvalid;

include_once "models/PageData.php";
$pageData = new PageData();
$pageData->name = "Online Restaurant";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');

//connect to database
include_once "db/dbcontext.php";
$db = DBContext::getDB();

$pageData->navigation = include_once "views/navigation_front.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "guest";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";