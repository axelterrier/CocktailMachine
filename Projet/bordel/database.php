<?php

    define('HOST','localhost');
    define('DB_NAME','CocktailMachine');
    define('USER','root');
    define('PASS','');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        echo "success";
    }catch(PDOException $e){
        echo $e;
    }

?>