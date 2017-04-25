<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Foodstore</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>

        <header>
            <h1>Ordered Food</h1>
        </header>
        <section id="main">

            <h1>Your Cart</h1>
            <?php if (!isset($_SESSION['shop_cart']) || count($_SESSION['shop_cart']) == 0) : ?>
                <p>There are no foods in your cart.</p>
            <?php else: ?>
                <form action="." method="post">
                    <input type="hidden" name="action" value="update"/>
                    <table>
                        <tr id="cart_header">
                            <th>Food</th>
                            <th>Food Price</th>
                            <th>Your Price</th>
                            <th>Quantity</th>
                            <th>Food Total</th>
                        </tr>

                        <?php
                        foreach ($_SESSION['shop_cart'] as $imgID => $food) :
                            $yourPrice = number_format($food['yourPrice'], 2);
                            $ourPrice = number_format($food['ourPrice'], 2);
                            $total = number_format($food['total'], 2);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $food['name']; ?>
                                </td>
                                <td>
                                    $<?php echo $ourPrice; ?>
                                </td>
                                <td>
                                    $<?php echo $yourPrice; ?>
                                </td>
                                <td>
                                    <input type="text"
                                           name="newqty[<?php echo $imgID; ?>]"
                                           value="<?php echo $food['qty']; ?>"/>
                                </td>
                                <td>
                                    $<?php echo $total; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"><b>Subtotal</b></td>
                            <td>$<?php echo get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>You saved</b></td>
                            <td>$<?php echo get_youSaved(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="submit" value="Update Cart"/>
                            </td>
                        </tr>
                    </table>
                    <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove a food.
                    </p>
                </form>
            <?php endif; ?>
            <p><a href=".?action=list_foods">Add Food</a></p>
            <p><a href=".?action=empty_cart">Empty Cart</a></p>

        </section>
    </body>
</html>
