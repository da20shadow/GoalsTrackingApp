<?php
/** @var UserDTO[] $data */

use App\Models\users\UserDTO;

?>
<div class="container">

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center">Users List</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($data as $userDTO): ?>
                    <tr>
                        <td><?= $userDTO->getId(); ?></td>
                        <td><?= $userDTO->getUsername(); ?></td>
                        <td><?= $userDTO->getEmail() ?></td>
                        <td><?= $userDTO->getFirstName() ?></td>
                        <td><?= $userDTO->getLastName() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>