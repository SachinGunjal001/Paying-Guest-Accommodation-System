<?php
  	session_start();
	  $flag=0;
	  $city_after_search=array();
	  $city_to_be_searched;
  	if ($_SERVER["REQUEST_METHOD"] == "GET")
  	{
  		$servername="localhost";
		$username="root";
		$password="";
		$dbname="paying_guest";
		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error)
			die("connection falied due to ". $conn->connect_error);
		$sql="";
	  	if(isset($_GET['city_search']))
	  	{
			global $city_after_search,$city_to_be_searched;
			  $city=$_GET['city'];
			  $city_to_be_searched=$city;
	  		$sql="Select * from home_register,person_register where home_register.city='$city' and home_register.email=person_register.email";
			  $result=$conn->query($sql);
			
	  		$flag=1;
	  	}
	  	else if(isset($_GET['state_search']))
	  	{
	  		$state=$_GET['state'];
	  		$sql="Select * from home_register,person_register where home_register.state='$state' and home_register.email=person_register.email";
	  		$result=$conn->query($sql);
	  		$flag=2;
	  	}
	  	if(isset($_GET['price_asc']) && $flag==1)
	  	{
	  		$sql.=" order by price asc";
	  		$result=$conn->query($sql);
	  	}
	  	else if(isset($_GET['price_desc']) && $flag==1)
	  	{
	  		$sql.=" order by price desc";
	  		$result=$conn->query($sql);
	  	}
  	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Finder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			* {
				margin: 0;
				padding: 0;
				font-family: cursive;
				color: navy;
			}
			body{
				
				background-image:url("map2.png");
				background-repeat: no-repeat;
				background-size : cover;
			}
			.nav-bar {
					height: 10vh;
					width: 100%;
					background-color: #a6a6a6;
					color: white;
					text-align: center;
					font-size: 38px;
					text-shadow: 0px 0px 1px cyan;
					padding-top: 4px;
				}
				.linky{
					font-size: 21px;
					padding: 6px;
					border: 3px solid black;
					width: 200px;
					float: right;
					margin: 7px;
				}
				.welcome{
				width: 200px;
				text-align: left;
				font-size: 21px;
				padding: 6px;
				border: 3px solid black;
				float: left;
				margin: 7px;
			}
			.form1{
				float: left;
				margin: 10px;
				font-size: 20px;
				margin-left: 20px;
				margin-top: 20px;
			}
			.form2{
				float: right;
				margin: 10px;
				font-size: 20px;
				margin-right: 30px;
				margin-top: 20px;
			}
			.search_button{
				font-size: 16px;
				padding: 1px;
			}
			.show_result{
				border: 3px solid tomato;
				box-shadow: 5px 5px 5px grey;
				margin-top: 20px;
				height: 100px;
				padding: 8px;
				display: flex;
				justify-content: space-around;
			}
			.heading_title{
				color:black;
			}
			.button {
			  border-radius: 4px;
			  background-color: black;
			  border: none;
			  color: white;
			  text-align: center;
			  font-size: 25px;
			  padding: 5px;
			  width: 250px;
			  transition: all 0.5s;
			  cursor: pointer;
			  margin: 5px;
			}

			.button span {
			  cursor: pointer;
			  display: inline-block;
			  position: relative;
			  transition: 0.5s;
			}

			.button span:after {
			  content: '\00bb';
			  position: absolute;
			  opacity: 0;
			  top: 0;
			  right: -20px;
			  transition: 0.5s;
			}

			.button:hover span {
			  padding-right: 25px;
			}

			.button:hover span:after {
			  opacity: 1;
			  right: 0;
			}
			.sorting{
				margin-top: 20px;
				display: flex;
				justify-content: space-around;
				margin-bottom: -40px;
			}
			.dropbtn {
			  background-color: black;
			  color: navy;
			  text-align: center;
			  font-size: 25px;
			  padding: 5px;
			  width: 250px;
			  border: none;
			  cursor: pointer;
			  margin: 5px;
			}

			.dropbtn:hover, .dropbtn:focus {
			  background-color: red;
			}

			.dropdown {
			  position: relative;
			  display: inline-block;
			}

			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #f1f1f1;
			  min-width: 160px;
			  overflow: auto;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			  left: 20%;
			}

			.dropdown-content form button {
			  background-color: white;
			  width: 160px;
			  padding: 12px 16px;
			  text-decoration: none;
			  display: block;
			}

			.dropdown form button:hover {background-color: red;}

			.show {display: block;}
		</style>
		<script>
			function myFunction() {
		  		document.getElementById("myDropdown").classList.toggle("show");
			}

			$(document).ready(function(){
				$("#price_asc").click(function(){
					var city='<?php echo $city_to_be_searched; ?>'
				 
					console.log('city '+city);
					$.post("low_to_high.php",{
						city:city	
					},function(data,status){
						var x=`<h1 style='text-align:center;margin-top:10px;'>Ascending Sorted Result</h1>`;
						x=x+data;
						$("#showSortedResults").html(x);
					});
				});
				$("#price_desc").click(function(){
					var city='<?php echo $city_to_be_searched; ?>'
				 
					console.log('city '+city);
					$.post("high_to_low.php",{
						city:city	
					},function(data,status){
						var x=`<h1 style='text-align:center;margin-top:10px;'>Descending Sorted Result</h1>`;
						x=x+data;
						$("#showSortedResults").html(x);
					});
				});
			})
			
		</script>
	</head>
	<body>
		<nav class="nav-bar">
			<a class="welcome">Welcome <?php echo $_SESSION['username'] ?></a>
			<span style="color:navy;">
				Find Your Destination!
			</span>
			<div class="linky">
				<a href="homepage.php">Return to Home</a>
			</div>
		</nav>
		<hr style="border: 3px solid black;">
		<form class="form1" action="" method="GET"style="color:black">
			Search By City: <input type="text" style="background-color: lightgrey;" name="city"/>
			<input type="submit" class="search_button" value="Search" name="city_search">
		</form>
		<form class="form2" action="" method="GET"style="color:white">
			Search By State: <input type="text" style="background-color: lightgrey;" name="state"/>
			<input type="submit" class="search_button" value="Search" name="state_search">
		</form>
		
		<div class="sorting"style="margin-top: 100px;">
			<div class="dropdown">
			  <button onclick="myFunction()" id ="sortclick" class="dropbtn"style="color:white">Sort</button>
			  <div id="myDropdown" class="dropdown-content">
			
			  		<button id="price_asc" name="price_asc">Price Low To High</button>
			  	
			  		<button id="price_desc" name="price_desc">Price High To Low</button>
			  
			  		<button id="num_of_room" name="num_of_room">Number Of Rooms</button>
			  
			  </div>
			</div>
			<form>
				<button class="button"><span style = "color:white;">Refresh </span></button>
			</form>
		</div>

		


		<script>
		
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
		    var dropdowns = document.getElementsByClassName("dropdown-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}
		</script>
		<hr style="border: 3px solid black;margin-top: 65px;">
		<?php
			if($flag>0 && $result->num_rows>0)
			{
				echo "<h1 style='text-align:center;margin-top:10px;'>Matching Results</h1>";
				while($row=$result->fetch_assoc())
				{
					echo "<div class='show_result'>";
						echo "<div class='owner_details'>";
							echo "<h4 class='heading_title'>Owner Details:</h4>";
							echo "Name : ".$row['name']."<br>";
							echo "Mobile No. : ".$row['mobile']."<br>";
							echo "Email : ".$row['email']."<br>";
						echo "</div>";
						echo "<div class='home_details'>";
							echo "<h4 class='heading_title'>Home Details:</h4>";
							echo "Address : ".$row['address']."<br>";
							echo "City : ".$row['city']."<br>";
							echo "State : ".$row['state']."<br>";
						echo "</div>";
						echo "<div class='facility_details'>";
							echo "<h4 class='heading_title'>Facility Provided:</h4>";
							if($row['ac_service']==1)
								echo "AC Service : YES <br>";
							else
								echo "AC Service : NO <br>";
							if($row['food_service']==1)
								echo "Food Service : YES <br>";
							else
								echo "Food Service : NO <br>";
							echo "Allows : ";
							if($row['boys'])
								echo " Boys,";
							if($row['girls'])
								echo " Girls,";
							if($row['family'])
								echo " Family";
						echo "</div>";
						echo "<div class='room_details'>";
							echo "<h4 class='heading_title'>Room Details:</h4>";
							echo "No. of Rooms : ".$row['no_of_rooms']."<br>";
							echo "Price Per Room : ".$row['price']."<br>";
						echo "</div>";
					echo "</div>";
				}
			}
		?>

		
		<div id="showSortedResults"></div>
	</body>
</html>