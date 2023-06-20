<?php
require_once 'db.php';
abstract class Conection{
    protected $cnx;

    public function __construct()
    {
        $this->cnx =  new PDO(DB_TYPE.":host=".DB_HOST .";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}


