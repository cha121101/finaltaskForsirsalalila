<?php

    // Inside this is all the variables need to configure the server or to access the database

    //initiaize variables...

    $server = 'localhost';
    $username = 'root';
    $password = "";

    // let's see the database name..
    $database = "shopping_db_cart";

    //create a command to access the server    
    $connect = mysqli_connect($server , $username , $password , $database);


    //create a if/else statement to make see if the connect is correct or not

    if(!isset($connect)){
        echo "No connection";
    }else{
    }

    //now create a login form..
    //register form..
    //dashboard...

?>