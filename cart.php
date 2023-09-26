<?php
session_start();
include_once("functions/functions.php");

if(isset($_GET["action"]) && isset($_GET["id"])){
    $action=$_GET["action"];
    if($action==="remove"){
        unset($_SESSION["mycart"][$_GET["id"]]);
        redirect("cart_list.php");
    }else if($action==="minus"){
        $qty=$_SESSION["mycart"][$_GET["id"]];
        $qty-=1;
        if($qty>0) $_SESSION["mycart"][$_GET["id"]]=$qty;   
    }else if($action==="plus"){
        $qty=$_SESSION["mycart"][$_GET["id"]];
        $qty+=1;
        if($qty>0) $_SESSION["mycart"][$_GET["id"]]=$qty;
    }
    redirect("cart_list.php");
}

else if(isset($_GET["id"])){
    if(array_key_exists("mycart", $_SESSION)){
        if(isset($_SESSION["mycart"][$_GET["id"]])){ ?>
            <script>
                window.location.href="cart_list.php";
                alert('item is already in the cart...');                
            </script>
        
        <?php
        }
        else{
            $_SESSION["mycart"][$_GET["id"]]=1;
            redirect("cart_list.php");
        }
    }
    else{
        $_SESSION["mycart"]=array();
        $_SESSION["mycart"][$_GET["id"]]=1;
        redirect("cart_list.php");
    }
    
}
else{
    redirect("index.php");
}



?>