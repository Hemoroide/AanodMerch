<?php

if (isset($_POST) && !empty($_POST) ) {
        
// TEST DE LA TAILLE

        if ($_FILES['monfichier']['size'] > 100000) {
            $error ='Le fichier est trop lourd';
        }

// TEST DE L'EXTENSION
        
        $extension=strrchr($_FILES['monfichier']['name'], '.');
        
            if (($extension != '.doc') && ($extension != '.docx')) {
                $error= 'Le type de fichier n\'est pas bon';
            }

// SI AUCUNE ERREUR
        
if (!isset($error)) {
    move_uploaded_file($_FILES['monfichier']['tmp_name'], '../file/lyrics/'.$_FILES['monfichier']['name']);
    echo "Le chargement à été effectué";
}

    }

    else {
        $error='Pas de fichier à charger';
    }

if (isset($error)) {
    echo $error;
}