<?php
if (isset($_POST['guardar'])) {
    require_once("../models/Trainer.php");
    $trainer = new Trainer();
    $rol = intval($_GET['id_rol']);
    $eps = intval($_POST['eps_trainer']);
    $ciudad = intval($_POST['ciudad']);
    //$fecha=intval($_POST['fecha_nacimineto']) ;
    //print_r($_POST);
    $trainer->setId_persona($_POST['id_persona']);
    $trainer->setTipo_id($_POST['tipo_id']);
    $trainer->setPicture($_POST['foto']);
    $trainer->setFecha_nacimineto($_POST['fecha_nacimineto']);
    $trainer->setNames($_POST['nombres']);
    $trainer->setLastnames($_POST['apellidos']);
    $trainer->setEmail($_POST['email']);
    $trainer->SetDireccion($_POST['direccion']);
    $trainer->setTelefono($_POST['telefono']);
    $trainer->setCity($ciudad);
    $trainer->setRol($rol);
    $trainer->setEps($eps);
    $trainer->setName_contacto($_POST['nombre_contacto']);
    $trainer->setTelefono_contacto($_POST['tel_contacto']);
    $trainer->setArl($_POST['arl']);
    $trainer->insertTablaPersona();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
<div class="container w-50">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmacion Informacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Da click en confirmar si deseas guardar o volver para regresar a la pagina</p>
      </div>
      <div class="modal-footer">
        <a href="../modulo-formulario-trainner/index.php" class="btn btn-secondary" data-bs-dismiss="modal">Volver</a>
        <a href="tableTrainer.php?id_persona=<?=$_POST['id_persona']?>&id_arl=<?= $_POST['arl']?>&req=insert" class="btn btn-primary">Confirmar</a>
      </div>
    </div>
  </div>
  </div>


</body>

</html>