<?php
    session_start();
    require_once("dataset.php");    

    $_SESSION['total_price'] = 0;

    if(isset($_POST['update']) && isset($_POST['id']) && isset($_POST['size']) && $_POST['quantity']) {
        $arr_id = $_POST['id'];
        $arr_size = $_POST['size'];
        $arr_quantity = $_POST['quantity'];
        $_SESSION['cart_count'] = 0;

        foreach($arr_id as $index => $value_id) {
            $_SESSION['cart'][$value_id][$arr_size[$index]] = $arr_quantity[$index];
            $_SESSION['cart_count'] += $arr_quantity[$index];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Learn IT Easy Online Shop | Shopping Cart</title>
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
                <a href="cart.php" class="btn btn-primary">
                    <i class="fa fa-shopping-cart"></i>
                    Cart <span class="badge badge-light"><?php echo $_SESSION['cart_count']; ?></span>
                </a>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-1"></th>
                                <th class="col-3">Product</th>
                                <th class="col-1">Size</th>
                                <th class="col-2 text-center">Quantity</th>
                                <th class="col-2 text-right">Price</th>
                                <th class="col-2 text-right">Total</th>
                                <th class="col-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['cart']) && $_SESSION['cart_count'] > 0): ?>                                
                                <?php foreach($_SESSION['cart'] as $id => $sizes): ?>
                                    <?php foreach($sizes as $size => $quantity): ?>
                                        <?php
                                            $total = $products[$id]['price'] * $quantity;
                                            $_SESSION['total_price'] += $total;
                                        ?>
                                        <tr>
                                            <td><img class="img-thumbnail" src="img/<?php echo $products[$id]['photo1'] ?>" style="height: 50px" /></td>
                                            <td><?php echo $products[$id]['name'] ?></td>
                                            <td><?php echo $size ?></td>
                                            <td>
                                                <input type="hidden" name="id[]" value="<?php echo $id ?>" />
                                                <input type="hidden" name="size[]" value="<?php echo $size ?>" />
                                                <input type="number" name="quantity[]" class="form-control text-center" value="<?php echo $quantity ?>" placeholder="0" min="1" max="100" required="" />
                                            </td>
                                            <td class="text-right">₱ <?php echo number_format($products[$id]['price'], 2); ?></td>
                                            <td class="text-right">₱ <?php echo number_format($total, 2); ?></td>
                                            <td class="text-right">
                                                <a href="remove.php?k=<?php echo $id ?>&s=<?php echo $size ?>&q=<?php echo $quantity ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                                    
                                <tr>
                                    <td colspan="2"></td>
                                    <td><b>Total</b></td>
                                    <td class="text-center"><?php echo $_SESSION['cart_count']; ?></td>
                                    <td class="text-right">----</td>
                                    <td class="text-right"><b>₱ <?php echo number_format($_SESSION['total_price'], 2); ?></b></td>
                                    <td class="text-right">----</td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Shopping Cart is still Empty!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <a href="index.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-shopping-bag"></i> Continue Shopping</a>
                </div>
                <div class="col-4">
                    <button type="submit" name="update" class="btn btn-success btn-lg btn-block"><i class="fa fa-edit"></i> Update Cart</button>
                </div>
                <div class="col-4">
                    <a href="clear.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-out-alt"></i> Checkout</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
</body>
</html>