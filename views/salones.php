<?php
include_once("../templates/header.php");
include_once("../templates/sidebar.php");
include_once("../models/Salones.php");

$salon = new Salon();

$dataS = $salon->getAllSalones();
?>
<section id="content">

    <!-- NAVBAR -->
    <?php
    include_once("../templates/navbar.php");
    ?>

    <!-- SECCION MAIN -->
    <main>
        <nav class="navbar bg-body-tertiary h-auto">
            <div class="container-fluid h-auto">
                <a class="navbar-brand" href="#">
                    <img src="../img/salon.png" alt="Logo" width="60px" class="d-inline-block align-text-top">
                    Salones
                </a>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header text-center fs-5 fw-semibold">
                        Registrar Salon
                    </div>
                    <div class="card-body">

                        <form action="../controllers/insertarSalon.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre Salon</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre_salon">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
                            </div>
                            <input type="submit" name="guardar" value="Guardar" class="btn btn-primary opacity-75 mb-3 btn-sm">
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-sn-12 col-md-12 col-lg-6 ">
                <div class="card mx-auto" style="width: 100%;">
                    <div class="card-header text-center fs-5 fw-semibold">
                        Lista de Salones
                    </div>

                    <?php
                    if (count($dataS) == 0) {
                    ?>
                        <p>No se ha creado ninigun salon</p>
                        <?php } else {
                        foreach ($dataS as $key => $value) {

                        ?>
                            <div class="accordion" id="accordionExample<?= $value['id_salon']; ?>">
                                <div class="accordion-item" data-info='["<?= $value['nombre_salon']; ?>","<?= $value['descripcion']; ?>","<?= $value['id_salon']; ?>"]'>
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $value['id_salon']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <?= $value['nombre_salon']; ?>
                                        </button>

                                    </h2>
                                    <div id="collapseOne<?= $value['id_salon']; ?>" class="accordion-collapse collapse bg-secondary-subtle" data-bs-parent="#accordionExample<?= $value['id_salon']; ?>">
                                        <div class="accordion-body ">
                                            <div class="container">
                                                <p><?= $value['descripcion']; ?></p>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#edit-modal" data-idsalon="<?= $value['id_salon']; ?>">Editar</button>
                                                <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#confirm-modal" data-idsalon="<?= $value['id_salon']; ?>">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
    </main>
</section>

<!-- Modal editar Formulario-->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Salon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controllers/editarSalon.php" method="POST" id="form-edit">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre Salon</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre_salon">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
                        <input type="text" hidden name="id_salon">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="guardar" value="Enviar" class="btn btn-primary opacity-75">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Confirmar Eliminacion-->
<div class="modal fade" id="confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <img src="../img/borrar.jpg" width="50px">
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Esta seguro de borrar este salon?

            </div>
            <form action="../controllers/eliminarSalon.php" method="POST" id="form-delete">
                <div class="modal-footer">
                    <input type="text" name="id_salon"  hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" name="guardar" value="Borrar" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../js/coreSalon.js"></script>
<?php
include_once("../templates/footer.php"); ?>