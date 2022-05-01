<?php
?>
<div class="container">

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center">Login</h1>

            <div id="message"></div>

            <form method="post" id="loginForm" class="was-validated w-75 m-auto">

                    <div class="col-12 col-md-6 mb-3">

                        <label>Username:
                            <input onchange="validateUsername(this.value)" name="username" type="text"
                                   placeholder="Username" pattern="<?php echo $usernamePattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="usernameMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                    <div class="col-12 col-md-6 mb-3">

                        <label>Password:
                            <input onkeyup="validatePassword(this.value)" id="password" name="password"
                                   type="password" placeholder="Password" pattern="<?php echo $passwordPattern; ?>"
                                   class="form-control is-invalid" required>
                            <div id="passwordMessage" class="invalid-feedback"></div>
                        </label>

                    </div>

                <div class="mb-3">
                    <button id="loginBtn" class="btn btn-primary" type="submit" >Login</button>
                </div>
            </form>

        </div>
    </div>

</div>
