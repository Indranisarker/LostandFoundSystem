<?php
@session_start();
include('db_connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Lost and Found</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="style_message.css">
  </head>
  <body>
      <header>
          <div class="top-section">
                <div class="container">
                    <div class="menu-section">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="home.php"><img src="ICON/images (1).png" alt="logo"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"> <i class="fa fa-bars" aria-hidden="true"></i> </span>
                            </button>
                        
                            <div class="collapse navbar-collapse justify-content-end menu_content" id="navbarNav">
                              <ul class="navbar-nav">
                                <li class="nav-item active"> 
                                    <a class="nav-link" href="index.php?q=found"> Found </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?q=lost"> Lost </a>
                                </li> 
                                <li class="nav-item">
                                  <a class="nav-link" href="index.php?q=claim"> Claim </a>
                                </li> 
                                <?php 
                                    if(!isset($_SESSION['id'])){
                                        echo" <li class='nav-item'>
                                        <a class='nav-link' href='login_form.php'> Login </a>
                                        
                                        </li>";
                                    }
                                    else{
                                        echo" <li class='nav-item'>
                                        <a class='nav-link' href='logout.php'> Logout</a>
                                        
                                        </li>";
                                    }
                                ?>
                                <div class="search-container">
                                <li class="nav-item">
                                <form action="search.php" method="post">
                                <input type="text" placeholder="Search.." name="found_item_name">
                                <button type="submit" name="search"><i class="fa fa-search"></i></button>
                                </form>
                                </li>
                                </div>
                                </ul>
                             </div>
                    
                        </nav> 
                        </div>
                        </div> 
                    </div> 
                    <?php if (isset($_GET['error'])) { ?>
     		                    <p class="error"><?php echo $_GET['error']; ?></p>
     	                        <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                 <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?> 
                    <div class="boby_area">
                        <div class="row"> 
                            <div class="col-md-4 d-flex align-items-center"> 
                                <div class="hero_text"> 
                                    <h5 class="frist_title">Lost or Found Something?</h5>
                                    <h1 class="second_title">LOST IT <span>LIST IT FOUND IT</span></h1>
                                    <p>With our online lost & found, you can Track what you are looking for!</p>
                                    <button class="signup_btn-2">Get Started</button>
                                </div>  
                            </div>  
                            <div class="col-md-6 offset-1"> 
                                <div class="hero_img">  
                                    <img style="width: 400px;" src="Photos/8450408.png" alt="bg">
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
          </div>    
      </header> 
      <section id="others">
          <div class="container section_padding">
              <div class="course_title text-center">
                  <h1>Found Item</h1>
              </div>
                        <?php
                        $sql = "SELECT * FROM found_items";
                        $res = mysqli_query($conn, $sql);
                        ?>
                        <?php foreach($res as $data): ?>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="card card_content"> 
                            <h5 class="card-title"> <?php echo $data['found_item_name'];?> </h5>
                            <img src="images/<?php echo $data['image_dir'];?>">
                            <div class="card-body card_text">   
                          
                        <button class="signup_btn-3" onclick="window.location. href='detail.php?found_id= <?php echo $data['found_id'] ?>'" class="btn btn-info btn-xs" >Details</button>
                           
                        </div> 
                        </div>
                  </div>
                        </div>
                        <?php endforeach ?>

      </section>
      <section id="blog">
      <section id="others">
          <div class="container section_padding">
              <div class="course_title text-center">
                  <h1>Lost Item</h1>
              </div>
              <table>
              <tbody>

                        <?php
                        $sql = "SELECT * FROM lost_items";
                        $res = mysqli_query($conn, $sql);
                       
                    foreach($res as $data){
           
                                echo '<tr>';
                               
                             echo '<td>' .$data['item_name']. '</td>'; 
           
                            echo '<td> <a href="contact.php?lost_id= '.$data['lost_id'].' "> View </a></td> </br>' ;
                            
                            echo '</tr>';
                    }
                    ?>
                    </tbody> 
                </table>      
                     
                        
                      

      </section>
      <footer>
              
              <div class="footer_bottom text-center p-2">
                  <p> Copyright © 2020 | programming-hero.1@gmail.com </p>
              </div>
          </div>
      </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>