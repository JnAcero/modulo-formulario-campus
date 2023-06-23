<?php 

require_once("../models/Salones.php");

$salon = new Salon();

$salon->setNombreSalon($_POST['nombre_salon']);
$salon->setDescripcion($_POST['descripcion']);

$salon->editarSalon($_POST['id_salon']);
?>
<script>
    document.location = '../views/salones.php';
</script>