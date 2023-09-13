<?php
session_start();
include('db_connection.php');

if(isset($_POST['save'])){ 

    $found_item             = $_POST['found'] ;
    $where_lost				    = $_POST['where_lost'];
    $when_lost				    = $_POST['date'];
    $product_description	= $_POST['item_description'];
 
    $sql = "INSERT INTO `claimed_items` (`claimed_id`,`where_lost`,`date`,`item_description`,`found_id`)
    VALUES ('','$where_lost','$when_lost', '$product_description','$found_item')";
 
    if ($conn->query($sql) === TRUE) {
      header("Location: claim.php?success=Claimed item has been created successfully");
      exit();
 } 
    
       
      else {
        header("Location: claim.php?error=unknown error occurred");
        exit();
      }
    }
  
$conn->close();
?>