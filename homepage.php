<?php
	  session_start();
?>	  
<!DOCTYPE html>
<html>
	<head>
		<title>HomePage</title>
		<style>
			* {
				
				font-family: Helvetica;
			}
			body{
				background-image: url("home1.jpg");
				background-repeat: no-repeat;
				background-size : 100%;
			}
			.button {
				position: relative;
			  border-radius: 6px;
			
			  margin-top:100px;
				margin-left:20px;
				background: lightblue;
			  border: none;
			  color: red;
			  text-align: center;
			  font-size: 25px;
			 
			  transition: all 0.5s;
			  cursor: pointer;
			  margin-top: 50px;
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
			  opacity: 0.3;
			  top: 0;
                                                          right: -50px;
			  transition: 0.5s;
			}

			.button:hover span {
			  padding-right: 25px;
			}

			.button:hover span:after {
			  opacity: 1;
			  right: 0;
			}
			.register{
				position: relative;
			  border-radius: 6px;
			
			  margin-top:30px;
				margin-left:100px;
				background: lightblue;
			  border: none;
			  color: red;
			  text-align: center;
			  font-size: 25px;
			 
			  transition: all 0.5s;
			  cursor: pointer;
			}
			.register span {
			  cursor: pointer;
			
			  position: relative;
			  transition: 0.5s;
			}
            .register span:after {
			  content: '\00bb';
			  position: absolute;
			  opacity: 0.3;
			  top: 0;
                                                          right: -50px;
			  transition: 0.5s;
			}

			

			.register:hover span:after {
			  opacity: 1;
			  right: 0;
			}
			.nav-bar {
					height: 10vh;
					width: 100%;
					background-color: #00ff99;
					color: #00ff99;
					text-align: center;
					font-size: 40px;
					display: flex;
					justify-content: center;
					align-items: center;
					text-shadow: 0px 0px 1px cyan;
				}
			
	        
			.toggle-nav {
				display:none;
			}
			@media screen and (min-width: 860px) {
				.menu {
				width:100%;
				
				box-shadow:0px 1px 1px rgba(0,0,0,0.15);
				border-radius:3px;
				background:#000000;
				}
			}

			.menu ul {
				display:inline-block;
			}

			
			.menu li:last-child {
				margin-right:0px;
			}

			.menu a {
				text-shadow:0px 1px 0px rgba(0,0,0,0.5);
				color:#777;
				transition:color linear 0.15s;
			}

			.menu a:hover, .menu .current-item a {
				text-decoration:none;
				color:#66a992;
			}

			
			

		}</style>

 <nav class="menu">
	<ul class="active">
	     <div class="welcome">
			<a href ="index.html"style=" color:white;"> Home </a>
		</div>
		<div class="welcome">
			<a  style="color:white; margin-left:1300px;">Welcome <?php echo $_SESSION['username'] ?></a>
		</div>
		
	</ul>
	<a class="toggle-nav" href="#">&#9776;</a>
 </nav>

	
 <body>
		
	
		
		<form action="find_destination.php" method="POST">
			<button class="button"><span>Find Your Accomodation Here!</span></button>
		</form>
		<form action="register_home.php" method="POST">
			<button class="register"><centre>Register Your Home Now!</centre></button>
		</form>
		
		
	</body>
</html>