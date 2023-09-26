<?php
session_start();
$title="Home";
include_once("header.php");
include_once("functions/functions.php");
include_once("model/model.php"); ?>

<main style="margin-top: 60px;">
<?php

$tags=get_tag();

    foreach($tags as $tag){ 
        $products=check_tag($tag["id"]);
        if($products && mysqli_num_rows($products)>4){ 
            $index=0; ?>
        <table class="tags"><tr class="heading"><td colspan="5"><div><?php echo $tag["tag_name"] ?></td></div></tr>
        <?php
        foreach($products as $row){
    
        if($index===0){ ?> 
            <tr class="content"><td><?php home_item($row) ?></td>
            <?php
        }else if(($index%4)===0){ ?>
            <td><?php home_item($row) ?></td></tr></table>
            <?php
        }else if($index===5){
            break;
        }
        else{ ?>
            <td><?php home_item($row) ?></td>
            <?php
            }
            $index++;
        }
        
}
}
?>
     
   
<p class="label">Featured Categories</p>

<?php
$index=0;
$num_rows=mysqli_num_rows($result);
foreach($result as $row){
    
        if($index===0){ ?> 
            <table id="category_products"><tr><td class="category"><?php category_item($row); ?></td>
            <?php
            if($index===($num_rows-1)){ ?>
                </tr></table>
            <?php
            }
        }else if(($index%3)===0){ 
            if($index===($num_rows-1)){ ?>
                <td class="category"><?php category_item($row); ?></td></tr></table>
            <?php
            }else{ ?>
                <td class="category"><?php category_item($row); ?></td></tr><tr>
            <?php
            }
        }else if(($index%3)!==0){ 
            if($index===($num_rows-1)){ ?>
                <td class="category"><?php category_item($row); ?></td></tr><table>
            <?php
            }else{ ?>
                <td class="category"><?php category_item($row); ?></td>
            <?php
            }
        }
        $index++;
} ?>
</main>
<?php
unset($result);
include_once("footer.php");
?>