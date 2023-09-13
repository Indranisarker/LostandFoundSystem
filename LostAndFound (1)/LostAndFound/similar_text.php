<?php
include('db_connection.php');
    //$id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $des = $_GET['des'];
   
    $sql = "SELECT claimed_items.*, found_items.*, user.name, user.contact_no
            FROM claimed_items
            INNER JOIN found_items 
            ON claimed_items.found_id = found_items.found_id
            INNER JOIN user
            ON found_items.user_id = user.user_id
            WHERE found_items.found_id = {$id}";

    $result = mysqli_query($conn, $sql);

    $row= mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lost and Found</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="progress_style.css" />
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
                    <li class="nav-item">
                        <a class="nav-link text-light pr-3 px-3" href="claim_list.php"> Claim</a>
                    </li>



                </ul>

            </div>
        </nav>
    </div>
    <div class="container " style="margin-top: 100px;">
        <h1>Product Details:</h1>
    </div>

    <div class="card justify-content-center" style="width: 500px; margin-top:5%; margin-left:20%;">  
            
    
            <?php if($row): ?>
              
                <img src="images/<?php echo $row['image_dir'];?>">
                <div class="card-body">
                <h5 class="card-title"><?php echo $row['found_item_name'];?> </h5>
                <p class="card-text"><?php echo $row['date_time'];?></p>
                <?php endif; ?>
                </div>                               
    <div class="container-right">
    <div class="circular-progress">
    <div class="value-container">0%</div>
        </div>
        <?php
                   
                   $query = "SELECT * FROM found_items WHERE found_id = '$id'";
           
                   $run =mysqli_query($conn,$query);
                   $text1 = $des;
                   $row1 = mysqli_fetch_row($run);
                   $text2 = $row1[5];
                  // echo "$text2";
                   $similarity = similar_text($text1,$text2, $per);
                  # echo "$per% </br>";
                   ?>
                   <script type="text/javascript">var per = "<?php echo "$per"; ?>";</script>

                    
                  
                   
                    <?php
                    
                   if ($run) {
                                 
                     //now check how many rows
                    if (mysqli_num_rows($run)>0) {
             
                        if($per >= 75){
                            echo "matched </br>";
                            echo $row['name'];
                            echo "</br>";
                            echo $row['contact_no'];
                        }
                        else{
                            echo "Not Matched!!!";
                          }    
                     
                    }
                    
                }
                    
            ?>
           
                               
   </div> 
  
       </div>
  
  
   <script src="progress_script.js"></script>     
                                         
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>