<?php

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="paying_guest";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("connection falied due to ". $conn->connect_error);
    $city_to_be_searched=$_POST['city'];

    $sql="Select * from home_register,person_register where home_register.city='$city_to_be_searched' and home_register.email=person_register.email order by price";
    $result1=$conn->query($sql);

        if($result1->num_rows>0){
            while($row=$result1->fetch_assoc()){
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