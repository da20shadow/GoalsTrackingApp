<?php /** @var SubtaskDTO $data */

use App\Models\subtasks\SubtaskDTO;
use App\Repositories\subtasks\SubTaskRepository;
use App\Service\subtask\SubTaskService;
use Database\Connect;

$subtask_id = $data->getSubTaskID();

$db = Connect::connect();
$subtaskRepository = new SubTaskRepository($db);
$subtaskService = new SubTaskService($subtaskRepository);

$subTasks = $subtaskService->getNestedSubtasks($subtask_id);

//TODO to add the subtasks list if there is one

$daysLeft = CalculateRemainDays::remainDays($data->getDueDate());
$remainPercents = CalculateRemainDays::targetPerDay($daysLeft,$data->getProgress());
$daysLeft = CalculateRemainDays::daysLeftToString($daysLeft);

$dueDate = date("M d, Y",strtotime($data->getDueDate()));
?>

<div class="container">
<div id="message"></div>
    <!--    START PIES PROGRESS-->

    <!--    END PIES PROGRESS-->

<!--    Task Title-->
    <p class="text-center text-warning fs-1 fw-bold mt-4">SUBTASK: </p>
    <h1 class="text-center text-secondary fs-2 fw-bold mb-4">
        <?= $data->getSubTaskTitle() ?>
    </h1>

<!--    Task Due Date-->
    <p class="text-center my-3 fst-italic"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
        </svg> <?= $dueDate ?>
    </p>

<!--    Back Button, Task Progress And Days Left Info-->
    <div class="mb-3 d-flex flex-wrap justify-content-between">

<!--        Button back-->
        <button class="btn btn-sm btn-secondary border-2 shadow-sm align-middle my-2 my-md-1" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg> Back
        </button>

        <?php if ($data->getTotalSubtasks() > 0): ?>
<!--        Task Progress-->
        <div class="progress w-75 my-2 my-md-1" style="height: 25px;">
            <div id="progressBar" class="progress-bar bg-success"
                 role="progressbar" style="width: <?= $data->getProgress() ?>%;"
                 aria-valuenow="<?= $data->getProgress() ?>" aria-valuemin="0" aria-valuemax="100">
                <?= $data->getProgress() ?>%
            </div>
        </div>

        <?php else: ?>

            <form method="post" id="changeStatusForm">

                <input type="number" name="task_id" value="0" hidden>

                <?php if ($data->getTaskID() != 0): ?>
                <input type="number" name="parent_task_id" value="<?= $data->getTaskID() ?>" hidden>
                <input type="text" name="table" value="tasks" hidden>
                <input type="text" name="parent_column" value="task_id" hidden>
                <?php else: ?>
                <input type="number" name="parent_task_id" value="<?= $data->getParentID() ?>" hidden>
                <input type="text" name="table" value="subtasks" hidden>
                <input type="text" name="parent_column" value="parent_id" hidden>
                <?php endif; ?>

                <?php if ($data->getCompleted() != 3): ?>
                <button type="submit"
                        class="btn btn-sm btn-success border-2 shadow-sm align-middle my-2 my-md-1" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg> Mark as Completed
                </button>
                <?php else: ?>
                <h3 class="text-success fw-bold">Task COMPLETED! Congratulations!</h3>
                <?php endif; ?>
            </form>

            <script>

                let changeStatusForm = document.getElementById('changeStatusForm');
                changeStatusForm.addEventListener('submit',function (event) {
                    event.preventDefault();

                    let taskStatus = <?= $data->getCompleted() ?>;
                    if (taskStatus === 3){
                        alert("Task is already market as completed!");
                    }else{
                        const formData = new FormData(this);
                        formData.set('task_id',<?= $subtask_id ?>);

                        const url = "App/Http/subtasks/changeTaskStatus.php";

                        sendFormDataToPHP(url, formData, "message");
                    }
                });
            </script>

        <?php endif; ?>



<!--        Days Left-->
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
            </svg> Days Left: <?= $daysLeft ?>
        </span>
    </div>

<!--    Task Description-->
    <div class="my-3 shadow-sm border border-2 rounded border-secondary">

        <textarea class="form-control" id="desc" rows="6"><?= $data->getSubTaskDescription() ?></textarea>

    </div>

    <div class="d-flex flex-wrap justify-content-between mt-4">

