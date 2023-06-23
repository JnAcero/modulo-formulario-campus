<?php

require_once("../models/Salones.php");

if(isset($_POST['guardar'])){
    if($_POST['guardar'] == "Guardar"){

        $salones = new Salon();

        $salones->setNombreSalon($_POST['nombre_salon']);
        $salones->setDescripcion($_POST['descripcion']);

        $salones->crearSalon(); ?>
    <script>
        document.location = '../views/salones.php';
    </script>
<?php
    }

} 
?>