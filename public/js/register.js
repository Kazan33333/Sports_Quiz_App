const form = document.querySelector('form');
const emailInput = form.querySelector('input[name="email"]');
const confirmPasswordInput = form.querySelector('input[name="confirmPassword"]');
const button = document.getElementById('register');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmPassword) {
    return password === confirmPassword;
}

function markValidation(element, condition) {
    !condition ? no_valid(element) : valid(element);
}

function no_valid(element) {
    element.classList.add('no-valid');
    button.disabled = true;
}

function valid(element) {
    element.classList.remove('no-valid');
    button.disabled = false;
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value))
        },
        1000);
}

emailInput.addEventListener('keyup', validateEmail);

confirmPasswordInput.addEventListener('keyup', validatePassword);