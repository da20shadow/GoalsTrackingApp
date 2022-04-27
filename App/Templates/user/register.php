<?php /** @var ErrorDTO $error */

use App\Models\errors\ErrorDTO;

$namesPattern = "^([A-Z][a-z]+)$";
$usernamePattern = "^([a-zA-Z]+[a-zA-Z0-9_]{3,})$";
$passwordPattern = "^[^\s]{8,45}$";
$emailPattern = "^([a-z]+[a-zA-Z0-9_]+[@]+[a-z]{3,15}[.]+[a-z]{2,3})$";
?>
<div class="container">

    <?php if ($error):?>
    <h3 class="text-center text-danger"><?= $error->getMessage() ?></h3>
    <?php endif; ?>

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center my-4">Register</h1>

            <form method="post" id="regForm" class="was-validated w-75 m-auto">

                <div class="row">

                    <div class="col-12 col-md-6 mb-3">

                        <label>First Name:
                            <input onchange="checkInputs()" id="fName" name="first_name" type="text"
                                   placeholder="First Name" pattern="<?php echo $namesPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="firstNameMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Last Name:
                            <input onchange="checkInputs()" id="lName" name="last_name" type="text"
                                   placeholder="Last Name" pattern="<?php echo $namesPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="lastNameMessage" class="invalid-feedback"></div>
                        </label>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-md-6 mb-3">

                        <label>Username:
                            <input onchange="checkInputs()" id="username" name="username" type="text"
                                   placeholder="Username" pattern="<?php echo $usernamePattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="usernameMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Email:
                            <input onchange="checkInputs()" id="email" name="email" type="email"
                                   placeholder="Email" pattern="<?php echo $emailPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="emailMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-md-6 mb-3">

                        <label>Password:
                            <input onkeyup="checkInputs()" id="password" name="password"
                                   type="password" placeholder="Password" pattern="<?php echo $passwordPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="passwordMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Confirm Password:
                            <input onkeyup="checkInputs()" id="confirmPassword" name="confirm_password"
                                   type="password" placeholder="Confirm Password" pattern="<?php echo $passwordPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="rePasswordMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                </div>

                <div class="mb-3">
                    <button id="reg" class="btn btn-primary" type="submit" disabled>Register</button>
                </div>
            </form>
            <script>
                function checkInputs(){
                    let regBtn = document.getElementById('reg');
                    let fName = document.getElementById('fName').value;
                    let lName = document.getElementById('lName').value;
                    let username = document.getElementById('username').value;
                    let email = document.getElementById('email').value;
                    let password = document.getElementById('password').value;
                    let confirmPassword = document.getElementById('confirmPassword').value;

                    let fNameMessage = document.getElementById('firstNameMessage');
                    let lNameMessage = document.getElementById('lastNameMessage');
                    let usernameMessage = document.getElementById('usernameMessage');
                    let emailMessage = document.getElementById('emailMessage');
                    let passwordMessage = document.getElementById('passwordMessage');
                    let rePasswordMessage = document.getElementById('rePasswordMessage');

                    if (fName === ""){
                        fNameMessage.innerHTML = "Please, enter Firstname!";
                        fNameMessage.className = "invalid-feedback";
                        return;
                    }else if (fName.length < 2 || fName.length > 45){
                        fNameMessage.innerHTML = "Min 2 - Max - 45 characters!";
                        fNameMessage.className = "invalid-feedback";
                        return;
                    }else if (!fName.match("<?php echo $namesPattern; ?>")){
                        fNameMessage.innerHTML = "Please, start with a capital letter and use only letters!";
                        fNameMessage.className = "invalid-feedback";
                        return;
                    }else {
                        fNameMessage.innerHTML = "Looks OK";
                        fNameMessage.className = "valid-feedback";
                    }

                    if (lName === ""){
                        lNameMessage.innerHTML = "Please, enter Lastname!";
                        lNameMessage.className = "invalid-feedback";
                        return;
                    }else if (lName.length < 2 || lName.length > 45){
                        lNameMessage.innerHTML = "Min 2 - Max - 45 characters!";
                        lNameMessage.className = "invalid-feedback";
                        return;
                    }else if (!lName.match("<?php echo $namesPattern; ?>")){
                        lNameMessage.innerHTML = "Please, start with a capital letter and use only letters!";
                        lNameMessage.className = "invalid-feedback";
                        return;
                    }else {
                        lNameMessage.innerHTML = "Looks OK";
                        lNameMessage.className = "valid-feedback";
                    }

                    if (username === ""){
                        usernameMessage.innerHTML = "Please, enter Username!";
                        usernameMessage.className = "invalid-feedback";
                        return;
                    }else if (username.length < 4 || username.length > 45){
                        usernameMessage.innerHTML = "Must be between 4 - 45 characters!";
                        usernameMessage.className = "invalid-feedback";
                        return;
                    }else if (!username.match("<?php echo $usernamePattern; ?>")){
                        usernameMessage.innerHTML = "Only letters, digits and '_' are allowed!";
                        usernameMessage.className = "invalid-feedback";
                        return;
                    }else {
                        usernameMessage.innerHTML = "Looks OK";
                        usernameMessage.className = "valid-feedback";
                    }

                    if (email === ""){
                        emailMessage.innerHTML = "Please, Enter VALID Email!";
                        emailMessage.className = "invalid-feedback";
                        return;
                    }else if (!email.match("<?php echo $emailPattern; ?>")){
                        emailMessage.innerHTML = "Please, Enter VALID Email!";
                        emailMessage.className = "invalid-feedback";
                        return;
                    }else if (email.length < 9 || email.length > 145){
                        emailMessage.innerHTML = "Must be between 10 - 145 characters!";
                        emailMessage.className = "invalid-feedback";
                        return;
                    }else {
                        emailMessage.innerHTML = "Looks OK";
                        emailMessage.className = "valid-feedback";
                    }

                    if (password === ""){
                        passwordMessage.innerHTML = "Enter password between 8 - 45 chars!";
                        passwordMessage.className = "invalid-feedback";
                        return;
                    }else if (password.length > 45 || password.length < 8){
                        passwordMessage.innerHTML = "Enter password between 8 - 45 chars!";
                        passwordMessage.className = "invalid-feedback";
                        return;
                    }else {
                        passwordMessage.innerHTML = "Looks OK!";
                        passwordMessage.className = "valid-feedback";
                    }

                    if (confirmPassword === ""){
                        rePasswordMessage.innerHTML = "Re-Password!";
                        rePasswordMessage.className = "invalid-feedback";
                        return;
                    }else if (password !== confirmPassword){
                        rePasswordMessage.innerHTML = "Passwords Doesn't Match!";
                        rePasswordMessage.className = "invalid-feedback";
                        return;
                    }else {
                        rePasswordMessage.innerHTML = "Looks OK!";
                        rePasswordMessage.className = "valid-feedback";
                    }

                    if (!fName.match("<?php echo $namesPattern; ?>")
                        || fName.length < 2 || fName.length > 45
                        || !lName.match("<?php echo $namesPattern; ?>")
                        || lName.length < 2 || lName.length > 45
                        || !username.match("<?php echo $usernamePattern; ?>")
                        || username.length < 4 || lName.length > 45
                        || !email.match("<?php echo $emailPattern; ?>")
                        || email.length < 9 || email.length > 145
                        || password === "" || confirmPassword === ""
                        || password !== confirmPassword){

                        console.log("INVALID FORM DATA!")
                        regBtn.disabled = true;

                    }else {
                        console.log("VALID FORM DATA!")
                        regBtn.disabled = false;
                    }
                }
            </script>
        </div>
    </div>

</div>