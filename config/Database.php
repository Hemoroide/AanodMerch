<?php

class Database {

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_name, $db_host='localhot', $db_user ='admin', $db_pass='admin')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }
        
    private function getPDO() {
        $pdo = new PDO('mysql:dbname=aanod; host=localhost', 'admin', 'admin');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = pdo;
        return $pdo;
    }

    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    
}