<!--        Completed / Total Tasks info-->
        <span class="border border-1 p-2 mb-3 mb-md-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-diagram-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM3 11.5A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
            </svg> Subtasks: (
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
            </svg> 0 - <?= $data->getTotalSubtasks() ?>)
        </span>

<!--        Create New Task Button-->
        <button onclick="location.href='create_subtask.php?task_id=<?= $data->getSubTaskID() ?>'" class="btn shadow-sm border">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg> Create New Subtask
        </button>
    </div>

    <!--    Subtasks List-->
    <div class="row mt-5">

        <div class="col-8 col-md-6 fw-bold fs-6">Subtask</div>
        <div class="col-1 fw-bold fs-6 d-none d-md-block">Due Date</div>
        <div class="col-1 fw-bold fs-6 d-none d-md-block">Priority</div>
        <div class="col-2 fw-bold fs-6 d-none d-md-block">Status</div>
        <div class="col-4 col-md-2 fw-bold fs-6">Progress</div>

    </div>
    <hr class="divider">

    <?php
    foreach ($subTasks as $task):
        $status = "TO DO";
        $statusColor = "text-secondary";
        $dbStatus = $task->getCompleted();

        if ($dbStatus == 1){
            $status = "IN PROGRESS";
            $statusColor = "text-warning";
        }else if ($dbStatus == 2){
            $status = "IN REVIEW";
            $statusColor = "text-info";
        }else if ($dbStatus == 3){
            $status = "COMPLETED";
            $statusColor = "text-success";
        }
    ?>

        <div class="row">

            <!--            Subtask Title-->
            <div class="col-8 col-md-6">

                <a class="text-dark" href="subtask.php?id=<?= $task->getSubTaskID() ?>">
                    <?= $task->getSubTaskTitle() ?>
                </a>

                <?php if ($task->getTotalSubtasks() > 0): ?>

                <span class="badge bg-primary rounded-pill" title="Subtasks"><?= $task->getTotalSubtasks() ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                </svg>

                <?php endif; ?>

            </div>

            <!--            Subtask due date-->
            <div class="col-1 small d-none d-md-block">

                <span onclick="enableCalendar()" id="dueDate"><?php echo (date("M d, Y",strtotime($task->getDueDate()))); ?></span>
                <input class="small" onchange="saveData()" style="display: none" id="calendar" type="date" value="<?php echo (date("Y-m-d",strtotime($task->getDueDate()))); ?>">

            </div>
            <script>
                function enableCalendar(){
                    document.getElementById('dueDate').style.display='none';
                    document.getElementById('calendar').style.display='block';
                }
                function saveData(){
                    document.getElementById('dueDate').style.display='block';
                    document.getElementById('calendar').style.display='none';
                }
            </script>
            <!--            Task Priority-->
            <div class="col-1 d-none d-md-block">
                <div class="btn-group">
                    <div id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-flag-fill" viewBox="0 0 16 16">
                            <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                        </svg>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg> Urgent
                            </a>
                        </li>
                        <li><a class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg> High
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightblue" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg> Normal
                            </a>
                        </li>
                        <li><a class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg> Low
                            </a>
                        </li>
                        <li><a class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                                </svg> No Priority
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--            Task Status-->
            <div class="col-2 d-none d-md-block">

                <div class="btn-group">
                    <button class="btn <?= $statusColor ?>" type="button" id="dropdownStatusButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $status ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownStatusButton">
                        <li onclick="changeStatusToDo()" class="dropdown-item text-secondary">
                            TO DO
                        </li>
                        <li onclick="changeStatusToProgress()" class="dropdown-item text-warning">
                            IN PROGRESS
                        </li>
                        <li onclick="changeStatusToReview()" class="dropdown-item text-info">
                            IN REVIEW
                        </li>
                        <li onclick="changeStatusToCompleted()" class="dropdown-item text-success">
                            COMPLETED
                        </li>
                    </ul>
                </div>

            </div>

<!--            Task Progress-->
            <div class="col-4 col-md-2">
                <div class="progress w-100" style="height: 25px;">
                    <div id="progressBar" class="progress-bar bg-success"
                         role="progressbar" style="width: <?= $task->getProgress() ?>%;"
                         aria-valuenow="<?= $task->getProgress() ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $task->getProgress() ?>%
                    </div>
                </div>
            </div>

        </div>

    <?php
    endforeach;
    ?>

    <hr class="divider">

</div>
