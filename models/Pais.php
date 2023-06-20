<?php
require_once("../config/Conection.php");
class Pais extends Conection{
    public function __construct($cnx=""){
        parent::__construct($cnx);
    }
    public function getPaises(){
        $sql = "SELECT * FROM ciudad";
        $stm= $this->cnx->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}