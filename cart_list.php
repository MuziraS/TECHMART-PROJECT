<?php
session_start();
$title="Cart";
include_once("header.php");
include_once("model/model.php");
include_once("functions/functions.php");
if(empty($_SESSION["mycart"])){ ?>
<div style="text-align: center; margin-top:50px;  margin-top: 50px; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);">
    <div style="margin-bottom:20px;"><img src="icons/techMart.svg" alt="" width="300px"></div>
    <p style="font-weight:bold; font-size: large; margin-bottom:10px;">Your cart is empty!</p><p>Browse our categories and discover our best deals!</p>
    <a href="index.php"><button id="start_shopping">Start Shopping</button></a>
</div>
<?php
}
else{ ?>

    <table class="cart" id="cart_list">
        <tr>
            <td colspan="3" class="curved-top"><p style="font-weight:bold;font-size:larger;">Cart(<?php echo count($_SESSION["mycart"]); ?>)</p></td>
        </tr>
        <tr><td colspan="3"><hr></td></tr>
    <?php

    foreach($_SESSION["mycart"] as $id => $qty){
        // print_r($_SESSION["mycart"]);
        $row=get_product($id); 
        cart_item($row); ?>
        <tr><td colspan="3"><hr></td></tr>
        <?php
    } ?>
    <tr><td colspan="3" class="curved-bottom"></td></tr></table>
    <table class="cart" id="summary">
        <tr><td colspan="2" class="curved-top" style="font-weight:bold;font-size:larger;">Cart Summary</td></tr>
        <tr><td colspan="3"><hr></td></tr>
        <tr><td style="font-weight:bold;">SubTotal</td><td><p>UGX <?php 
        $total=0;
        foreach($_SESSION["mycart"] as $id=>$qty){
            $item_price=get_product($id)["current_price"];
            $total+=($item_price*$qty);
        }
        echo number_format($total,0);
        ?></p></td></tr>
        <tr><td colspan="3"><hr></td></tr>
        <tr><td class="curved-bottom" colspan="3"><a href="checkout.php"><button id="checkout" style="width: 100%; margin:0px;">Checkout</button></a></td></tr>
    </table>
    <?php
}



include_once("footer.php");
?>