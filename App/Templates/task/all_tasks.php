<?php
/** @var TaskDTO[] $data */

use App\Models\tasks\TaskDTO;

?>
<div class="container">

    <h1 class="text-center fw-bold my-4">GOAL: HERE MUST BE THE GOAL TITLE!</h1>

    <p class="text-center my-3">Mar 18, 2022 - May 25, 2020</p>

    <div class="mb-3 d-flex justify-content-between">

        <div class="progress w-75" style="height: 25px;">
            <div id="progressBar" class="progress-bar bg-success"
                 role="progressbar" style="width: 65%;"
                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                65%
            </div>
        </div>

        <span class="border border-1 p-2">Your Progress Today: 3%</span>
    </div>



    <div class="my-3 shadow-sm border border-2 rounded border-secondary">

        <textarea class="form-control" id="desc" rows="6">Goal Description Comes Here .....</textarea>

    </div>

    <div class="d-flex justify-content-between mb-3">
        <span class="border border-1 p-1 small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
  <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
</svg> Target: 35% / day</span>
        <span class="border border-1 p-1 small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg> Days Left: 3 days</span>
    </div>

    <div class="d-flex justify-content-between">
        <span class="border border-1 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg> Tasks: (<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
</svg> 0 - 3)</span>

        <button onclick="location.href='create_task.php'" class="btn shadow-sm border">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg> Create New Task</button>
    </div>

    <div class="row">
        <?php foreach ($data as $task): ?>
        <div class="col-12 col-md-4">

            <div class="card my-3">
                <div class="card-header">
                    <h5 class="card-title"><?= $task->getTaskTitle() ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?= $task->getTaskDescription() ?>
                    </p>

                </div>
                <div class="card-footer">
                    <div class="progress" style="height: 25px;">
                        <div id="progressBar<?= $task->getTaskID() ?>" class="progress-bar bg-success"
                             role="progressbar" style="width: <?= $task->getProgress() ?>%;"
                             aria-valuenow="<?= $task->getProgress() ?>" aria-valuemin="0" aria-valuemax="100">
                            <?= $task->getProgress() ?>%
                        </div>
                    </div>
                    <input type="range" class="form-range" min="0" max="100" id="range<?= $task->getTaskID() ?>" value="<?= $task->getProgress() ?>">
                </div>
                <label for="range" class="form-label">
                    <span class="small" style="display:flex; justify-content: left; margin-left: 10px;"
                          id="percent<?= $task->getTaskID() ?>">Completed: <?= $task->getProgress() ?>%</span>
                    <span class="small"
                          style="display:flex; justify-content: right; margin-right: 10px;">Due Date: <?= $task->getDueDate() ?></span>
                </label>

            </div>

        </div>
            <script>

                let range<?= $task->getTaskID() ?> = document.getElementById('range<?= $task->getTaskID() ?>');
                range<?= $task->getTaskID() ?>.addEventListener('change',function (){
                    document.getElementById('percent<?= $task->getTaskID() ?>').innerHTML = "Completed: " + range<?= $task->getTaskID() ?>.value + "%"
                    document.getElementById('progressBar<?= $task->getTaskID() ?>').innerHTML = range<?= $task->getTaskID() ?>.value + "%";
                    document.getElementById('progressBar<?= $task->getTaskID() ?>').style.width = range<?= $task->getTaskID() ?>.value + "%";
                    document.getElementById('progressBar<?= $task->getTaskID() ?>').setAttribute('aria-valuenow',range<?= $task->getTaskID() ?>.value);
                })

            </script>
        <?php endforeach; ?>
    </div>

</div>