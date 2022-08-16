function isDarkModeOn(){
    if (document.getElementById('checkBox').checked) {
        document.getElementById("valueDarkMode").innerHTML = "on";
    } else {
        document.getElementById("valueDarkMode").innerHTML = "off";
    }
}