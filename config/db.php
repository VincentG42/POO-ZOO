<?php


try{

    $dsn = 'mysql:host=localhost;dbname=';
    
    $username = 'root';
    $password = ''; 
    
    $db = new PDO($dsn, $username, $password);
}

catch(Exception $message){

    echo "probleme <br>". $message;
}