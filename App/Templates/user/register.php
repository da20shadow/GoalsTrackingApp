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
                            <input onchange="validateFirstname(this.value)" name="first_name" type="text"
                                   placeholder="First Name" pattern="<?php echo $namesPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="firstNameMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Last Name:
                            <input onchange="validateLastname(this.value)" name="last_name" type="text"
                                   placeholder="Last Name" pattern="<?php echo $namesPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="lastNameMessage" class="invalid-feedback"></div>
                        </label>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-md-6 mb-3">

                        <label>Username:
                            <input onchange="validateUsername(this.value)" name="username" type="text"
                                   placeholder="Username" pattern="<?php echo $usernamePattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="usernameMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Email:
                            <input onchange="validateEmail(this.value)" id="email" name="email" type="email"
                                   placeholder="Email" pattern="<?php echo $emailPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="emailMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-md-6 mb-3">

                        <label>Password:
                            <input onkeyup="validatePassword(this.value)" id="password" name="password"
                                   type="password" placeholder="Password" pattern="<?php echo $passwordPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="passwordMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Confirm Password:
                            <input onkeyup="validateRePassword(this.value)" id="confirmPassword" name="confirm_password"
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
        </div>
    </div>

</div>