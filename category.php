<?php
session_start();
if (isset($_GET["id"])){
include_once("model/model.php");
include_once("functions/functions.php");
$category_name=get_category_name($_GET["id"]);
$title=$category_name;
include_once("header.php");



$result=category_products($_GET["id"]);
if($result){
$num_rows=mysqli_num_rows($result);
    $index=0;
foreach($result as $row){
    
        if($index===0){ ?> 
            <table id="category_products"><tr><td><?php card($row) ?></td>
            <?php
            if($index===($num_rows-1)){ ?>
                </tr></table>
            <?php
            }
        }else if(($index%4)===0){ 
            if($index===($num_rows-1)){ ?>
                <td><?php card($row) ?></td></tr></table>
            <?php
            }else{ ?>
                <td><?php card($row) ?></td></tr><tr>
            <?php
            }
        }else if(($index%4)!==0){ 
            if($index===($num_rows-1)){ ?>
                <td><?php card($row) ?></td></tr><table>
            <?php
            }else{ ?>
                <td><?php card($row) ?></td>
            <?php
            }
        }
        $index++;
}
include_once("footer.php");
}
}
?>