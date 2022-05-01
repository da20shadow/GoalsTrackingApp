<?php
if (isset($_SESSION['id'])){

    $conn = new \Database\Connect();
    $db = $conn::connect();
    $userRepo = new \App\Repositories\user\UserRepository($db);
    $data = $userRepo->findUserById($_SESSION['id']);
    ?>
    <div class="container">

        <h1 class="text-center">Hello, <?= $data->getFirstName(); ?></h1>

        <h5 class="text-center">Here is Your Account info:</h5>
        <h6 class="text-center">Your Username: <?= $data->getUsername(); ?></h6>
        <h6 class="text-center">Your Email: <?= $data->getEmail(); ?></h6>

        <button onclick="location.href='edit_profile.php'" class="btn shadow-sm border d-flex m-auto">Edit Account</button>

    </div>

<?php
}else{
    header("Location: login.php");
}

