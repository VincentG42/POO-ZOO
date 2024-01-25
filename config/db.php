<?php


try{

    $dsn = 'mysql:host=localhost;dbname=poo-zoo';
    
    $username = 'root';
    $password = ''; 
    
    $db = new PDO($dsn, $username, $password);
}

catch(Exception $message){

    echo "probleme <br>". $message;
}