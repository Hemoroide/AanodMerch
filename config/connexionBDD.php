<?php

include 'config.php';

class connexionBDD {

public static function connecterBDD() {

global $db;

try {
   $db = new PDO('mysql:host=' . $host . ';dbname=' . $db . ',charset=utf8', $login, $password);
} catch (Exception $e) {
    die("Un problême est survenue lors de la tentative de connexion a la base de données : " . $e->getMessage());
}

}

}
