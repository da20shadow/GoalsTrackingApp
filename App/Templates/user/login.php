<?php
?>
<div class="container">

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center">Login</h1>

            <form class="row g-3 justify-content-center">

                <div class="col-8 col-lg-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control is-valid"
                           id="username" name="username"
                           placeholder="Username" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-8 col-lg-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control is-valid"
                           id="password" name="password"
                           placeholder="Password" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
