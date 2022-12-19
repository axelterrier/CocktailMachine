<?php
require_once($url.'controller/connection.php');
require_once($url.'model/cocktail.php');
require_once($url.'model/ingredient.php');
require_once($url.'model/utilisateur.php');
// liste des modules a inclure
$dConfig['includes']=array('Validation.php');

//BD
$user='root';
$pass='';
$dsn='mysql:host=localhost;dbname=CocktailMachine;charset=utf8';
$con=new Connection($dsn,$user,$pass);


//Vues pour UserControl
//$vues['PageAccueil']='vues/php/PageAccueil.php';

?>