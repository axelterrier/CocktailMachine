<?php
session_start();

if (isset($_SESSION['user'])) {
    // logged in
    $_SESSION['lastPage'] = 'cocktailPage';
} else {
    header("Location:signin.php");
}
require_once('/var/www/html/CocktailMachine/config/config.php');
require_once('/var/www/html/CocktailMachine/Modele/gateway/gatewayIngredient.php');
require_once('/var/www/html/CocktailMachine/Modele/gateway/gatewayCocktail.php');



$test = new GatewayCocktail($con);
$ingr =  new GatewayIngredient($con);
//Crée la gateway
//Fait appel à la classe
$u = $test->GetAvailableCocktail();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@600;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900;300&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
    <title>Test UI</title>
</head>
<body>
    <div class="mainScreen">
        <div class="title">
            <h1>Search</h1>
            <h2>for recipes</h2>
        </div>
        <div class="searchBarContainer">
            <div class="searchBar">
                <img src="/var/www/html/Vue/image/search.png" alt="" class="iconSearchBar">
                <input class="inputSearch" type="text" placeholder="cocktail name">
            </div>
            <div class="button">
                <img src="/var/www/html/Vue/image/qr.png" alt="" class="buttonImage">
            </div>
        </div>
        <div class="filters">
            <?php
                foreach($u as $cocktail){
                    $v = $ingr->GetIngredient($cocktail->Cocktail_ID);
                    foreach($v as $ingredient){
                        ?>
                    <div class="filter">
                        <div class="filterFlex">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($ingredient->Image_Url).'" alt="" class="filterImage">' ?>
                            <p class="filterName"><?php echo $ingredient->Ingredient_Name; ?></p>
                        </div>
                    </div> 
                    <?php      
                    }
                }
            ?>
             
            <div class="filter">
                <div class="filterFlex">
                    <img src="/var/www/html/Vue/image/filter.png" alt="" class="filterImage">
                    <p class="filterName">filterName</p>
                </div>
            </div>           
        </div>
        <h2 class="cocktailPresentation">Trendings</h2>
        <!--Ajouter carousel de carte-->
        <div class="cardSlider">
            <?php
                foreach($u as $cocktail){
            ?>
            <a href="<?php echo 'recette.php?ID='.$cocktail->Cocktail_ID?>" class='cardLink'>
                <div class="card" >
                    <div class="cardFlex"  style="background-color: #ffb3ba;">
                    <div class="imageContainer">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($cocktail->Image_Cocktail).'" alt="" class="imageBackground">' ?>
                    </div>
                    <h4 class="cocktailName"><?php echo $cocktail->Nom_Cocktail; ?></h4>
                        <div class="gradeContainer">
                            <img src="/var/www/html/Vue/image/star.png" alt="" class="star">
                            <p class="grade"><?php echo $cocktail->Cocktail_ID; ?></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php
                }
            ?>
        </div>
    </div>
   
    <div class="footer">
        <div class="navItem">
            <img src="/var/www/html/Vue/image/compass.png" alt="" class="iconNav">
            <p class="navText">Discover</p>
        </div>
        <div class="navItem">
            <img src="/var/www/html/Vue/image/shopping.png"" class="iconNav">
            <p class="navText">Ingrédients</p>
        </div>
        <div class="navItem">
            <img src="/var/www/html/Vue/image/user.png" alt="" class="iconNav">
            <p class="navText">Profil</p>
        </div>
    </div>

</body>
</html>