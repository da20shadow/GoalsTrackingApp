<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
        <a href='index.php' class="nav-link">Home</a>
<?php

if (isset($_SESSION['id'])) {

//    $conn = new \Database\Connect();
//    $db = $conn::connect();
//    $userRepo = new \App\Repositories\user\UserRepository($db);
//    $data = $userRepo->findUserById($_SESSION['id']);
?>
    <a href='users.php' class="nav-link">Members</a>
    <a href='create_goal.php' class="nav-link">Create Goal</a>
    <a href='goals.php' class="nav-link">Goals</a>
    <a href='account.php' class="nav-link">Account</a>
    <a href='all_tasks.php' class="nav-link">TASKS</a>
    <a href='logout.php' class="nav-link">Logout</a>
<?php

}else {
    ?>
    <a href='login.php' class="nav-link">Login</a>
    <a href='register.php' class="nav-link">Register</a>
<?php
}
?>
    </nav>
</header>
