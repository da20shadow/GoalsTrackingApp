<?php
/** @var GoalDTO[] $data */

use App\Models\goals\GoalDTO;

?>

<div class="container">

    <h1 class="text-center">Category: Goals CATEGORY NAME!</h1>
    <h3 class="text-center">CATEGORY NAME Goals:</h3>

    <button onclick="location.href='create_goal.php'" class="btn shadow-sm border d-flex m-auto">Create New Goal</button>

    <div class="row">
        <?php foreach ($data as $goal):

            $future = strtotime($goal->getDueDate());
            $now = time();
            $timeLeft = $future - $now;
            $daysLeft = ceil((($timeLeft/24)/60)/60) . " days";

            if ($daysLeft < 0){
                $daysLeft = "Overdue";
            }
        ?>
            <div class="col-12 col-md-4">

                <div class="card my-3 shadow-sm">

                    <div class="card-header">
                        <h5 class="card-title text-center text-dark fw-bold"><?= $goal->getGoalTitle() ?></h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="mb-3">

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="small text-secondary" id="percent<?= $goal->getGoalID() ?>">
                                        Completed: <?= $goal->getProgress() ?>%
                                    </span>

                                    <span class="small text-secondary" >Due Date: <?= $goal->getDueDate() ?></span>
                                </div>

                                <div class="progress" style="height: 5px;">
                                    <div id="progressBar<?= $goal->getGoalID() ?>" class="progress-bar bg-success"
                                         role="progressbar" style="width: <?= $goal->getProgress() ?>%;"
                                         aria-valuenow="<?= $goal->getProgress() ?>" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <p class="card-text">
                            <?= $goal->getGoalDescription() ?>
                        </p>

                    </div>
                    <div class="card-footer">

                        <div class="d-flex justify-content-between">
                            <span class="badge bg-warning text-dark p-2">Days Left: <?= $daysLeft ?></span>
                            <span class="badge bg-info text-dark p-2">Today's Target 35%</span>
                        </div>

                    </div>
                </div>

            </div>
            <script>

                let range<?= $goal->getGoalID() ?> = document.getElementById('range<?= $goal->getGoalID() ?>');
                range<?= $goal->getGoalID() ?>.addEventListener('change',function (){
                    document.getElementById('percent<?= $goal->getGoalID() ?>').innerHTML = "Completed: " + range<?= $goal->getGoalID() ?>.value + "%"
                    document.getElementById('progressBar<?= $goal->getGoalID() ?>').innerHTML = range<?= $goal->getGoalID() ?>.value + "%";
                    document.getElementById('progressBar<?= $goal->getGoalID() ?>').style.width = range<?= $goal->getGoalID() ?>.value + "%";
                    document.getElementById('progressBar<?= $goal->getGoalID() ?>').setAttribute('aria-valuenow',range<?= $goal->getGoalID() ?>.value);
                })

            </script>
        <?php endforeach; ?>
    </div>

</div>
