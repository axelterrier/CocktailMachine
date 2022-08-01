<?php
session_start();

if (isset($_SESSION['user'])) {
    // logged in
    $_SESSION['lastPage'] = 'favorite';
} else {
    header("Location:signin.php");
}
require_once('/var/www/html/CocktailMachine/config/config.php');
require_once('/var/www/html/CocktailMachine/Modele/gateway/gatewayCocktail.php');
    


$test = new GatewayCocktail($con);

$u = $test->getFavorite($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="favorite.css">
    <title>Favoris</title>
</head>
<body>
    <h1 id="title">Mes favoris</h1>
    <div class="cardSlider">
            <?php
                foreach($u as $cocktail){
            ?>
            <a href="<?php echo 'recette.php?ID='.$cocktail->Cocktail_ID?>" class='cardLink'>
                <div class="card" >
                    <div class="cardFlex">
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
</body>
</html>