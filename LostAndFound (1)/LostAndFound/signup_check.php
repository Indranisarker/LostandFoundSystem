<?php 
session_start(); 
include "db_connection.php";

if (isset($_POST['u_id']) && isset($_POST['password']) &&
    isset($_POST['name']) && isset($_POST['email']) && 
    isset($_POST['contact_no']) && isset($_POST['user_type']))
    {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$u_id = validate($_POST['u_id']);
	$pass = validate($_POST['password']);

	
	$name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $contact_no = validate($_POST['contact_no']);
    $status = validate($_POST['user_type']);

	$user_data = 'u_id='. $uname. '&name='. $name;


	if (empty($name)) {
		header("Location: sign_up.php?error=Name is required&$user_data");
	    exit();
	}else if(empty($email)){
        header("Location: sign_up.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($pass)){
        header("Location: sign_up.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($u_id)){
        header("Location: sign_up.php?error=Id is required&$user_data");
	    exit();
	}
    else if(empty($contact_no)){
        header("Location: sign_up.php?error=Contact no is required&$user_data");
	    exit();
	}
	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM user WHERE id='$u_id' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: sign_up.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO `user`(`name`, `email`,`id`, `password`, `contact_no`, `user_type`) 
                    VALUES('$name','$email','$u_id', '$pass', '$contact_no', '$status')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: sign_up.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: sign_up.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: sign_up.php");
	exit();
}