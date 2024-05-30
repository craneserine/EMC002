var passwordInput = document.getElementById("password");
var length = document.getElementById("length");
var capital = document.getElementById("capital");
var lowercase = document.getElementById("lowercase");
var number = document.getElementById("number");
var special = document.getElementById("special");

passwordInput.onkeyup = function() {
    // Validate length
    if (passwordInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (passwordInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (passwordInput.value.match(lowerCaseLetters)) {
        lowercase.classList.remove("invalid");
        lowercase.classList.add("valid");
    } else {
        lowercase.classList.remove("valid");
        lowercase.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (passwordInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate special characters
    var specialChars = /[!@#$%^&*()_+{}\|:\"<>?,./;'[\]\-\\]/g;
    if (passwordInput.value.match(specialChars)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
    } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
    }
}
