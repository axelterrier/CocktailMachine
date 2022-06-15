<?php
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('../config/connection.php');

class GatewayUtilisateur
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function CheckCredentials(string $idUser, string $password) {
        $tabN = array();
        $query = "SELECT Password FROM utilisateur WHERE Utilisateur_ID=:idUser";
        $this->db->executeQuery($query, array(':idUser' => array($idUser, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN = $row['Password'];
        }
        if(password_verify($password,$tabN)){
            echo 'Ok';
            return true;
        }else{
            echo 'Nok :(';
            return false;
        }
    }

}
?>


