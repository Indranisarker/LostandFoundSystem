<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup_check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>
          <label>Id</label>
          <?php if (isset($_GET['u_id'])) { ?>
               <input type="number" 
                      name="u_id" 
                      placeholder="Id"
                      value="<?php echo $_GET['u_id']; ?>"><br>
          <?php }else{ ?>
               <input type="number" 
                      name="u_id" 
                      placeholder="Id"><br>
          <?php }?>
         

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Contact No</label>
          <?php if (isset($_GET['contact_no'])) { ?>
               <input type="text" 
                      name="contact_no" 
                      placeholder="Contact no"
                      value="<?php echo $_GET['contact_no']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="contact_no" 
                      placeholder="Contact no"><br>
          <?php }?>
          <label>User Status</label>
          <?php if (isset($_GET['user_type'])) { ?>
            <select style="width: 95%" class="form-control" name="user_type">
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="stuff">Official Stuff</option>
            </select>
                      value="<?php echo $_GET['user_type']; ?>"><br><br>
          <?php }else{ ?>
            <select style="width: 95%" class="form-control" name="user_type">
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="stuff">Official Stuff</option>
            </select>
          <?php }?>
     	<button type="submit">Sign Up</button>
          <a href="login_form.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>