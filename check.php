<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="paying_guest";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error)
		die("connection falied due to ". $conn->connect_error);
	if(isset($_POST['login_btn']))
	{
		$email = $_POST["email"];
		$pass=$_POST['password'];
		$error = "username/password incorrect";
		$sql="Select * from person_register where email='$email' and password='$pass' ";
		$result=$conn->query($sql);
		if($result->num_rows>0){
		    $_SESSION["email"] = $email;
		    $_SESSION['username']=$result->fetch_assoc()['name'];
		    header("location: homepage.php");
		}else{
		    $_SESSION["error_login"] = $error;
		    header("location: index.php");
		}
	}
	else
	{
		$name=$_POST['uname'];
		$pass=$_POST['password'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile_no'];
		$sql="Select * from person_register where email='$email'";
		$result=$conn->query($sql);
		$error = "Email already exists!!!";
		if($result->num_rows>0)
		{
			$_SESSION["error_register"] = $error;
		    header("location: index.php");
		}
		else
		{
			$sql="Insert into person_register(email,name,mobile,password) values ('$email','$name','$mobile','$pass')";
			$result=$conn->query($sql);
			$_SESSION["email"] = $email;
			$_SESSION['username']=$name;
			header("location:login.php");
		}
	}
?>