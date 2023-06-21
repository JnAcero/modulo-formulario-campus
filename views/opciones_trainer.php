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

        $dataEps = $eps->getEps();
        $dataPais = $ciudad->getPaises();

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
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar Info</a>
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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../controllers/registrarTrainer.php?id_rol=2" method="POST">
                            <div class="row bg-light p-1">
                                <div class="mb-2 col-sm-6 col-md-6">
                                    <select class="form-select" aria-label="Default select example" id="tipo-sangre" name="tipo_id">
                                        <option selected>Tipo de Documento</option>
                                        <option value="CE">Cedula de extranjeria</option>
                                        <option value="CC">Cedula de ciudadania</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-6 col-md-6 ">
                                    <input type="text" placeholder="Numero de Documento" name="id_persona" class="form-control" required value="<?= $dataP['id_persona'] ?>">
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
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
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
                                                <option selected>Ciudad</option>
                                                <?php
                                                foreach ($dataPais as $key => $value) { ?>
                                                    <option value="<?= $value['id_ciudad'] ?>"><?= $value['ciudad_nombre'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row  mt-1">
                                        <div class=" mb-2 col-sm-12">
                                            <input type="text" class="form-control" id="direccion" placeholder="Direccion*" name="direccion" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-2 col-sm-12">
                                            <input type="email" class="form-control" id="emailcamper" placeholder="Email: pepe@gmail.com" required name="email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-2 col-sm-12 col-md-12">
                                            <input type="text" class="form-control" id="telefono" required placeholder="Telefono Personal" name="telefono" required>
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
                                            <option selected>EPS</option>
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
                                            <option selected>ARL</option>
                                            <option value="1">SURA</option>
                                            <option value="2">Seguros Bolivar</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto mt-1">
                                    <input class="btn btn-success" type="submit" value="Guardar" name="guardar">
                                </div>
                                <div class="d-grid mx-auto mt-1">
                                    <input class="btn btn-danger" type="reset" value="Borrar todo">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
</section>