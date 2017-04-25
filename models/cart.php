<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$foods = $_SESSION['food_list'];

// Add a food to the cart
function add_food_to_cart($imgID, $yourPrice, $quantity) {
    global $foods;
    if ($quantity < 1) return;
    
    // If food already exists in cart, update quantity
    if (isset($_SESSION['shop_cart'][$imgID])) {
        $quantity += $_SESSION['shop_cart'][$imgID]['qty'];
        update_food($imgID, $quantity);
        return;
    }
    
    // Add food
    $foodsToAdd = array_filter($foods, function($food) use ($imgID) {
    return $food->getIMGID() === $imgID;});
    
    if (count($foodsToAdd) <= 0) {
        return;
    }
       
    $thisFood = array_values($foodsToAdd)[0];

    $price = $thisFood->getPrice();
    
    $youSaved = ($price - $yourPrice) * $quantity;
    
    $total = $yourPrice * $quantity;
    $food = array(
        'name' => $thisFood->getName(),
        'ourPrice' => $price,
        'yourPrice' => $yourPrice,
        'youSaved' => $youSaved,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['shop_cart'][$imgID] = $food;
}

// Update an food in the cart
function update_food($imgID, $quantity) {
    global $foods;
    $quantity = (int) $quantity;
    if (isset($_SESSION['shop_cart'][$imgID])) {
        if ($quantity <= 0) {
            unset($_SESSION['shop_cart'][$imgID]);
        } else {
            $_SESSION['shop_cart'][$imgID]['qty'] = $quantity;
            
            $total = $_SESSION['shop_cart'][$imgID]['yourPrice'] *
                     $_SESSION['shop_cart'][$imgID]['qty'];
            
            $savedTotal = ($_SESSION['shop_cart'][$imgID]['ourPrice'] - $_SESSION['shop_cart'][$imgID]['yourPrice']) *
                     $_SESSION['shop_cart'][$imgID]['qty'];
            
            $_SESSION['shop_cart'][$imgID]['total'] = $total;
            $_SESSION['shop_cart'][$imgID]['youSaved'] = $savedTotal;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['shop_cart'] as $food) {
        $subtotal += $food['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}

function get_youSaved() {
    $totalSaved = 0;
    foreach ($_SESSION['shop_cart'] as $food) {
        $totalSaved += $food['youSaved'];
    }
    $totalSaved = number_format($totalSaved, 2);
    return $totalSaved;
}
?>
