<?php
require_once("../config/Conection.php");

class Eps extends Conection{

    public function __construct($cnx=""){
        parent::__construct($cnx);
    }

    public function insertEps(){
        $nombre_eps=[
        "ALIANSALUD ENTIDAD PROMOTORA DE SALUD S.A.",
        "ASOCIACIÓN INDÍGENA DEL CAUCA",
        "CAPITAL SALUD",
        "CAPRESOCA  EPS",
        "COMPENSAR   E.P.S.",
        "COOPERATIVA DE SALUD Y DESARROLLO INTEGRAL ZONA SUR ORIENTAL DE CARTAGENA",
        "E.P.S.  FAMISANAR LTDA." ,
        "E.P.S.  SANITAS S.A.",
        "EPS  CONVIDA",
        "EPS SERVICIO OCCIDENTAL DE SALUD S.A.",
        "EPS Y MEDICINA PREPAGADA SURAMERICANA S.A",
        "FUNDACIÓN SALUD MIA ",
        "NUEVA EPS S.A.",
        "PIJAOS SALUD EPSI",
        "SALUD TOTAL S.A.  E.P.S.",
        "SALUDVIDA S.A. E.P.S",
        "SAVIA SALUD EPS",
        ];
        foreach($nombre_eps as $eps){
            try{
                $stm = $this->cnx->prepare("INSERT INTO eps(eps_nombre) VALUES('$eps')");
                $stm->execute();
            }
            catch(Exception $e){
                $e->getMessage();
            }  
        }
    }
    public function getEps(){
        $sql = "SELECT * FROM eps";
        $stm= $this->cnx->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
}
