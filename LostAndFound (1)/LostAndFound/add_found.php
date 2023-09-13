<?php
session_start();
include('db_connection.php');
 


if(isset($_POST['save'])){
   
    $user               = $_POST['user_id'];
    $product_name				= $_POST['found_item_name']; 
    $product_type 			    = $_POST['found_item_type']; 
    $where_found				= $_POST['where_found'];
    $when_found				    = $_POST['date_time'];
    $product_description		= $_POST['item_description']; 
    $filename                   = $_FILES["image_dir"]["name"];
    $tempname                   = $_FILES["image_dir"]["tmp_name"];
    $folder                     = "./images/" . $filename;
  
    
    $sql = "INSERT INTO `found_items` (`found_id`,`found_item_name`,`found_item_type`,`where_found`,`date_time`,`item_description`,`image_dir`, `user_id`)
    VALUES ('','$product_name', '$product_type', '$where_found','$when_found', '$product_description', '$filename', '$user')";
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    if ($conn->query($sql) === TRUE) {
      header("Location: found.php?success=Found item has been created successfully");
	         exit();
      } 
      else {
        header("Location: found.php?error=unknown error occurred");
	         exit();
      }
    }
  
$conn->close();
?>