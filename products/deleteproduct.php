<?php
    session_start();
    require "../config.php";
   
    if(!isset($_SESSION['username'])){
        header('Location:../loginandcreate/loginForm.php');
    }
    if(!isset($_SESSION['cart_count'])){
        $_SESSION['cart_count'] = 0;
    }
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
<div class="container">
        <div class="row mt-5">
            <div class="col-10">
                <h1>
                    <i class="fa fa-store"></i>
                    Learn IT Easy Online Shop
                </h1>
            </div>
            <div class="col-2 text-right">
                <a href="../shopping-cart/cart.php" class="btn btn-primary">
                    <i class="fa fa-shopping-cart"></i>
                    Cart <span class="badge badge-light"><?php echo $_SESSION['cart_count']; ?></span>
                </a>
            </div>
            <div class="col-12">
                <hr>
            </div>
            
        </div>
        <div class="row">
                <div class="col-12">
                    <h2 class="text-center">
                        Delete a Product
                    </h2>
                </div>
        </div>
        <div class="row">
                <div class="col-12 text-center mt-5">
                    <p class="text-">
                        Delete a Product By ID
                    </p>
                   <form method="POST">
                        <input type="text" id="" name="delete-id">
                        <br>
                        <button type="submit" class="btn btn-primary mt-5" name="deletehandle"> Delete this Product</button>
                   </form>
                </div>

        </div>
            <?php
            if(isset($_POST['deletehandle'])){
                $id = $_POST['delete-id'];
                $sql = "SELECT * FROM `tbl_products` WHERE `id`= '$id'";

                $res = mysqli_query($connect , $sql);

                if(mysqli_num_rows($res) >0 ){
                    $sql = "DELETE FROM `tbl_products` WHERE `id`= '$id'";
                    $res = mysqli_query($connect , $sql);
                    header("Location:../shopping-cart/index.php");
                    echo '<script type="text/javascript">';
                    echo 'alert("Succesfully Deleted")';
                    echo '</script>';
                    
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("This Product ID is not Found")';
                    echo '</script>';
                }
            }
            ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</div>
</body>
</html>