// function chooseTheme() {
//     var value = document.getElementById("theme").value;  
//     if (value != "Choisi la couleur")  
//     {         
//         localStorage.setItem('color', value);
//     }
//     const color = localStorage.getItem('color');
//     loadThemCSSFile(color)  
// }

                
function loadThemCSSFile(theme) { //Fonction pour charger un nouvel ellement css
    const color = theme;
    console.log("Le nom du storage est : "+color);
    var head = document.getElementsByTagName('HEAD')[0];
    var link = document.createElement('link');
    link.rel = 'stylesheet';     
    link.type = 'text/css';
    link.href = 'theme/'+color+'.css'; // La on lira un cookie pour savoir quel ficher charger
    head.appendChild(link);
    localStorage.setItem('color', theme);
}
                
function getStorage() {
    const colors = localStorage.getItem('color');
    //If undefined -> defined theme by default
    return colors;
}
               
              