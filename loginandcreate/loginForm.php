<?php
    //first off we make sure that we user a global variable(session[])
    //but before that use the command of....

    session_start();
    
    //after that use the config file to connect to the server..

    include "../config.php"

    // start to create a login form hehe
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h2 class="text-center m-5">Sign-In</h2>
    <div class="container col-4">
      <form method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form2Example1" class="form-control" placeholder="User Name" name="txtusername" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form2Example2" class="form-control" placeholder="Password" name="txtpassword" />
            </div>


            <!-- Submit button -->
            <input type="submit" value="Login" name="loginHolder"  class="btn btn-primary btn-block mb-4" >

            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a member? <a href="register.php">Register</a></p>
            </div>
      </form>
            
            <?php 
                if(isset($_POST['loginHolder'])){
                  $uname = $_POST['txtusername'];
                  $pwd = $_POST['txtpassword'];

                  
                  $find = mysqli_query($connect , "SELECT * FROM tbl_user WHERE username = '$uname' AND password = '$pwd'");
                  $selectedRow = mysqli_fetch_array($find);

                  if(is_array($selectedRow)){
                    $_SESSION["username"] = $uname;
                    $_SESSION['pass'] = $pwd;
                  }else{
                    echo "<script type='text/javascript'>";
                    echo "alert('username and password is not match')";
                    echo "window.location.href = 'loginForm.php'";
                    echo '</script>';
                  }
                }

                if(isset($_SESSION["username"])){
                  header("Location:../dashboard/dashboard.php");
                }
            ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>

