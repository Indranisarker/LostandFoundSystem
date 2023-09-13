<?php 
include "db_connection.php";
session_start(); 
if (isset($_POST['u_id']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$u_id= validate($_POST['u_id']);
	$pass = validate($_POST['password']);

	if (empty($u_id)) {
		header("Location: login_form.php?error=User Id is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login_form.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM user WHERE id ='$u_id' AND password ='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['id'] === $u_id && $row['password'] === $pass) {
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['user_id'] = $row['user_id'];
            	header("Location: index.php?success=Successfull !!");
		        exit();
            }else{
				header("Location: login_form.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login_form.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login_form.php");
	exit();
}