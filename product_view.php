<?php
session_start();
if(isset($_GET["id"])){
include_once("model/model.php");
$product=get_product($_GET["id"]);
$title=$product["name"];
include_once("header.php");
?>
<div  id="product_view">
<table>
<tr>
      <td><img src="images/<?php echo $product['image_name']; ?>" alt='' style='width:200px;height:200px;'></td>
      <td><p style='width: 400px;'><?php echo $product['name']; ?></p><p style="text-align:center;margin-top:10px;"><a href="cart.php?id=<?php echo $_GET["id"]; ?>"><button class="add_cart">add to cart</button></a></p></td>
      <td><p style='margin-bottom: 10px;font-weight:bold; width:100px;'>UGX <?php echo number_format($product['current_price'], 0) ?></p><p style='opacity:0.7;'><s>UGX <?php echo number_format($product['previous_price'], 0) ?></s></p></td>
</tr>
</table>
</td>
      </tr>
    </table>
</div>

<?php

include_once("footer.php");
}

?>