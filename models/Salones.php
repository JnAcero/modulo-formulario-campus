<?php 
require_once("../config/Conection.php");

class Salon extends Conection{
    private $nombre_salon;
    private $descripcion;

    public function __construct($nombre_salon="", $descripcion="",$cnx=""){
        $this->nombre_salon = $nombre_salon;
        $this->descripcion = $descripcion;
        
        parent::__construct($cnx);
    }
    
    public function setNombreSalon($nombre){
        $this->nombre_salon = $nombre;
    }
    public function setDescripcion($desc){
        $this->descripcion = $desc;
    }

    public function crearSalon(){
        try{
        $sql ="INSERT INTO `salones`(`nombre_salon`, `descripcion`) VALUES (?,?)";
        $stm = $this->cnx->prepare($sql);
        $stm->execute([$this->nombre_salon,$this->descripcion]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function eliminarSalon($id){
        try{
            $sql = "DELETE FROM salones WHERE id_salon=$id";
            $stm = $this->cnx->prepare($sql);
            $stm->execute();
        }catch(Exception $e){
            $e->getMessage();
        }
        
    }

    public function editarSalon($id){
        try{
            $sql = "UPDATE `salones` SET `nombre_salon`=?,`descripcion`=? WHERE id_salon=$id";
            $stm = $this->cnx->prepare($sql);
            $stm->execute([$this->nombre_salon,$this->descripcion]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function getAllSalones(){
        try{
            $sql = "SELECT * FROM salones";
            $stm = $this->cnx->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        }catch(Exception $e){
            $e->getMessage();
        }

    }

    public function getSalonById($id){
        try{
            $sql = "SELECT * FROM salones WHERE id_salon=$id";
            $stm = $this->cnx->prepare($sql);
            $stm->execute();
            return $stm->fetch();
        }catch(Exception $e){
            $e->getMessage();
        }
    }
        
    

}