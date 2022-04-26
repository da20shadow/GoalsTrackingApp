<?php
/** @var UserDTO[] $data */

use App\Models\users\UserDTO;

?>
<table>
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