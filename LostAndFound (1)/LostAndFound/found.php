<?php
include('db_connection.php');
@session_start();
if (!isset($_SESSION['id'])){
	header('location:login.php');
}

?>

<?php 

$fetchData= fetch_data($conn);

function fetch_data($conn){
  $sql  = "SELECT * FROM user";

  $exec=mysqli_query($conn, $sql);
  $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
  return $row;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_message.css">
    <title>Lost and Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="menu-section ">
        <nav class="navbar navbar-expand-lg fixed-top bg-dark ">
            <a class="navbar-brand text-primary px-5" href="home.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> <i class="fa fa-bars" aria-hidden="true"></i> </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end menu_content" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light px-3" href="lost.php"> Lost</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light pr-3 px-3" href="found.php"> Found</a>
                    </li>



                </ul>

            </div>
        </nav>
    </div>
    
    <div class=" container" style="margin-top: 100px;">
        <h1 class="text-primary">Please give the following information</h1>
    </div>
    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
    <div class="container mt-5 mb-5">

        <div class="card">
            <div class="card-body">
                <form action="add_found.php" method = "post" enctype="multipart/form-data">
        
                    
                    <div class="mb-3">
                        <label for="found_item_name" class="form-label">Product Name: </label>
                        <input type="text" class="form-control" id="found_item_name" placeholder="Enter product name" name="found_item_name">
                    </div>
                    <div class="mb-3">
                        <label for="productType" class="form-label">Product Type: </label>
                        <input type="text" class="form-control" id="found_item_type" placeholder="Enter Product type" name="found_item_type">
                    </div>
                    <div class="mb-3">
                        <label for="wherefound" class="form-label">Where Found: </label>
                        <input type="text" class="form-control" id="where_found" placeholder="where found" name="where_found">
                    </div>
                    <div class="mb-3">
                        <label for="whenfound" class="form-label">When Found: </label>
                        <input type="date" class="form-control" id="date_time" placeholder="When found" name="date_time">
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description: </label>
                        <textarea id="item_description" class="form-control" id="item_description" placeholder="Description" name="item_description" rows="4" cols="50"></textarea>
                        
                        
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload image:</label>
                        <input class="form-control" type="file" id="image_dir" name="image_dir" value=""  multiple/>
                    </div>
                    <div class="mb-3">
                        <label for="found_name" class="form-label">User Id: </label>
                        <input type="text" class="form-control" id="user_id" placeholder=" User Id" name="user_id">
                    </div>

                    <button type="submit" class="btn btn-primary" name="save">Submit</button>
                   
                </form>
             
            </div>
        </div>
    </div>
  
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>