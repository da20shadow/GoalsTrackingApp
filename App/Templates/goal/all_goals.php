<?php
/** @var GoalDTO[] $data */

use App\Models\goals\GoalDTO;

?>

<table>
    <thead>
        <tr>
            <td>Title</td>
            <td>Description</td>
            <td>Due date</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $goal): ?>
            <tr>
                <td><?= $goal->getGoalTitle() ?></td>
                <td><?= $goal->getGoalDescription() ?></td>
                <td><?= $goal->getDueDate() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
