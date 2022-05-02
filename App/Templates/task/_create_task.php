<?php
?>
<div class="container">

    <div id="message"></div>

    <form method="post" id="taskForm"
          class="was-validated w-75 m-auto shadow-lg p-4 mt-5">

        <h2 class="text-center text-secondary fw-bold my-2">Create New Task.</h2>

        <div class="mb-3">
            <label for="title" class="form-label">Task title</label>
            <input class="form-control is-invalid" id="title" name="title"
                   type="text" placeholder="Task Title..." required />
            <div class="invalid-feedback">
                Please enter a task title.
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Textarea</label>
            <textarea class="form-control is-invalid" id="description" name="description"
                      placeholder="Required example textarea"
                      required></textarea>
            <div class="invalid-feedback">
                Please enter a message in the textarea.
            </div>
        </div>

        <div class="row g-3 mb-3">

            <div class="col-12 col-md-4">
                <label for="date" class="form-label">Due Date</label>
                <input type="date" class="form-control is-valid" id="date" name="date" required>
            </div>

            <div class="col-12 col-md-8">
                <label for="tags" class="form-label">Last name</label>
                <input type="text" class="form-control is-valid" id="tags"
                       placeholder="tag,tag2,tag3,tag4">
            </div>
        </div>

        <div class="mb-3">
            <button id="reg" class="btn btn-primary" type="submit">Create Task</button>
        </div>
    </form>
</div>
