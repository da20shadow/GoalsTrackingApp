const VALID_FIELD = "Looks OK!";
const EMPTY_USERNAME = "Please, enter username!";
const TOO_SHORT_USERNAME = "Too Short (min 4 chars)!";
const TOO_LONG_USERNAME = "Too long (max 40 chars)!";
const INVALID_CHARS_USERNAME = "a-z A-Z 0-9 and '_' Allowed!";

/* Input Patterns */
let namePattern = "^([A-Z][a-z]+)$";
let usernamePattern = "^([a-zA-Z]+[a-zA-Z0-9_]{3,})$";
let passwordPattern = "^[^\s]{8,45}$";
let emailPattern = "^([a-z]+[a-zA-Z0-9_]+[@]+[a-z]{3,15}[.]+[a-z]{2,3})$";

let regBtn = document.getElementById('reg');

let isFirstnameValid;
let isLastnameValid;
let isUsernameValid;
let isEmailValid;
let isPasswordValid = false;
let isRePasswordValid = false;

//Show OR Hide Reg Button If All Inputs Are Valid
function checkAllInputs(){

    let regForm = document.getElementById('regForm');
    let regFormData = new FormData(regForm);

    let firstName = regFormData.get('first_name');
    let lastName = regFormData.get('last_name');
    let username = regFormData.get('username');
    let email = regFormData.get('email');
    let password = regFormData.get('password');
    let rePassword = regFormData.get('confirm_password');

    if (isFirstnameValid === undefined){
        validateFirstname(firstName);
    }
    if (isLastnameValid === undefined){
        validateLastname(lastName)
    }
    if (isUsernameValid === undefined ){
        validateUsername(username)
    }
    if (isEmailValid === undefined){
        validateEmail(email)
    }
    if (isPasswordValid === undefined){
        validatePassword(password)
    }
    if (isRePasswordValid === undefined){
        validateRePassword(rePassword)
    }

     if (isFirstnameValid && isLastnameValid && isUsernameValid && isEmailValid && isPasswordValid && isRePasswordValid){
         regBtn.disabled = false;
         return true;
     }else {
         regBtn.disabled = true;
         return false;
     }
}

//Match Pattern
function matchPattern(input,pattern){
    return !!input.match(pattern);
}

//Validate Name
function checkName(name,messageID){
    if (name[0].toUpperCase() !== name[0]){
        messageID.innerHTML = "Must start with CAPITAL Letter!";
        messageID.className = "invalid-feedback";
        return false;
    }else if (name.length < 2){
        messageID.innerHTML = "(At least 2 chars)!";
        messageID.className = "invalid-feedback";
        return false;
    }else if (name.length > 40){
        messageID.innerHTML = "Max - 40 characters!";
        messageID.className = "invalid-feedback";
        return false;
    }else if (!name.match(namePattern)){
        messageID.innerHTML = "Only letters allowed!";
        messageID.className = "invalid-feedback";
        return false;
    }else {
        messageID.innerHTML = VALID_FIELD;
        messageID.className = "valid-feedback";
        return true;
    }
}

//Firstname Validation
function validateFirstname(firstname){
    let fNameMessage = document.getElementById('firstNameMessage');

    if (firstname === ""){
        fNameMessage.innerHTML = "Please, enter Firstname!";
        fNameMessage.className = "invalid-feedback";
        isFirstnameValid = false;
    }else {
        isFirstnameValid = checkName(firstname,fNameMessage);
    }
    checkAllInputs();
}

//Lastname Validation
function validateLastname(lastname){
    let lNameMessage = document.getElementById('lastNameMessage');

    if (lastname === ""){
        lNameMessage.innerHTML = "Please, enter Lastname!";
        lNameMessage.className = "invalid-feedback";
        isLastnameValid = false;
    }else {
        isLastnameValid = checkName(lastname,lNameMessage);
    }
    checkAllInputs();
}

//Username Validation
function validateUsername(username){
    let usernameMessage = document.getElementById('usernameMessage');
    if (username === ""){
        usernameMessage.innerHTML = EMPTY_USERNAME;
        usernameMessage.className = "invalid-feedback";
        isUsernameValid = false;
    }else if (username.length < 4 ){
        usernameMessage.innerHTML = TOO_SHORT_USERNAME;
        usernameMessage.className = "invalid-feedback";
        isUsernameValid = false;
    }else if (username.length > 40){
        usernameMessage.innerHTML = TOO_LONG_USERNAME;
        usernameMessage.className = "invalid-feedback";
        isUsernameValid = false;
    }else if (!username.match(usernamePattern)){
        usernameMessage.innerHTML = INVALID_CHARS_USERNAME;
        usernameMessage.className = "invalid-feedback";
        isUsernameValid = false;
    }else {
        usernameMessage.innerHTML = VALID_FIELD;
        usernameMessage.className = "valid-feedback";
        isUsernameValid = true;
    }
    checkAllInputs();
}

//Email Validation
function validateEmail(email){
    let emailMessage = document.getElementById('emailMessage');
    if (email === ""){
        emailMessage.innerHTML = "Please, enter email!";
        emailMessage.className = "invalid-feedback";
        isEmailValid = false;
    }else if (email.length < 9 ){
        emailMessage.innerHTML = "Please, enter VALID Email!";
        emailMessage.className = "invalid-feedback";
        isEmailValid = false;
    }else if (email.length > 140){
        emailMessage.innerHTML = "Too long (max 140 chars)!";
        emailMessage.className = "invalid-feedback";
        isEmailValid = false;
    }else if (!email.match(emailPattern)){
        emailMessage.innerHTML = "a-z A-Z 0-9 and '_' Allowed!";
        emailMessage.className = "invalid-feedback";
        isEmailValid = false;
    }else {
        emailMessage.innerHTML = VALID_FIELD;
        emailMessage.className = "valid-feedback";
        isEmailValid = true;
    }
    checkAllInputs();
}

//Password Validation
function validatePassword(password){
    let passwordMessage = document.getElementById('passwordMessage');

    if (password === ""){
        passwordMessage.innerHTML = "Enter password between 8 - 45 chars!";
        passwordMessage.className = "invalid-feedback";
        isPasswordValid = false;
    }else if (password.length < 8){
        passwordMessage.innerHTML = "Min 8 chars!";
        passwordMessage.className = "invalid-feedback";
        isPasswordValid = false;
    }else if (password.length > 45){
        passwordMessage.innerHTML = "Max 45 chars!";
        passwordMessage.className = "invalid-feedback";
        isPasswordValid = false;
    }else {
        passwordMessage.innerHTML = VALID_FIELD;
        passwordMessage.className = "valid-feedback";
        isPasswordValid = true;
    }
    checkAllInputs();
}

//Re-password Validation
function validateRePassword(rePassword){
    let rePasswordMessage = document.getElementById('rePasswordMessage');
    let password = document.getElementById('password').value;

    if (rePassword === ""){
        rePasswordMessage.innerHTML = "Re-Password!";
        rePasswordMessage.className = "invalid-feedback";
        isRePasswordValid = false;
    }else if (password !== rePassword){
        rePasswordMessage.innerHTML = "Passwords Doesn't Match!";
        rePasswordMessage.className = "invalid-feedback";
        isRePasswordValid = false;
    }else {
        rePasswordMessage.innerHTML = VALID_FIELD;
        rePasswordMessage.className = "valid-feedback";
        isRePasswordValid = true;
    }
    checkAllInputs();
}
