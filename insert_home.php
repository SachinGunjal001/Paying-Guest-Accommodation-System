<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="paying_guest";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error)
		die("connection falied due to ". $conn->connect_error);
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$type_of_people=$_POST['type_of_people'];
	$rooms=(int)$_POST['rooms'];
	$price=(int)$_POST['price'];
	$ac=(int)$_POST['ac'];
	$food=(int)$_POST['food'];
	$b=0;
	$f=0;
	$g=0;
	foreach ($type_of_people as $tp){ 
    	if(!strcmp($tp,"boys"))
    		$b=1;
    	if(!strcmp($tp,"girls"))
    		$g=1;
    	if(!strcmp($tp,"family"))
    		$f=1;
	}
	$sql="Insert into home_register(email,address,city,state,family,girls,boys,no_of_rooms,price,ac_service,food_service) values('".$_SESSION['email']."','$address','$city','$state',$f,$g,$b,$rooms,$price,$ac,$food);";
	$result=$conn->query($sql);
	echo "<script type='text/javascript'>alert('Home Added Successfully!!');</script>";
	header("location: homepage.php");
?>