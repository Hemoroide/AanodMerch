<?php

    class DatabaseQuery {

    public static function afficherMerch() {
        
        $db = new PDO('mysql:host=localhost; dbname=aanod', 'admin', 'admin');
        $req = $db->query('SELECT * FROM aanod_merch');
        $merch= $req->fetchAll(PDO::FETCH_OBJ);
        
        return $merch;

    }

    public static function ajoutItemMerch($ajoutItem, $ajoutQuantiteItem) {

        $db = new PDO('mysql:host=localhost; dbname=aanod', 'admin', 'admin');
        $req = $db->prepare('INSERT INTO aanod_merch (item, quantite) values (:item, :quantite)');
        $req->bindParam(':item', $ajoutItem, PDO::PARAM_STR);
        $req->bindParam(':quantite', $ajoutQuantiteItem, PDO::PARAM_STR);
        $merch = $req->execute();
        $req->closeCursor();

    }

    public static function modifQuantiteMerch($modifQuantiteItem, $modifItem) {

        $db = new PDO('mysql:host=localhost; dbname=aanod', 'admin', 'admin');
        $req = $db->prepare('UPDATE aanod_merch SET quantite=:quantite WHERE item=:item');
        $req->bindParam(':quantite', $modifQuantiteItem, PDO::PARAM_STR);
        $req->bindParam(':item', $modifItem, PDO::PARAM_STR);
        $merch= $req->execute();
        $req->closeCursor();

    }

    public static function supprimerItemMerch($idItem) {

        $db = new PDO('mysql:host=localhost; dbname=aanod', 'admin', 'admin');
        $req = $db->prepare('DELETE FROM aanod_merch WHERE id=:idItem');
        $req->bindParam(':idItem', $idItem, PDO::PARAM_STR);
        $merch= $req->execute();
        $req->closeCursor();

    }


}