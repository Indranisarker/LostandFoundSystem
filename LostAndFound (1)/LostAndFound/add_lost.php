<?php
session_start(); 
include('db_connection.php');

if(isset($_POST['save'])){

    $product_name				    = $_POST['item_name']; 
    $product_type 			    = $_POST['item_type']; 
    $where_lost				      = $_POST['where_lost'];
    $when_lost				      = $_POST['date'];
    $product_description		= $_POST['item_description']; 
    $name                   = $_POST['user_id'];
 
    
    $sql = "INSERT INTO `lost_items` (`lost_id`,`item_name`,`item_type`,`where_lost`,`date`,`item_description`,`user_id`)
    VALUES ('','$product_name', '$product_type', '$where_lost','$when_lost', '$product_description', '$name')";
  
    if ($conn->query($sql) === TRUE) {
     
      header("Location: lost.php?success=Lost item has been created successfully");
      exit();
      
    }
      
      else {
        header("Location: lost.php?error=unknown error occurred");
        exit();
      }
    }
  
$conn->close();
?>