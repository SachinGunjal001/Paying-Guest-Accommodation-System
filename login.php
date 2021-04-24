 <?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login page!</title>
    <style>
      *{
        font-family: cursive;
      }
      body{
        min-height:100vh;
      }
      .cont{
        min-height:100vh;
        background: url(https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
      }
      #display-div{
        min-height:50vh;
      }
      #display-h1{
        color:red;
        font-family:cursive;
      }
      .login-btn{
        background-color: #fff;
        border:3px solid red;
        border-radius: 8px;
        font-size:32px;
        outline: none;
        font-family:cursive;
        box-shadow:5px 5px black;
        cursor: pointer;
      }
      .login-btn:focus{
        outline:0;
      }
      .login-btn:active{
        box-shadow: none;
      }
      .login-btn:hover{
        background-color: #4caf50;
       box-shadow:3px 3px 3px black;
      }
      #btn-container{
        min-height:50vh;
      }
      #stu-form{
        min-height:100vh;
        background:url(https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
       
      }
      #teach-form{
        min-height:100vh;
        background:url(https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
       
      }
      .login{
        padding:50px;
   
      }
      .login-header{
        font-size:40px;
        color:white;
        padding:4px 0px;
        font-weight:bold;
        border-bottom: 5px solid #4caf50;
        display:inline-block;
        margin-bottom:50px;
      }
      .textbox{
        width:100%;
        overflow:hidden;
        font-size:20px;
        padding:10px 0;
        margin:10px 0;
        border-bottom: 1px solid #4caf50;
       
      }
      .textbox i{
        font-size: 26px;
        margin-right: 3px;
        color:white;
      }
      .textbox input{
        border:none;
        outline:none;
        background:none;
        color:white;
        font-size:18px;
      }
     
      .submit{
        color:white;
        padding:5px;
        cursor:pointer;
        width:100%;
        margin-top:20px;
        background:none;
        border:3px solid #4caf50;
        font-size:18px;
      }
      .submit:focus{
        outline:none;
      }
      .login{
        border:5px solid #4caf50;
        border-top-left-radius: 50px;
        border-bottom-right-radius: 50px;
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: ease-out;
      }
      .login:hover{
        border-top-right-radius: 50px;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 0px;
      }
      .login-btn{
        margin-top: 20px;
      }
      .iconic i{
        margin-top: 20px;
        color:white;
      }
      .iconic{
        height:40vh;
      }
      .iconic:hover,.iconic:active{
        color:#4caf50 !important;
      }
    </style>
  </head>
  <body>
    <section id="whole">
    <div class="cont">
    <div class="container-fluid text-center d-flex justify-content-center align-items-center" id="display-div">
      <h1 class="display-3 font-italic" id="display-h1"></h1>
    </div>
    <div class="container-fluid d-flex justify-content-around align-items-center" id="btn-container">
      <div class="d-flex flex-column justify-content-center iconic">
        <i class="fas fa-database align-self-start mx-auto" style="font-size: 60px;display:block;"></i>
      <button type="button" class="login-btn px-3 align-self-end" id="teacher-btn" onmouseover="iconColor1(this)" onmouseout="iconColor2(this)">Register</button>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center iconic">
      <i class="fas fa-sign-in-alt align-self-start mx-auto" style="font-size: 60px;display:block;"></i>
      <button type="button" class="login-btn px-3 align-self-end" id="student-btn" onmouseover="iconColor1(this)" onmouseout="iconColor2(this)">Login</button>
    </div>
    </div>
  </div>
</section>

    <section id="section1">
    <div class="container-fluid d-flex justify-content-center align-items-center" id="stu-form">
      <div class="login" onmouseover="second(this)" onmouseout="first(this)">
        <h1 class="login-header">LOGIN</h1>
        <form action="check.php" method="POST">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" value="" placeholder="Email" name="email" onclick="changeIcon(this)"/>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" value="" placeholder="Password" name="password" onclick="changeIcon(this)"/>
        </div>
        <input type="submit" value="Sign in" class="submit" name="login_btn" />
        <?php
            if(isset($_SESSION["error_login"])){
                $error = $_SESSION["error_login"];
                echo "<script type='text/javascript'>alert('$error');</script>";
            }
        ?>
      </form>
      </div>
    </div>
  </section>

    <section id="section2">
    <div class="container-fluid d-flex justify-content-center align-items-center" id="teach-form">
      <div class="login" onmouseover="second(this)" onmouseout="first(this)">
        <h1 class="login-header">REGISTER</h1>
        <form action="check.php" method="POST">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" value="" name="uname" placeholder="Username" onclick="changeIcon(this)"/>
        </div>
        <div class="textbox">
          <i class="fas fa-envelope"></i>
          <input type="text" value="" name="email" placeholder="Email" onclick="changeIcon(this)"/>
        </div>
        <div class="textbox">
          <i class="fas fa-phone"></i>
          <input type="text" value="" name="mobile_no" placeholder="Contact No." onclick="changeIcon(this)"/>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" value="" name="password" placeholder="Password" onclick="changeIcon(this)"/>
        </div>
        <input type="submit" value="Sign in" class="submit" name="register_btn" />
        <?php
            if(isset($_SESSION["error_register"])){
                $error = $_SESSION["error_register"];
                echo "<script type='text/javascript'>alert('$error');</script>";
            }
        ?>  
      </form>
      </div>
    </div>
  </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script  type="text/javascript">
       

        const wholesect=document.getElementById("whole");
        const sectionstu=document.getElementById("section1");
        const sectiontea=document.getElementById("section2");
        sectionstu.style.display="none";
        sectiontea.style.display="none";
        const teacherBtn=document.getElementById("teacher-btn");
        const studentBtn=document.getElementById("student-btn");
        teacherBtn.addEventListener("click",event=>{
          event.preventDefault();
          sectiontea.style.display="block";
          wholesect.style.display="none";
        });
        studentBtn.addEventListener("click",event=>{
          event.preventDefault();
          sectionstu.style.display="block";
          wholesect.style.display="none";
        });



        const elem=document.getElementById("display-h1");
        const quotes=["Welcome to F!ND PG","We've got the Best PGs for you","Personalized suggestions only for you"];
        let curr=0;
        function printmsg()
        {
          msg=quotes[curr];
          curr++;
          if(curr==3)
          {
            curr=0;
          }
          let idx=0;
          elem.innerHTML="";
          function printLetterByLetter()
          {
            elem.innerHTML+=msg.charAt(idx);
            idx++;
            if(idx!=msg.length)
            {
              setTimeout(printLetterByLetter,50);
            }
          }
          printLetterByLetter();
          setTimeout(printmsg,2500);
        }
        printmsg();


        function second(form){
          const bkg=form.parentElement;
          bkg.style.background="url(https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg)";
        }
        function first(form)
        {
          const bkg=form.parentElement;
          bkg.style.background="url(https://i.pinimg.com/originals/ea/3f/d3/ea3fd3102ccf575e3c33954f73eab78d.jpg)";
        }

        function changeIcon(field){
          const icon=field.previousElementSibling;
          icon.style.color="#4caf50";
          field.placeholder="";
        }
        function iconColor1(btn)
        {
          const icon=btn.previousElementSibling;
          icon.style.color="#4caf50";
        }
        function iconColor2(btn)
        {
          const icon=btn.previousElementSibling;
          icon.style.color="white";
        }
    </script>
  </body>
</html>

<?php
    unset($_SESSION["error_login"]);
    unset($_SESSION["error_register"]);
?>
