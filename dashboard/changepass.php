<?php

    session_start();
    include '../config.php';
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

    <h2 class="text-center">
        Change Password
    </h2>
    <div class="container col-5">
        <form method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Current Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" name="cpassword" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">New Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput2"  name="npassword" placeholder="New Password">
            </div>
            <div class="col-12 text-center ">
            <button type="submit" class="btn btn-primary" name="changepasshandle">Change Password</button>
            </div>
        </form>
    </div>
    <?php
        $id = $_SESSION['userid'];
        $sql = "SELECT * FROM `tbl_user` WHERE `userId` = '$id' ";
        $res = mysqli_query($connect , $sql);

    if(isset($_POST['changepasshandle'])){
        if(mysqli_num_rows($res) > 0){
            foreach ($res as $item){
                if($item['password'] == $_POST['cpassword'] ){
                    $newpass = $_POST['npassword']; 
                    $sql = "UPDATE `tbl_user` SET `password`='$newpass' WHERE `userId` = '$id'";
                    $res = mysqli_query($connect , $sql);
                    session_destroy();
                    header('location: ../loginandcreate/loginForm.php');
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Incorrect Current Password")';
                    echo '</script>';


                    ////// WHAT THEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
                    ////DI NA VIDEEOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                    ///SIR SORRY POOOOOOOOOOOOOOOOOOOOOOOOO
                    


                    //repo nalang po tsaka push
                    

                };
            }
        }else{

        }
    }
    ?>
</body>
</html>

