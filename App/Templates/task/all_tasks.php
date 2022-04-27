<?php
/** @var TaskDTO[] $data */

use App\Models\tasks\TaskDTO;

?>
<div class="container">

    <div class="row">
        <div class="col-1">
            <?php include_once ('App/Templates/includes/left_navbar.php');?>
        </div>
        <div class="col-11">
            <h1 class="text-center">Tasks List</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>Task Id</td>
                    <td>Task Title</td>
                    <td>Task Description</td>
                    <td>Due Date</td>
                    <td>Progress</td>
                    <td>Completed</td>
                    <td>Goal ID</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($data as $TaskDTO): ?>
                    <tr>
                        <td><?= $TaskDTO->getTaskID(); ?></td>
                        <td><?= $TaskDTO->getTaskTitle(); ?></td>
                        <td><?= $TaskDTO->getTaskDescription() ?></td>
                        <td><?= $TaskDTO->getDueDate() ?></td>
                        <td><?= $TaskDTO->getProgress() ?>%</td>
                        <td><?= $TaskDTO->getCompleted() ?></td>
                        <td><?= $TaskDTO->getGoalID() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>