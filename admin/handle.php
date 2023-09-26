<?php
include_once("../model/model.php");
include_once("../functions/functions.php");
//handle new product
if(isset($_POST["new_product"])){
    $name=preg_replace('/\s+/', ' ', $_POST["name"]);
    $name=trim($name);
    print_r($_FILES);
    $image_name = $_FILES['image']['name'];
    $result=add_product($name,$_POST["current_price"],$_POST["previous_price"],$_POST["category"],$_POST["tag"],$_POST["qty"],$image_name);
    if($result){
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image_name");
        echo "<script>            
            window.location.href='add_product.php';
            var message='Product added successfully';
            alert(message); 
        </script>";
    
    
    }else{        
        echo "<script>            
            window.location.href='add_product.php';
            var message='Operation was unsuccessful...';
            alert(message);
        </script>";
    
    } 
exit();
}
//handle update product
if(isset($_POST["update_product"])){
    $product=get_product($_POST["id"]);
    if($product){
        $columns=array();
        $values=array();
        $name=preg_replace('/\s+/', ' ', $_POST["name"]);
        $name=trim($name);
        $image_name = $_FILES['image']['name'];
        if($product["name"] !== $name) $columns[]="name";
        if($product["current_price"] !== $_POST["current_price"]) $columns[]="current_price";
        if($product["previous_price"] !== $_POST["previous_price"]) $columns[]="previous_price";
        if($product["category"] !== $_POST["category"]) $columns[]="category";
        if($product["tag"] !== $_POST["tag"]) $columns[]="tag";
        if($product["qty"] !== $_POST["qty"]) $columns[]="qty";
        if(!empty($image_name)){
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image_name");
            if($product["image_name"] !== $image_name) $columns[]   ="image_name";
        }
        
        foreach($columns as $column){
            if($column==="name") $values[]=$name;
            else if($column==="image_name") $values[]=$image_name;
            else $values[]=$_POST[$column];
        }
        $result=update_product($columns, $values, $_POST["id"]);
        if($result){
             
            echo "<script>
                var message='Update operation successful';
                alert(message);
            </script>";
        redirect("products.php");
        
        }else{ 
            echo "<script>
                var message='Update operation failed';
                alert(message);
            </script>";
            redirect("update_productphp?id={$_POST['id']}");
        }
    }
}

//admin update and delete
if(isset($_GET["action"])){
    $action=$_GET["action"];
    if($action==="update") redirect("update_product.php?id={$_GET['id']}");
    else if($action==="delete"){ ?>
       <script>
            var message='Are you sure you want to delete the product?';
            response =confirm(message);
            if(response){ </script>
            <?php
            echo "success";
            ?><script>
            }else{ </script><?php
                echo "failure"; ?><script>
            }
            </script><?php
            // }else{
            //     window.location.href="add_product.php";
            // }
            // if(response){ 
                // <
            //     $result=delete_product($_GET["id"]);
                // if($result)
            //         window.location.href="products.php";
            //         alert("Product deleted successfully");
                // <
            //     exit();
                // }else
            //         window.location.href="products.php";
            //         alert("delete operation was unsuccessful...");
                // <
            //     exit();
            //     }
                
            // }
            // else{
            //     window.location.href="products.php";
            
        
    }
}