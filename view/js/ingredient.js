function countCheckBox(id) {

    var list = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var allCheckboxes = document.querySelectorAll('input[type="checkbox"]');

    if (checkboxes.length > 10) {
        checkbox = document.getElementById(id)
        checkbox.checked = false
        return
    }

    for (i = 0; i < checkboxes.length; i++) {
        list.push(checkboxes[i].id)
    }

    console.log(list)
    postCookie(list)
    console.log(list)
}

function postCookie(list) {
    var Json = JSON.stringify(list);
    setCookie("Pompe", Json, 1)

    $.ajax({

        url: 'insertIntoDB.php',
        type: 'POST',
        success: function (result) {
            console.log('success'); // Here, you need to use response by PHP file.
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }

    });
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}