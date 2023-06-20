<?php
if (isset($_GET['req'])) {
    if ($_GET['req'] == 'insert') {
        echo "hola";
        require_once("../models/Trainer.php");
        $trainer = new Trainer();
        $trainer->setId_persona($_GET['id_persona']);
        $trainer->setArl(intval( $_GET['id_arl']));
        $trainer->insertTablaTrainer();
        echo "<script> document.location='../modulo-formulario-trainner/index.php';</script>";
    }
}
