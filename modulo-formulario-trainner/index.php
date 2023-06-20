<?php 
 require_once("../models/Eps.php");
 require_once("../models/Pais.php");
 $eps = new Eps();
 $dataEps = $eps->getEps();
 $pais= new Pais();
 $dataPais = $pais->getPaises();
// print_r($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo Trainers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Campers</a>
                    <a class="nav-link" href="#">Trainers</a>
                    <a class="nav-link" href="#">Personal Administartivo</a>
                    <a class="nav-link disabled">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- SECCION MAIN -->
    <div class="container">
        <div class="row gx-5">
            <!-- FORMULARIO -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5 col-xxl-5">
                <h3>Registro de Trainers</h3>
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
                            <input type="text" placeholder="Numero de Documento" name="id_persona" class="form-control" required>
                        </div>
                    </div>
                    <div class="row bg-light p-1">
                        <div class="col-sm-12 col-md-6">
                            <label for="birthday" class="form-label"> Fecha de Nacimineto*</label>
                            <input type="date" class="form-control" id="birthday" name="fecha_nacimineto">
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
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
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
                                    foreach($dataPais as $key => $value){ ?>
                                    <option value="<?= $value['id_ciudad'] ?>"><?=$value['ciudad_nombre'] ?></option>
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
                                    foreach($dataEps as $key => $value){ ?>
                                    <option value="<?= $value['id_eps'] ?>"><?=$value['eps_nombre'] ?></option>
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
            <!-- TABLA CAMPERS -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7 mt-sm-4 mt-md-0">
                <h3>Listado de Campers</h3>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>

                            <th scope="col">Foto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Asignaciones</th>
                            <th scope="col">Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><img src="../modulo-formulario-camper/img/trainer.png" alt="trainer" width="80px"></th>
                            <td scope="row">Josver Osorio</td>
                            <td scope="row">
                                <div class="d-grid mx-auto mt-1">
                                    <a href="asignacionesTrainer.php" class="btn btn-secondary">Asignar salon</a>
                                </div>
                            </td>
                            <td scope="row">
                                <div class="d-grid mx-auto mt-1">
                                    <button class="btn btn-primary">Editar</button>
                                    <button class="btn btn-danger mt-1">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><img src="../modulo-formulario-camper/img/trainer.png" alt="trainer" width="80px"></th>
                            <td>Leonardo Dicapprio</td>
                            <td>Thornton</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><img src="../modulo-formulario-camper/img/trainer.png" alt="trainer" width="80px"></th>
                            <td colspan="2">Mark Antonny</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script src="scripts/app.js"></script> -->
</body>

</html>