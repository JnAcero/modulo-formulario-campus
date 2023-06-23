<?php

require_once("../models/Salones.php");

$salon = new Salon();

$salon->eliminarSalon($_POST['id_salon']);
?>
<script>
    document.location = '../views/salones.php';
</script> 