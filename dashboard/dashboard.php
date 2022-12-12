<?php

    //see if the username is accesible here
    session_start();
    if(!isset($_SESSION["username"])){
        header('location: ../loginandcreate/loginForm.php');
    }
    if(!isset( $_SESSION['totalproductsold'])){
        $_SESSION['totalproductsold'] = 0;
    }

    if(!isset($_SESSION['totalrevenue'])){
        $_SESSION['totalrevenue'] = 0;
    }
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

    <header class="w-100 bg-light">
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-4 m-0">
            <form  method="post" class="text-right my-3"><input type="submit" name='logout' value="logout" ></form>
            <?php
                    if(isset($_POST['logout'])){
                        session_destroy();
                        header('location:../loginandcreate/loginForm.php');
                    }
            ?> 
            </div>
            <div class="col-2">
            <h4 class="my-3 text-right"> <?php echo $_SESSION['name']; ?></h4>
            </div>
        </div>
    </header>

    <div class="container col-12">
        <div class="row">
            <div class="col-3 bg-light w-100 h-100">
                <h3 class="text-center">Menu</h3>
                    <div class="row">
               
                
                    <h4 class="border-bottom text-center col-12 my-3"> <a href="../shopping-cart/index.php " class="text-dark">Shop</a></h4>
                    <h4 class="border-bottom text-center col-12 my-3"> <a href="../shopping-cart/index.php " class="text-dark">Create a Product</a></h4>
                    <h4 class="border-bottom text-center col-12 my-3"> <a href="../shopping-cart/index.php " class="text-dark">Delete A product</a></h4>
                    <h4 class="border-bottom text-center col-12 my-3"> <a href="changepass.php " class="text-dark">Settings</a></h4>
                    </div>
            </div>
            <div class="col-9 d-flex justify-content-around ">
                <div class="col-3 mt-3 border ">
                    <h3 class="text-center my-5">Total Items Sold</h3>
                    <h2 class="text-center mb-5"> <?php echo  $_SESSION['totalproductsold'] ?></h2>
                </div>
                <div class="col-3 mt-3 border">
                    <h3 class="text-center my-5">Total Revenue</h3>
                    <h2 class="text-center mb-5"> <?php echo $_SESSION['totalrevenue'] ?></h2>
                </div>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>


