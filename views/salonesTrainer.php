<?php
include_once("../templates/header.php");
include_once("../templates/sidebar.php");
session_start();
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
                        <a class="nav-link"  href="opciones_trainer.php?req=get&id_persona=<?= $_SESSION['id'] ?>">Perfil Trainer</a>
                        <a class="nav-link active" aria-current="page" href="../views/salonesTrainer.php">Asignar salon a trainer</a>
                    </div>
                </div>
            </div>
        </nav>
    </main>
</section>