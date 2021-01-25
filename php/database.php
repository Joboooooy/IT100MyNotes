<?php

    $dsn = "mysql:host=localhost;dbname=mynotes";
    $user = "root";
    $password = "";

    $pdo =  new PDO($dsn, $user, $password);

    if(!$pdo){
        echo "Failed to connect to our mysql database";
        exit();
    }
?>