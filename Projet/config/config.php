<?php
require_once("connection.php");
require_once("../Modèle/cocktail.php");

// liste des modules a inclure
$dConfig['includes']=array('Validation.php');

//BD
$user= 'root';
$pass='';
$dsn='mysql:host=localhost;dbname=CocktailMachine;charset=utf8';
$con=new Connection($dsn,$user,$pass);

//Vues pour UserControl
//$vues['PageAccueil']='vues/php/PageAccueil.php';

?>