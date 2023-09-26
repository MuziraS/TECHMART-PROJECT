<?php 
$title="add product";
include_once("header.php"); ?>
<div class="form-container">
    <form action="handle.php" method="post" enctype="multipart/form-data">
        <div id="form">
        <legend>New Product</legend>
        <div class="form_row"><textarea name="name" id="" cols="31" rows="3" placeholder="Product description" required></textarea></div>
        <div class="form_row"><input type="number" name="current_price" placeholder="Current price" required></div>
        <div class="form_row"><input type="number" name="previous_price" placeholder="Previous price" required></div>
        <div class="form_row"><select name="category" style="margin-right: 50px;">
            <option disabled selected>Category</option>
            <?php
            $categories=get_category();
            foreach($categories as $category){ ?>
            <option value="<?php echo $category["id"]; ?>"><?php echo $category["category"]; ?></option>
            <?php
            } ?>
        </select></div>
        <div class="form_row"></label><select name="tag" required>
            <option disabled selected>Tag</option>
            <option value="NULL" >None</option>
            <?php 
            $tags=get_tag();
            foreach($tags as $tag){ ?>
                <option value="<?php echo $tag["id"]; ?>"><?php echo $tag["tag_name"];  ?></option>
            <?php
            } ?>            
        </select></div>
        
        <div class="form_row"><input type="number" name="qty" placeholder="Quantity available" required></div>
        <div class="form_row"><input type="file" id="imageInput" name="image" accept="image/*" onchange="previewImage(event)" required></div>
        <div class="form_row "><img id="imagePreview" src="#" alt="Image Preview" style="display: none; height: 200px; width: 200px; margin: 0px 50px;"></div>
        <div class="form_row"><button type="submit" name="new_product">ADD</button></div>
        
  
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
</body>
</html>