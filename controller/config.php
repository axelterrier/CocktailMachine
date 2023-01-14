<?php
require_once('/var/www/html/CocktailMachine/controller/connection.php');
require_once('/var/www/html/CocktailMachine/model/cocktail.php');
require_once('/var/www/html/CocktailMachine/model/ingredient.php');
require_once('/var/www/html/CocktailMachine/model/utilisateur.php');
// liste des modules a inclure
$dConfig['includes']=array('Validation.php');

//BD
$user='root';
$pass='L@kk@99!';
$dsn='mysql:host=localhost;dbname=cocktailmachine;charset=utf8';
$con=new Connection($dsn,$user,$pass);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
 // echo "Connected successfully";

?>
