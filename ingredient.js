
function countCheckBox() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    console.log(checkboxes.length)
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
    }
}
