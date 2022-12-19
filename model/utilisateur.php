<?php

class Utilisateur
{
    public $Utilisateur_ID;
    public $Nom;
    public $Prenom;
    public $Age;
    public $Taille;
    public $Poids;

    public function __construct($Utilisateur_ID, $Nom, $Prenom, $Age, $Taille, $Poids) {
        $this->Utilisateur_ID = $Utilisateur_ID;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Age = $Age;
        $this->Taille = $Taille;
        $this->Poids = $Poids;
    }
}

?>