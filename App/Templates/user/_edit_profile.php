<?php
if (isset($_SESSION['id'])){

    $conn = new \Database\Connect();
    $db = $conn::connect();
    $userRepo = new \App\Repositories\user\UserRepository($db);
    $data = $userRepo->findUserById($_SESSION['id']);
    ?>
    <div class="container">

        <h1 class="text-center my-4">Edit <?= $data->getFirstName(); ?>'s Profile</h1>

        <div id="message"></div>

        <form method="post" id="editForm" class="was-validated w-75 m-auto">

            <div class="row">

                <div class="col-12 col-md-6 mb-3">

                    <label>First Name:
                        <input onchange="validateFirstname(this.value)" name="first_name" type="text"
                               placeholder="First Name" pattern="<?php echo $namesPattern; ?>"
                               class="form-control is-invalid" required value="<?= $data->getFirstName(); ?>">
                        <div id="firstNameMessage" class="invalid-feedback"></div>
                    </label>

                </div>

                <div class="col-12 col-md-6 mb-3">

                    <label>Last Name:
                        <input onchange="validateLastname(this.value)" name="last_name" type="text"
                               placeholder="Last Name" pattern="<?php echo $namesPattern; ?>"
                               class="form-control is-invalid" required value="<?= $data->getLastName(); ?>">
                        <div id="lastNameMessage" class="invalid-feedback"></div>
                    </label>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-md-6 mb-3">

                    <label>Username:
                        <input onchange="validateUsername(this.value)" name="username" type="text"
                               placeholder="Username" pattern="<?php echo $usernamePattern; ?>"
                               class="form-control is-invalid" required value="<?= $data->getUsername(); ?>">
                        <div id="usernameMessage" class="invalid-feedback"></div>
                    </label>

                </div>

                <div class="col-12 col-md-6 mb-3">

                    <label>Email:
                        <input onchange="validateEmail(this.value)" id="email" name="email" type="email"
                               placeholder="Email" pattern="<?php echo $emailPattern; ?>"
                               class="form-control is-invalid" required value="<?= $data->getEmail(); ?>">
                        <div id="emailMessage" class="invalid-feedback"></div>
                    </label>

                </div>

            </div>

            <div class="row">

                <div class="col-12 col-md-6 mb-3">

                    <label>New Password:
                        <input onkeyup="validatePassword(this.value)" id="password" name="password"
                               type="password" placeholder="Password" pattern="<?php echo $passwordPattern; ?>"
                               class="form-control is-invalid" required>
                        <div id="passwordMessage" class="invalid-feedback"></div>
                    </label>

                </div>

                <div class="col-12 col-md-6 mb-3">

                    <label>Confirm New Password:
                        <input onkeyup="validateRePassword(this.value)" id="confirmPassword" name="confirm_password"
                               type="password" placeholder="Confirm Password" pattern="<?php echo $passwordPattern; ?>"
                               class="form-control is-invalid" required>
                        <div id="rePasswordMessage" class="invalid-feedback"></div>
                    </label>

                </div>

            </div>

            <div class="mb-3 d-flex justify-content-center">
                <label>Current Password:
                    <input onkeyup="validatePassword(this.value)" id="password" name="password"
                           type="password" placeholder="Password" pattern="<?php echo $passwordPattern; ?>"
                           class="form-control is-invalid" required>
                    <div id="passwordMessage" class="invalid-feedback"></div>
                </label>
            </div>

            <div class="mb-3">
                <button class="btn shadow-sm border d-flex m-auto" type="submit">Save Changes</button>
            </div>
        </form>



    </div>


    <?php
}else{
    header("Location: login.php");
}

