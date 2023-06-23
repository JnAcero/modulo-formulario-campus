<?php

include_once("../templates/header.php");
include_once("../templates/sidebar.php");
include_once("../models/Salones.php");
session_start();
$salon = new Salon();

$dataS = $salon->getAllSalones();

?>
<section id="content">
    <?php include_once("../templates/navbar.php") ?>
    <main>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../img/trainer3.jpg" width="100px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav nav-underline" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="opciones_trainer.php?req=get&id_persona=<?= $_SESSION['id'] ?>">Perfil Trainer</a>
                        <a class="nav-link active" aria-current="page" href="../views/salonesTrainer.php">Asignar salon a trainer</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="card mt-3 w-75 ">
            <div class="card-header">
                Asignacion de Salon
            </div>
            <div class="card-body">
                <label class="form-label">Asignar salon a tariner:</label>
                <select class="form-select" aria-label="Default select example" name="id_salon">
                    <?php
                    foreach ($dataS as $key => $value) {
                    ?>
                        <option value="<?= $value['id_salon'] ?>"><?= $value['nombre_salon'] ?></option>
                    <?php } ?>
                </select>
                <label class="form-label mt-2">Seleccinar franja horaria:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      <p>  6:00 am -  9:00 am</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                       <p>10:30 am - 1:30 pm</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    <p> 2:00 pm -  5:00 pm</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      <p> 5:00 pm -  8:00 pm</p>
                    </label>
                </div><
    </main>
</section>
<?php
include_once("../templates/footer.php"); ?>