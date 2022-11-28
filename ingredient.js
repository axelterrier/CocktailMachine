
function countCheckBox() {
    
    
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    if(checkboxes.length == 0){
        document.getElementById("countInfo").innerHTML = "Choisissez jusqu'à 10 ingrédients";
    }else if(checkboxes.length == 1){
        document.getElementById("countInfo").innerHTML = "Voir l'ingrédient sélectionné";
    }else if(checkboxes.length > 1 && checkboxes.length <= 10){
        if(checkboxes.length == 10){
            document.getElementById("countInfo").innerHTML = "Vous avez atteint le nombre maximum d'ingrédients";
        }else{
            document.getElementById("countInfo").innerHTML = "Voir les " + checkboxes.length + " ingrédients sélectionné";
        }
    }else{
        document.getElementById("countInfo").innerHTML = "problème";
         //C'est les problèmes la
    }
    updateButtonBackground(checkboxes.length)
}

function updateButtonBackground(checkbox){
    console.log(checkbox)
    var button = document.getElementById('count');
    const styles = getComputedStyle(document.documentElement);
    const buttonClickable = styles.getPropertyValue('--ingredient-button-clickable').trim();
    const buttonNonClickable = styles.getPropertyValue('--ingredient-button-non-clickable').trim();
    if(checkbox == 0){
        button.style.backgroundColor = buttonNonClickable
    }else if(checkbox > 0){
        button.style.backgroundColor = buttonClickable
    }else if(checkbox == null){
        button.style.backgroundColor = buttonNonClickable
    }
}
