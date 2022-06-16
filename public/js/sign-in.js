let inputName = document.getElementById('name');
let button = document.getElementById('sign-in-button');
button.disabled = true;
let pass1 = document.getElementById('pass1');
let pass2 = document.getElementById('pass2');
let alert = document.getElementById('password-alert');

pass1.onkeyup = function () {Compare();}
pass2.onkeyup = function () {Compare();}

inputName.onkeyup = function () {DisableButton();}


function Compare() {

    if ((pass1.value != pass2.value) || (pass1.value.length < 8)) {
        alert.style.visibility = 'inherit'
        button.disabled = true;
    } else {
        alert.style.visibility = 'hidden';
        button.disabled = false;
    }
}

function DisableButton() {
    if (inputName.value == 'ADMIN') {
        button.disabled = true;
    } else {
        button.disabled = false;
    }
}