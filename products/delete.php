<?php
// check if value was posted
//if($_POST){
 
    // include database and object file
    include_once (__Dir__.'/../config/database.php');
    include_once (__Dir__.'/../objects/product.php');
   
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $product = new Product($db);
     
    // set product id to be deleted
    $product->id = $_GET['id'];
     
    // delete the product
    if($product->delete()){
        echo "<script>alert('Object was deleted.'); document.location = 'index.php';</script>";
    }
     
    // if unable to delete the product
    else{
        echo "<script>alert('Unable to delete the object.'); document.location = 'index.php';</script>";
    }
//}
?>