<?php
/* 
 * Student Info: Name=JunWang, ID=12113
 * Subject: CS526A_HW#6_Spring_2016
 * Author: Jun
 * Filename: index.php
 * Date and Time: Mar 12, 2016 8:25:49 PM
 * Project Name: RestaurantMVC_DB
 */

$request = explode('/', $_GET['PATH_INFO']);
array_shift($request);
$category = strtolower(array_shift($request));

$method = strtolower($_SERVER["REQUEST_METHOD"]);
switch ($method) {
    case 'get':
        switch($category) {
            case 'breakfast':
                header("Location: ../../index.php?controller=admin&category_id=1");
                break;
            case 'lunch':
                header("Location: ../../?controller=admin&category_id=2");
                break;
            case 'dinner':
                header("Location: ../../?controller=admin&category_id=3");
                break;
            case 'drink':
                header("Location: ../../?controller=admin&category_id=4");
                break;
        }
        break;
    case 'post':
                $body = file_get_contents('php://input');
        switch (strtolower($_SERVER['HTTP_CONTENT_TYPE'])) {
            case "application/json":
                $food = json_decode($body);
                break;
            case "text/xml":
                // parsing here
                break;
            default:
                $food = $body;
        }
        // Validate input

        // Create new Resource
        //$id = call_user_func(array($resource, $method), $request);
        $id = foods::post($food); // Returns id of 1234
        $json = json_encode(array('id' => $id));
        http_response_code(201); // Created
        $site = 'localhost';
        header("Location: $site/" . $_SERVER['REQUEST_URI'] . "/$id");
        header('Content-Type: application/json');
        print $json;
        break;
    case 'put':
        $body = file_get_contents('php://input');
        switch (strtolower($_SERVER['HTTP_CONTENT_TYPE'])) {
            case "application/json":
                $food = json_decode($body);
                break;
            case "text/xml":
                // parsing here
                break;
            default:
                //print_r($_SERVER['HTTP_CONTENT_TYPE']);
        }
        // Validate input

        // Modify the Resource
        $id = array_shift($request);
        $id = foods::put($food, $request[0]); // Uses id from request
        http_response_code(204); // No conent
        break;
    case 'delete':
        // Delete the Resource
        $id = array_shift($request);
        $id = foods::delete($food, $request[0]); // Uses id from request
        http_response_code(204); // No conent
        break;
    default:
        http_response_code(405);
}
