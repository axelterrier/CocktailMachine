slider = document.getElementById("slider")

function sliderValue(){
    var val = document.getElementById("slider").value;
    if(val < 900){
        document.getElementById("slider").value = 10   
    }else if(val > 900 && val <= 1000){
        document.getElementById("slider").value = 1000
    }
}

function setInputToZero(){
        document.getElementById("slider").value = document.getElementById("slider").value-1;
}