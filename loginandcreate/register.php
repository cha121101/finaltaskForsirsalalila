<?php

    include '../config.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <h2 class="text-center m-5">Register A new Account</h2>
    <div class="container col-4">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1" class="form-control" placeholder="First name" name="txtfname" require/>
                      
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example2" class="form-control" placeholder="Last name" name="txtlname" require/>
                     
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" class="form-control" placeholder="User Name"  name="txtuname"require />
                  
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" placeholder="Password"  name="password" require />
                  
                </div>

                <!-- Checkbox -->


                <!-- Submit button -->
                <button type="submit" name="signuphandle" class="btn btn-primary btn-block mb-4">
                  Sign up
                </button>
              </form>


                <?php
                     if(isset($_POST['signuphandle'])){
                        $uid = rand(10000,99999);
                        $fname = $_POST['txtfname'];
                        $lname = $_POST['txtlname'];
                        $uname = $_POST['txtuname'];
                        $pwd = $_POST['password'];

                        $req = mysqli_query($connect , "SELECT * FROM `tbl_user` WHERE userId = $uid");
                        
                        while($req == ""){
                          $req = mysqli_query($connect , "SELECT * FROM `tbl_user` WHERE userId = $uid");
                        }

                        $res = mysqli_query($connect , "INSERT INTO `tbl_user`(`userId`, `name`, `username`, `password`) VALUES ('$uid','$fname $lname','$uname','$pwd')");
                        echo "<script type='text/javascript'>";
                        echo "alert('username and password is not match')";
                        echo "window.location.href = 'loginForm.php'";
                        echo '</script>';
                        header('location:../loginandcreate/loginForm.php');
                     }
                ?>

            </div>
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>