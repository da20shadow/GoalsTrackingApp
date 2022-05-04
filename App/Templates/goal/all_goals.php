<?php
/** @var GoalDTO[] $data */

use App\Models\goals\GoalDTO;

?>

<div class="container">

    <h1 class="text-center text-secondary fw-bold my-4">My Goals List!</h1>

    <button class="btn btn-lg shadow-sm border d-flex m-auto my-4"
            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Create New Goal
    </button>

    <div class="row">
        <?php foreach ($data as $goal):

            $daysLeft = CalculateRemainDays::remainDays($goal->getDueDate());
            $remainPercents = CalculateRemainDays::targetPerDay($daysLeft,$goal->getProgress());
            $daysLeft = CalculateRemainDays::daysLeftToString($daysLeft);

        ?>
            <div class="col-12 col-md-6">

                <div class="card my-3 shadow-sm">

                    <div class="card-header">
                        <a href="goal.php?id=<?= $goal->getGoalID() ?>">
                            <h5 class="card-title text-center text-secondary fw-bold">
                                <?= $goal->getGoalTitle() ?>
                            </h5>
                        </a>

                    </div>

                    <div class="card-body">

                        <p class="card-text">
                            <?= substr($goal->getGoalDescription(),0,145) ?> ...
                        </p>

                        <div class="row">

                            <div class="mb-3">

                                <div class="d-flex justify-content-between mb-2">

                                    <span class="small text-secondary" >Due Date: <?= date("d M, Y",strtotime($goal->getDueDate())) ?></span>

                                    <span class="small text-secondary" id="percent<?= $goal->getGoalID() ?>">
                                        Completed: <strong><?= $goal->getProgress() ?>% </strong>
                                    </span>

                                </div>

                                <div class="progress" style="height: 5px;">
                                    <div id="progressBar<?= $goal->getGoalID() ?>" class="progress-bar bg-success"
                                         role="progressbar" style="width: <?= $goal->getProgress() ?>%;"
                                         aria-valuenow="<?= $goal->getProgress() ?>" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer">

                        <div class="d-flex justify-content-between">
                            <span class="badge bg-info text-dark p-2">Today's Target <?= $remainPercents ?>%</span>
                            <span class="badge bg-warning text-dark p-2">Days Left: <?= $daysLeft ?></span>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">

            <div class="modal-header">

                <h2 class="modal-title text-secondary fw-bold my-2">Create New Goal.</h2>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label for="title" class="form-label">Goal title</label>
                    <input class="form-control is-invalid" id="title" name="title"
                           type="text" placeholder="Goal Title..." required />

                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Goal Description</label>
                    <textarea class="form-control is-invalid" id="description" name="description"
                              placeholder="Required example textarea" rows="6"
                              required></textarea>
                </div>

                <div class="row g-3 mb-3">

                    <div class="col-12 col-md-6">

                        <label for="date" class="form-label">Due Date:</label>
                        <input type="date" class="form-control is-invalid" id="date" name="date" required>

                    </div>

                    <div class="col-12 col-md-6">
                        <label for="date" class="form-label">Category:</label>
                        <select class="form-select" required aria-label="select" disabled>
                            <option value="1" selected>Financial</option>
                        </select>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn border border-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>Create Goal
                </button>
            </div>
        </div>
    </div>
</div>
