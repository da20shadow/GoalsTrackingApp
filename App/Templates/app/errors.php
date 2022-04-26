<?php
use App\Models\errors\ErrorDTO;
/** @var ErrorDTO $data */
?>

<h2 class="error">Oops, an Error Occurred :(</h2>

<p style="color: red;"><?= $data->getMessage(); ?></p>
