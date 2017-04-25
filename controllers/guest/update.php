<?php

/* 
 * Student Info: Name=JunWang, ID=12113
 * Subject: CS526A_HW#5_Spring_2016
 * Author: Jun
 * Filename: update.php
 * Date and Time: Mar 23, 2016 9:15:48 PM
 * Project Name: RestaurantMVC_DB
 */

$new_qty_list = $_POST['newqty'];
foreach ($new_qty_list as $imgID => $qty) {
    if ($_SESSION['shop_cart'][$imgID]['qty'] != $qty) {
        update_food($imgID, $qty);
    }
}
return 'views/cart_view.php';

