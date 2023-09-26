<?php
$database="techmart";
$user="root";
$password="";
$hostname="localhost";

//connect to database
$conn=mysqli_connect($hostname, $user, $password, $database);

//if there is any errors report error
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//function to get categories from category table
function get_category(){
    global $conn;
    $sql="SELECT * FROM category";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return $result;
}

//get category by id
function get_category_name($id){
    global $conn;
    $sql="SELECT category FROM category WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return mysqli_fetch_assoc($result)["category"];
}

function get_tag_name($id){
    global $conn;
    $sql="SELECT tag_name FROM tag WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return mysqli_fetch_assoc($result)["tag_name"];
}

//function to get products by category
function category_products($id){
    global $conn;
    $sql="SELECT id, name, current_price, previous_price, image_name FROM product WHERE category=$id";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return $result;
}

//function to get a product by id
function get_product($id){
    global $conn;
    $sql="SELECT * FROM product WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return mysqli_fetch_assoc($result);
}

//function to get all products
function get_products(){
    global $conn;
    $sql="SELECT * FROM product";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return $result;
}



//function to get all tag names
function get_tag(){
    global $conn;
    $sql="SELECT * FROM tag";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return $result;
}

//function check if there is a product with the tag
function check_tag($tagID){
    global $conn;
    $sql="SELECT * FROM product WHERE tag=$tagID";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // No items with the given tag ID found
        return false;
    }
    return $result;
}

//new product
function add_product($name,$current_price,$previous_price,$category,$tag,$qty,$image_name){
    global $conn;
    $sql="INSERT INTO product(name,current_price,previous_price,category,tag,qty,image_name) VALUES ('$name',$current_price,$previous_price,$category,$tag,$qty,'$image_name')";
    echo $sql;
    return mysqli_query($conn, $sql);
}
//get specific columns from products table
function get_products_columns($sql){
    global $conn;
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    return $result;
}

//update existing product
function update_product($columns, $values, $id){
    global $conn;
    $errors=false;
    mysqli_begin_transaction($conn);
    if (count($columns) === count($values)) {
        $combined = array_combine($columns, $values);        
        foreach ($combined as $column => $value){
            $sql="UPDATE product SET $column=\"$value\" WHERE id=$id";
            if(!mysqli_query($conn, $sql)){
                $errors=true;
                break;
            }
        }
        if($errors !== false){
            mysqli_rollback($conn);
            return false;
        }
        else{
            mysqli_commit($conn);
            return true;
        }
    }
        
}

//remove product
function delete_product($id){
    global $conn;
    $sql="DELETE FROM product WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    return $result;
}