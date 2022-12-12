<?php
    //config a new table...
    
    $server = 'localhost';
    $username = "root";
    $password = "";
    $database = "shopping_db_cart";

    //command to call the query

    $con = mysqli_connect($server , $username , $password , $database);

    if(!isset($con)){
        echo "No Connection";
    }

    
?>