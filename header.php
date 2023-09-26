
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TechMart | <?php echo ucwords($title); ?></title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/harry_styles.css" type="text/css">
    <link rel="icon" href="icons/title_icon.svg">
    
</head>
<body>
    <header id="top">
        <nav>
            <ul>
                <li class="logo"><a href="index.php"><img src="icons/techMart.svg" alt=""></a></li>                
                <li class="pages"><a id="home" href="index.php">Home</a></li>
                <li class="pages"><a id="about_us" href="about.php">About Us</a></li>
                <li class="pages">
                    <div class="dropdown">Categories                  
                        <div class="dropdown-content" style="font-weight: normal;">
                            
                          <?php
                            include_once("model/model.php");
                            //get all categories in database
                            $result=get_category();
                            foreach($result as $row){
                                //get id of category
                                $id=$row['id']; 
                                //convert fist letter of each word in category to uppercase
                                $display=ucwords($row['category']);
                                echo "<a href=category?id=$id>$display</a>";
                            }
                            
                            ?>
                            
                        </div>
                      </div>
                </li>
                <li class="register"><a href="register.php">Register</a></li>
                <li class="cart_icon"><a href="cart_list.php"><img src="icons/cart_icon.svg" alt=""><?php if(array_key_exists("mycart",$_SESSION)){ if(count($_SESSION["mycart"]) >0){ echo "<sup>(".count($_SESSION["mycart"]).")</sup>";}}  ?></a></li>
            </ul>
        </nav>
    </header><main style="margin-top: 100px; margin-bottom: 90px;">