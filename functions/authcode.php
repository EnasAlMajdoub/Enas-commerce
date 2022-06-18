<?php
// login and registration pages:
session_start();
include '../config/dbcon.php';
include 'myfunctions.php';
if (isset($_POST['register_btn'])) {
	//send user/admin data to localhost
	$name= $connection->real_escape_string($_POST['name']);
	$phone=$connection->real_escape_string($_POST['phone']);
	$email=$connection->real_escape_string($_POST['email']);
	$password=$connection->real_escape_string($_POST['password']);
	$cpassword=$connection->real_escape_string($_POST['cpassword']);

	//check email registered
	$check_email_query="SELECT email FROM users WHERE email='$email'";
	$check_email_query_run= mysqli_query($connection,$check_email_query);
	if (mysqli_num_rows($check_email_query_run)>0) {
		$_SESSION['message']="alresdy login";
		header('Location: ../login.php');
	}else{
		//check password equal to confirm password
	if ($password==$cpassword) { //if true..> insert new user
		$insert_query="INSERT INTO users (name,email,phone,password)VALUES 
		('$name','$email','$phone','$password')";
		$insert_query_result= mysqli_query($connection,$insert_query);
		if ($insert_query_result) {
			$_SESSION['message']="registered successfully";
			header('Location: ../login.php');
		}else{
			$_SESSION['message']="registered failed";
		header('Location: ../register.php');
		}
		
	}else{
		$_SESSION['message']="registered failed";
		header('Location: ../register.php');
	}


	}

	
}elseif (isset($_POST['login_btn'])) {
	$email= $connection->real_escape_string($_POST['email']);
	$password= $connection->real_escape_string($_POST['password']);

	$login_query= "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$login_query_run= mysqli_query($connection,$login_query);

	//check login
	if (mysqli_num_rows($login_query_run) > 0) {
		$_SESSION['auth']= true;
		$userdata= mysqli_fetch_array($login_query_run);
		$username= $userdata['name'];
		$useremail= $userdata['email'];
		$role_as= $userdata['role_as']; //check admin or user (default user= 0)

		$_SESSION['auth_user']=[
			'name'=> $username,
			'email'=> $useremail

		];

		$_SESSION['role_as']= $role_as;
		if ($role_as==1) {
			//redirect function return session message and url(path directory)
			redirect("../admin/index.php","welcome to dashboard");
			
		}else{
			redirect("../index.php","login successfully");
			
		}

		
		
	}else{
		redirect("../login.php","Invalied login");
		
	}

}
?>

























