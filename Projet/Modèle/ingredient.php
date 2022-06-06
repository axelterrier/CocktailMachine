<?php


class Ingredient
{
    public $ID_Ingredient;
    public $Ingredient_Name;
    public $Viscosite;
    public $Taux_Alcool;
    public $Est_Disponible;
    public $Image_Url;

    public function __construct(int $ID_Ingredient, $Ingredient_Name, $Viscosite, $Taux_Alcool, $Est_Disponible, $Image_Url) {
        $this->ID_Ingredient = $ID_Ingredient;
        $this->Ingredient_Name = $Ingredient_Name;
        $this->Viscosite = $Viscosite;
        $this->Taux_Alcool = $Taux_Alcool;
        $this->Est_Disponible = $Est_Disponible;
        $this->Image_Url = $Image_Url;
    }
}

?>