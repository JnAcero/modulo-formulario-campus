<?php

require_once("../config/Conection.php");

class Trainer extends Conection{
    private $id_persona;
    private $tipo_id;
    private $fecha_nacimineto;
    private $picture;
    private $names;
    private $lastnames;
    private $direccion;
    private $email;
    private $telefono;
    private $city;
    private $rol;
    private $eps;
    private $name_contacto;
    private $telefono_contacto;
    private $arl;

    public function __construct($id_persona="", $tipo_id="", $fecha_nacimineto="", $picture="", $names="", $lastnames="", $email="",$direccion="",$telefono="", $city="", $rol="", $eps="",$name_contacto="",$telefono_contacto="", $arl="",$cnx=""){
       $this->id_persona=$id_persona;
       $this->tipo_id=$tipo_id;
       $this->fecha_nacimineto=$fecha_nacimineto;
       $this->picture=$picture;
       $this->names=$names;
       $this->lastnames=$lastnames;
       $this->email=$email;
       $this->direccion=$direccion;
       $this->telefono=$telefono;
       $this->city=$city;
       $this->rol=$rol;
       $this->eps=$eps;
       $this->name_contacto=$name_contacto;
       $this->telefono_contacto=$telefono_contacto;
       $this->arl=$arl;

       parent::__construct($cnx);
    }
    public function setId_persona($id_persona){
        $this->id_persona =$id_persona;
    }
    public function setTipo_id($tipo_id){
        $this->tipo_id =$tipo_id;
    }
    public function setFecha_nacimineto($fecha_nacimineto){
        $this->fecha_nacimineto =$fecha_nacimineto;
    }
    public function setPicture($picture){
        $this->picture =$picture;
    }
    public function setNames($names){
        $this->names =$names;
    }
    public function setLastnames($lastnames){
        $this->lastnames =$lastnames;
    }
    public function setEmail($email){
        $this->email =$email;
    }
    public function SetDireccion($direccion){
        $this->direccion =$direccion;
    }
    public function setTelefono($telefono){
        $this->telefono =$telefono;
    }
    public function setCity($city){
        $this->city =$city;
    }
    public function setRol($rol){
        $this->rol =$rol;
    }
    public function setEps($eps){
        $this->eps =$eps;
    }
    public function setName_contacto($name_contacto){
        $this->name_contacto =$name_contacto;
    }
    public function setTelefono_contacto($telefono_contacto){
        $this->telefono_contacto =$telefono_contacto;
    }
    public function setArl($arl){
        $this->arl =$arl;
    }

    public function insertTablaTrainer(){
        try {
            $sql = "INSERT INTO trainer(id_persona,id_arl) VALUES(?,?)";
            $stm = $this->cnx->prepare($sql);
            $stm->execute([$this->id_persona, $this->arl]);
        } catch (Exception $e) {
            $e->getMessage();
        }
       
    }

    public function insertTablaPersona(){
       
        try {
            $sql ="INSERT INTO personas(id_persona,tipo_id, foto_persona, persona_nombre, persona_apellido, fecha_nacimiento, email, telefono, id_ciudad, id_eps, id_rol,direccion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";   
         $stm = $this->cnx->prepare($sql);
        $stm->execute([$this->id_persona, $this->tipo_id, $this->picture, $this->names,$this->lastnames,$this->fecha_nacimineto, $this->email, $this->telefono, $this->city,$this->eps,$this->rol,$this->direccion]);
     
        } catch (Exception $e) {
            $e->getMessage();
        }
        
    }
   
}
