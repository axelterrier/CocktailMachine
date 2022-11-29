function overflow(){
    var docWidth = document.documentElement.offsetWidth;

    [].forEach.call(
      document.querySelectorAll('*'),
      function(el) {
        if (el.offsetWidth > docWidth) {
          console.log(el);
        }
      }
    );
}


function hideCircles(){
    circles = document.getElementsByClassName("circles")
    circles[0].style.transition = "all 0.5s"
    circles[0].style.opacity = "0"
    setTimeout(hidePacman, 300)    
}

function hidePacman(){
    pacman = document.getElementsByClassName("pacman")
    pacman[0].style.transition = "all 1s"
    pacman[0].style.transform = "translateX(30vw) rotate(360deg)"
}


setTimeout(hideCircles, 5000)
//Appeler HideCircles dès que le verre est prêt à servir