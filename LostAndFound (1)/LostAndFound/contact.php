<?php
include('db_connection.php');
session_start();
if (!isset($_SESSION['id'])){
	header('location:login.php');
}
if(isset($_GET['lost_id'])){
    $id = mysqli_real_escape_string($conn, $_GET['lost_id']);
    $sql ="SELECT lost_items.*,user.name, user.email, user.id, user.user_type
    FROM lost_items left join  user
   on lost_items.user_id = user.user_id 
   where lost_items.lost_id = {$id}";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h2> Lost Item Details </h2>
    <div class="container">
    <?php if($row): ?>
                
                <div class="card-body">
                <h5 class="card-title"><?php echo $row['item_name'];?> </h5>
                <p class="card-text"><?php echo $row['item_type'];?></p>
                <p class="card-text"><?php echo $row['where_lost'];?></p>
                <p class="card-text"><?php echo $row['date'];?></p>
                <p class="card-text"><?php echo $row['item_description'];?></p>
                <?php endif; ?>
                </div>                               
       <h2> Contact Info </h2>
       <div class=" container">
      
       
                
                <div class="card-body">
                <h5 class="card-title"><?php echo $row['name'];?> </h5>
                <p class="card-text"><?php echo $row['email'];?></p>
                <p class="card-text"><?php echo $row['id'];?></p>
                <p class="card-text"><?php echo $row['user_type'];?></p>
               
    </div>                
                        
</body>
</html>