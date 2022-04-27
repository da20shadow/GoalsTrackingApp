<?php
/** @var GoalDTO[] $data */

use App\Models\goals\GoalDTO;

?>

<div class="container">

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center">Goals List</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Due Date</td>
                    <td>User ID</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($data as $goalDTO): ?>
                    <tr>
                        <td><?= $goalDTO->getGoalID(); ?></td>
                        <td><?= $goalDTO->getGoalTitle(); ?></td>
                        <td><?= $goalDTO->getGoalDescription() ?></td>
                        <td><?= $goalDTO->getDueDate() ?></td>
                        <td><?= $goalDTO->getUserID() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>
