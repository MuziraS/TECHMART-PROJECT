<?php
if(isset($_GET["id"])){
    
$title="update product";
include_once("header.php");
$id=$_GET["id"];
$product=get_product($id);
echo $product["tag"];
include_once("header.php"); ?>
<div class="form-container">
    <form action="handle.php" method="post" enctype="multipart/form-data">
        <div id="form">
        <legend>Update Product</legend>
        <div class="form_row"><textarea name="name" id="" cols="31" rows="3" required><?php echo $product["name"];  ?></textarea></div>
        <div class="form_row"><input type="number" name="current_price" value="<?php echo $product["current_price"];  ?>" required></div>
        <div class="form_row"><input type="number" name="previous_price" value="<?php echo $product["previous_price"];  ?>" required></div>
        <div class="form_row"><select name="category" style="margin-right: 50px;">
            <option disabled >Category</option>
            <?php
            $categories=get_category();
            foreach($categories as $category){ ?>
            <option value="<?php echo $category["id"]; ?>" <?php if($category["id"] === $product["category"]){ ?>selected <?php } ?>><?php echo $category["category"]; ?></option>
            <?php
            } ?>
        </select></div>
        <div class="form_row"></label><select name="tag">
            <option disabled>Add Tag</option>
            <option selected>None</option>
            <?php 
            $tags=get_tag();
            foreach($tags as $tag){ ?>
                <option value="<?php echo $tag["id"]; ?>" <?php if($tag["id"] === $product["tag"]){ ?>selected <?php } ?>><?php echo $tag["tag_name"];  ?></option>
            <?php
            } ?>            
        </select></div>
        
        <div class="form_row"><input type="number" name="qty" value="<?php echo $product["qty"];  ?>" required></div>
        <div class="form_row"><input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(event)" ></div>
        <div class="form_row "><img id="imagePreview" src="#" alt="Image Preview" style="display: none; height: 200px; width: 200px; margin: 0px 50px;"></div>
        <div class="form_row"><button type="submit" name="update_product">ADD</button><input type="hidden" name="id" value="<?php echo $id; ?>"></div>
        
  
        </div>
    </form></div>
    <script>

function previewImage(event) {
            var input = event.target;
            var imagePreview = document.getElementById("imagePreview");

            if (input.files.length > 0) {
                var reader = new FileReader();

                reader.onload = function(e) {
                imagePreview.setAttribute("src", e.target.result);
                imagePreview.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.setAttribute("src", "#");
                imagePreview.style.display = "none";
            }
}
    </script>
<?php 
exit(); 
} ?>
</body>
</html>
<?php
include_once("../functions/functions.php");
redirect("../index.php");
?>
