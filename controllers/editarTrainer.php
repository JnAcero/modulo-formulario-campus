<?php
    if ($_GET['req'] == "edit") {
        try{
        session_start();
        require_once("../models/Trainer.php");
        echo $_SESSION['id'];
        $trainer = new Trainer();

        $rol = intval($_GET['id_rol']);
        $eps = intval($_POST['eps_trainer']);
        $ciudad = intval($_POST['ciudad']);

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

        $trainer->editarInfoTrainer($_SESSION['id']);
        $trainer->editarDataTrainer($_SESSION['id']);
        
        }catch(Exception $e){
           return $e->getMessage();

        } ?>
      <script>
      document.location = `../views/opciones_trainer.php?id_persona=${<?= $_SESSION['id'] ?>}&req=get`;
      </script>
    }
<?php } ?>
