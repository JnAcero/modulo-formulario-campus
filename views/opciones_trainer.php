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
        $dataPais = $ciudad->getPaises();
        $dataEps = $eps->getEps();

        $_SESSION['id'] = $_GET['id_persona'];
        $dataP = $trainer->getPersonaById($_SESSION['id']);
        $dataT = $trainer->getTrainerById($_SESSION['id']);

        $id_ciudad = $dataP['id_ciudad'];
        $id_eps = $dataP['id_eps'];
        $city = $ciudad->getCiudadById($id_ciudad);
        $salud = $eps->getEpsById($id_eps);
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
                                <h6 class="card-title">EPS</h6>
                                <div class="row">
                                    <div class="col-auto">
                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" class="btn btn-primary">Editar Info</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="../controllers/eliminarTrainer.php?id_persona=<?= $dataP['id_persona'] ?>&id_trainer=<?= $dataT['id_trainer'] ?>" class="btn btn-danger">Eliminar</a>
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

        <!-- Modal Editar-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../controllers/editarTrainer.php?req=edit&id_trainer=<?= $dataT['id_trainer'] ?>&id_rol=2" method="POST">
                            <div class="row bg-light p-1">
                                <div class="mb-2 col-sm-6 col-md-6">
                                    <select class="form-select" aria-label="Default select example" id="tipo_id" name="tipo_id">
                                        <option>Tipo de Documento</option>
                                        <?php if ($dataP['tipo_id'] == "CC") { ?>
                                            <option value="CE">Cedula de extranjeria</option>
                                            <option value="CC" selected>Cedula de ciudadania</option>
                                        <?php } else { ?>
                                            <option value="CE" selected>Cedula de extranjeria</option>
                                            <option value="CC">Cedula de ciudadania</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-6 col-md-6 ">
                                    <input type="text" placeholder="Numero de Documento" name="id_persona" class="form-control" value="<?= $dataP['id_persona'] ?>" required>
                                </div>
                            </div>
                            <div class="row bg-light p-1">
                                <div class="col-sm-12 col-md-6">
                                    <label for="birthday" class="form-label"> Fecha de Nacimineto*</label>
                                    <input type="date" class="form-control" id="birthday" name="fecha_nacimineto" value="<?= $dataP['fecha_nacimiento'] ?>">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div>
                                        <img src="../modulo-formulario-camper/img/camaraicon.png" alt="" width="30px">
                                        <label for="foto" class="text-center">Subir Foto</label>
                                        <input type="file" id="foto" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                            <div class=" row bg-light p-1">
                                <div class=" col-sm-12 col-md-6 ">
                                    <label for="nombres" class="form-label"> Nombres *</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $dataP['persona_nombre'] ?>" required>
                                </div>
                                <div class=" col-sm-12 col-md-6">
                                    <label for="apellidos" class="form-label">Apellidos *</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $dataP['persona_apellido'] ?>" required>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="mt-2">Informacion de Contacto</h5>
                                <hr>
                                <div class="bg-light p-1">
                                    <div class="row bg-light p-1">
                                        <div class=" mb-2 col-sm-12 col-md-12">
                                            <select class="form-select" aria-label="Default select example" id="pais" name="pais">
                                                <option selected>Pais de Origen</option>
                                                <option value="1">Colombia</option>
                                            </select>
                                        </div>
                                        <div class=" mb-2 col-sm-6 col-md-6">

                                            <select class="form-select" aria-label="Default select example" id="region" name="region">
                                                <option selected>Region</option>
                                                <option value="1">Santander</option>
                                            </select>
                                        </div>
                                        <div class=" mb-2 col-sm-6 col-md-6">
                                            <select class="form-select" aria-label="Default select example" id="ciudad" name="ciudad" required>
                                                <option>Ciudad</option>
                                                <option selected value="<?= $dataP['id_ciudad'] ?>"><?= $city['ciudad_nombre'] ?></option>
                                                <?php
                                                foreach ($dataPais as $key => $value) { ?>
                                                    <option value="<?= $value['id_ciudad'] ?>"><?= $value['ciudad_nombre'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row  mt-1">
                                        <div class=" mb-2 col-sm-12">
                                            <input type="text" class="form-control" id="direccion" placeholder="Direccion*" name="direccion" value="<?= $dataP['direccion'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-2 col-sm-12">
                                            <input type="email" class="form-control" id="emailcamper" placeholder="Email: pepe@gmail.com" required name="email" value="<?= $dataP['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-2 col-sm-12 col-md-12">
                                            <input type="text" class="form-control" id="telefono" required placeholder="Telefono Personal" name="telefono" value="<?= $dataP['telefono'] ?>" required>
                                        </div>
                                    </div>
                                    <h6>Contacto de Emergencias</h6>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <input type="text" class="form-control" id="nombre-contacto" placeholder="Nombre" name="nombre_contacto">

                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <input type="text" class="form-control" id="telefono" placeholder="Telefono Emergencias" name="tel_contacto">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <h5 class="mt-2">Informacion Medica</h5>
                                <hr>
                                <div class="row bg-light p-1">
                                    <div class="mb-2 col-sm-6 col-md-6">
                                        <select class="form-select" aria-label="Default select example" id="tipo-sangre">
                                            <option selected>Tipo de Sangre</option>
                                            <option value="1">O+</option>
                                            <option value="2">O-</option>
                                            <option value="3">A-</option>
                                            <option value="3">A+</option>
                                            <option value="3">AB+</option>
                                            <option value="3">AB-</option>
                                        </select>
                                    </div>
                                    <div class="mb-2 col-sm-6 col-md-6">
                                        <select class="form-select" aria-label="Default select example" id="eps" name="eps_trainer" required>
                                            <option>EPS</option>
                                            <option value="<?= $dataP['id_eps'] ?>" selected><?= $salud['eps_nombre'] ?></option>
                                            <?php
                                            foreach ($dataEps as $key => $value) { ?>
                                                <option value="<?= $value['id_eps'] ?>"><?= $value['eps_nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="mt-2">Seguridad Social</h5>
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" id="arl" name="arl" required>
                                            <option>ARL</option>
                                            <?php if ($dataT['id_arl'] == "1") { ?>
                                                <option value="1" selected>SURA</option>
                                                <option value="2">Seguros Bolivar</option>
                                            <?php } else { ?>
                                                <option value="1">SURA</option>
                                                <option value="2" selected>Seguros Bolivar</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" name="editar" value="Enviar">
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</section>