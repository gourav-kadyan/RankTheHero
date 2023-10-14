<?php
    //in this mysqli_connect -- to connect to mysql and we have to give 4 parameters
    //1 - hostname 2 - database_username 3- database_password 4- database_name
    $connect = mysqli_connect("localhost", "root", "", "voting") or die("connection failed");
    if($connect){
        echo "Connection established";
    }
    else{
        echo "Not connected";
    }
?> 