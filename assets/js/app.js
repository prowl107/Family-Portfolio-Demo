$(document).foundation()

//Simple client side form validation:
const form = document.getElementById('contact');
var button = document.getElementById('contact_send');

form.addEventListener('input', updateValue);

function updateValue(e) {
    if (form.checkValidity()) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}




