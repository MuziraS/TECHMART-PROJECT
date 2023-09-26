<?php
function card($row){
    $html="
    
    <div class='card-body'>
    <a href='product_view.php?id={$row['id']}' title='{$row['name']}'><img src='images/{$row['image_name']}' class='card-img' alt='...' />
      <p class='description'>{$row['name']}</p>
      <p style='margin-bottom: 5px; margin-top:10px;'>UGX ".number_format($row['current_price'],0)."</p>";
      if($row['previous_price']){
        $html.="<p style='opacity:0.7;'><s>UGX ".number_format($row['previous_price'],0)."</s></p></a>";
      }
      $html.="<a href='cart.php?id={$row['id']}'><button type='submit' class='add_cart'>add to cart</button></a></div>";
  echo $html;
}

//redirect function
function redirect($url){
  header("Location: $url");
  exit();
}



  function cart_item($row){ 
    $html="<tr>
      <td><img src='images/{$row['image_name']}' alt='' style='width:100px;height:100px;'></td>
      <td><p style='width: 500px;'>{$row['name']}</p></td>
      <td><p style='margin-bottom: 10px;font-weight:bold;'>UGX ".number_format($row['current_price'], 0)."</p><p style='opacity:0.7;'><s>UGX ".number_format($row['previous_price'], 0)."</s></p></td>
    </tr>
    <tr>
      <td><a href='cart.php?id={$row['id']}&action=remove'><button type='submit' class='remove' name='remove' style='width:100px;font-size:15px;'>REMOVE</button></a></td><td></td>
      <td><a href='cart.php?id={$row['id']}&action=minus'><button class='minus' type='submit' name='minus'>&#8722;</button></a><input type='text' value='{$_SESSION['mycart'][$row['id']]}' readonly class='quantity'><a href='cart.php?id={$row['id']}&action=plus'><button class='plus' type='submit' name='plus'>&#43;</button></a></td>
    </tr>";
    echo $html;
  }

//category item
function category_item($row){
  $html="<a href='category?id={$row['id']}'><img src='images/{$row['image_name']}' alt=''><p>{$row['category']}</p></a>";
  echo $html;
}

//home item
function home_item($row){
  $html=" 
  <div class='card-body' style='padding: 10px;'>
  <a href='product_view.php?id={$row['id']}' title='{$row['name']}'><img src='images/{$row['image_name']}' class='card-img' alt='...' /><p class='description'>{$row['name']}</p></a></div>";
echo $html;
}