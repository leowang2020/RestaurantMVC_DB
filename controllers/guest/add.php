<?php

if (isset($_POST['action'])) {
    add_food_to_cart($_POST['imgID'], $_POST['price'], $_POST['foodqty']);
    return 'views/cart_view.php';
}
?>