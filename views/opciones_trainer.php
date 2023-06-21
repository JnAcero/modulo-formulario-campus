<?php
include_once("../templates/header.php");
include_once("../templates/sidebar.php");
if (isset($_GET['req'])) {
    if ($_GET['req'] == 'get') {
        session_start();
        require_once("../models/Trainer.php");
        require_once("../models/Eps.php");
        require_once("../models/Pais.php");

        $trainer = new Trainer();
        $ciudad = new Pais();
        $eps = new Eps();
        $_SESSION['id'] = $_GET['id_persona'];
        $dataP = $trainer->getPersonaById($_SESSION['id']);
        $dataT = $trainer->getTrainerById($_SESSION['id']);

        $id_ciudad = $dataP['id_ciudad'];
        $id_eps = $dataP['id_eps'];
        $city = $ciudad->getCiudadById($id_ciudad);
        $salud = $eps->getEpsById($id_eps);


        //    print_r($dataP);
        //    echo "<br>";
        //    print_r($dataT);
    }
}
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
                        <a class="nav-link active" aria-current="page" href="#">Perfil Trainer</a>
                        <a class="nav-link" href="../views/salonesTrainer.php">Asignar salon a trainer</a>
                    </div>
                </div>
            </div>
        </nav>
        <section>
            <div class="row mt-3 gx-1">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="container w-auto">
                        <div class="card w-auto">
                            <img src="../img/<?= $dataP['foto_persona'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">N. Identificacion</h6>
                                <p class="card-text"><?= $dataP['tipo_id'] ?>:<?= $dataP['id_persona'] ?> </p>
                                <h6 class="card-title">Nombres</h6>
                                <p class="card-text"><?= $dataP['persona_nombre'] ?></p>
                                <h6 class="card-title">Apellidos</h6>
                                <p class="card-text"><?= $dataP['persona_apellido'] ?></p>
                                <h6 class="card-title">Fecha de Nacimiento</h6>
                                <p class="card-text"><?= $dataP['fecha_nacimiento'] ?></p>
                                <h6 class="card-title">Ciudad</h6>
                                <p class="card-text"><?= $city['ciudad_nombre'] ?></p>
                                <h6 class="card-title">Email</h6>
                                <p class="card-text"><?= $dataP['email'] ?></p>
                                <h6 class="card-title">Telefono</h6>
                                <p class="card-text"><?= $dataP['telefono'] ?></p>
                                <h6 class="card-title">EPS</h6>
                                <p class="card-text"><?= $salud['eps_nombre'] ?></p>
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="../controllers/editarTrainer.php?id_persona=<?= $dataP['id_persona']?>&id_trainer=<?= $dataT['id_trainer']?>" class="btn btn-primary">Editar Info</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="../controllers/eliminarTrainer.php?id_persona=<?= $dataP['id_persona']?>&id_trainer=<?= $dataT['id_trainer']?>" class="btn btn-danger">Eliminar</a>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                Informacion de Asignaciones
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Sin Asignaciones</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</section>