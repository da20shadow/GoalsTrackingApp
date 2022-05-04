<?php
?>
<div class="container">

    <div id="message"></div>

    <form method="post" id="taskForm"
          class="was-validated w-75 m-auto shadow-lg p-4 mt-5">

        <h2 class="text-center text-secondary fw-bold my-2">Create New Goal.</h2>

        <div class="mb-3">
            <label for="title" class="form-label">Goal Title:</label>
            <input class="form-control is-invalid" id="title" name="title"
                   type="text" placeholder="Goal Title..." required />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Goal Description:</label>
            <textarea class="form-control is-invalid" id="description" name="description"
                      placeholder="Required example textarea..."
                      required></textarea>
        </div>

        <div class="row g-3 mb-3">

            <div class="col-12 col-md-6">

                <label for="date" class="form-label">Due Date:</label>
                <input type="date" class="form-control is-invalid" id="date" name="date" required>

            </div>

            <div class="col-12 col-md-6">
                <label for="date" class="form-label">Category:</label>
                <select class="form-select" required aria-label="select example">
                    <option value="">Open this select menu</option>
                    <option value="1">Financial</option>
                    <option value="2">Personal</option>
                    <option value="3">Three</option>
                </select>
            </div>

        </div>



        <div class="mb-3">
            <button id="reg" class="btn btn-primary" type="submit">Create Goal</button>
        </div>
    </form>
</div>
