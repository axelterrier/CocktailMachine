function gender(){
    male = document.getElementById("male")
    female = document.getElementById('female')

    if(male.classList.contains('genderSelected')){
        male.classList.remove('genderSelected')
        female.classList.add("genderSelected")
    }else if(female.classList.contains('genderSelected')){
        female.classList.remove('genderSelected')
        male.classList.add('genderSelected')
    }
}

function toggleButton(){
    var age;
    var height;
    var weight;
    
    ageInput = document.getElementById('age')
    heightInput = document.getElementById('height')
    weightInput = document.getElementById('weight')
    validation = document.getElementById('validation')

    if(ageInput.value.length == ''){
        validation.classList.add('hide')
    }else{
        validation.classList.remove('hide')
    }

    if(heightInput.value == null){
        validation.classList.add('hide')
    }else{
        validation.classList.remove('hide')
    }

    if(weightInput.value == null){
        validation.classList.add('hide')
    }else{
        validation.classList.remove('hide')
    }



    //Autre fonction pour les labels

    var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}

}
