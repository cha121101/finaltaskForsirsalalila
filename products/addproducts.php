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
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
<?php

    
    ?>
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

        <h2 class="text-center"> Add a Product</h2>
        <div class="row">                                                
                    </div>
                    <div class="col-12">
                        <form method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for=""><span> Brand Name:</span> <input type="text" name="txt-brand" require></label>
                                </div>
                            </div>
                            <br>
                            <div class="row my-3">
                                <div class="col-6">
                                    <label for=""><span>Photo 1</span> <input type="file" class="w-auto" name="photo-1" require placeholder="Photo 1"></label>
                                </div>
                                <div class="col-6">
                                    <label for=""><span>Photo 2</span> <input type="file" name="photo-2" require placeholder="Photo 2"></label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="" class="w-100"><span>Details:</span><input class="w-100" type="text" name="txtdetails" require id=""></label>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <label for=""><span>Price:</span> <input type="text" name="txtprice" require></label>
                                </div>
                            </div>
                                <div class="product-content">
                        
                                    <button type="submit" name="process" class="btn btn-dark btn-lg"><i class="fa fa-check-circle"></i> Confirm Add Product</button>
                                    <a href="../shopping-cart/index.php" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Cancel / Go Back</a>
                                </div>
                        </form>                        
                    </div> 
                    <?php   
                    if(isset($_POST['process'])){
                           $id = rand(001 , 3000);
                           $brandName = $_POST['txt-brand'];
                           $photo1 = $_POST['photo-1'];
                           $photo2 = $_POST['photo-2'];
                           $description = $_POST['txtdetails'];
                           $price = $_POST['txtprice'];
                           $sql = "SELECT * FROM tbl_products WHERE`id`= '$id'";
                           $res = mysqli_query($connect , $sql);
                          
                           while(mysqli_num_rows($res) > 1){
                           
                            $sql = "SELECT * FROM tbl_products WHERE `id` = '$id'";
                            $res = mysqli_query($connect , $sql);
                            
                           }
                           $sql=  "INSERT INTO `tbl_products`(`id`, `name`, `description`, `price`, `photo1`, `photo2`) VALUES ('$id','$brandName','$description','$price','$photo1','$photo2')";
                           $products = mysqli_query($connect ,$sql);
                           echo '<script type="text/javascript">';
                           echo 'alert("Succesfully Added")';
                           echo '</script>';
                           header("Location:../shopping-cart/index.php");

                    }
            ?>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
</body>
</html>