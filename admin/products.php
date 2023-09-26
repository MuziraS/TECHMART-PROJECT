<?php
session_start();
$title="Products List";
include_once("../model/model.php");
include_once("header.php"); 
$result=get_products();
if(isset($result)){ ?>
<table id="admin_products"><tr>
    <th>Name</th>
    <th>Current Price</th>
    <th>Previous Price</th>
    <th>Quantity</th>
    <th>Category</th>
    <th>Tag</th>
    <th>Image</th>
    <th>Options</th>
</tr>

<?php
foreach($result as $row){ ?>
<tr>
    <td><b><?php echo $row["name"]; ?></b></td>
    <td><?php echo number_format($row["current_price"],0); ?></td>
    <td><?php if($row["previous_price"]){echo number_format($row["previous_price"],0);}else{echo "None";} ?></td>
    <td><?php echo $row["qty"]; ?></td>
    <td><?php echo get_category_name($row["category"]); ?></td>
    <td><?php if($row["tag"]){echo get_tag_name($row["tag"]);} else{echo "None";} ?></td>
    <td><img src="../images/<?php echo $row["image_name"]; ?>" alt="" style="width: 100px; height: 100px;"></td>
    <td>
        <div class="options">
            <a href="handle.php?action=update&id=<?php echo $row["id"]; ?>"><button>Update</button></a>
            <a href="handle.php?action=delete&id=<?php echo $row["id"]; ?>"><button>Delete</button></a>
        </div>
</div></td>
</tr>
<?php
}
?>
</table>
<?php
}






