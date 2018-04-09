<?php

require 'DatabaseQuery.php';

if (isset($_POST['ajoutItem'])) {
  $ajoutItem = $_POST['ajoutItem'];
}

if (isset($_POST['ajoutQuantiteItem'])) {
  $ajoutQuantiteItem = $_POST['ajoutQuantiteItem'];
}

if (isset($_POST['modifQuantiteItem'])) {
  $modifQuantiteItem = $_POST['modifQuantiteItem'];
}

if (isset($_POST['modifItem'])) {
  $modifItem = $_POST['modifItem'];
}

if (isset($ajoutItem) && isset($ajoutQuantiteItem)) {

  DatabaseQuery::ajoutItemMerch($ajoutItem, $ajoutQuantiteItem);

}

if (isset($modifQuantiteItem) && isset($modifItem)) {

  DatabaseQuery::modifQuantiteMerch($modifQuantiteItem, $modifItem);

}

if (isset($_GET['id'])) {

  $idItem = $_GET['id'];
  DatabaseQuery::supprimerItemMerch($idItem);

}

$merch = DatabaseQuery::afficherMerch();

?>

<doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AANOD ADMIN</title>

  <link rel="stylesheet" href="..\css\AanodMerch.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <link rel="stylesheet" href="..\vendor\materialize.css">
  
   
</head>
  
<nav> 

  <div class="nav-wrapper">

    <a href="AanodAdmin.php" class="brand-logo"><img src="..\image\aanod_logo-black.png"></a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">

      <a href="./AanodToolbox.php" class="waves-effect waves-light btn blue darken-4">Toolbox</a>
      <a href="./AanodMerch.php" class="waves-effect waves-light btn blue darken-4">Merch</a>
      
    </ul> 

  </div>

</nav>

<body>

  <h3>LISTE DU MERCH</h3>

<div class="container">
  <div class="row">

    <table class="centered stripe hover" id="datatableMerch">
      <thead>
      <tr>
       
        <th>ITEM</td>
        <th>QUANTITE</th>
        <th>SUPPRIMER</th>

      </tr>
      </thead>
           
        <?php

        // BOUCLE POUR RECUPERER LES ITEMS ET LES QUANITIE DE LA BDD "MERCH" ET LES AJOUTER DANS LA TABLE  //

        foreach ($merch as $value) {

          echo '<tr><td>' . $value->item . '</td>';
          echo '<td>' . $value->quantite . '</td>';
          echo '<td><a href ="AanodMerch.php?id=' . $value->id . '"><button>X</input></td></tr>';

        }

        ?>

  </table>

  </div>

  </div>

<h3>AJOUT OU MODIF DU MERCH</h3>

<div class="row">

  <div class="col s6">

    <h5> AJOUTER UN ITEM </h5>

    <form  method="post" action="AanodMerch.php">

      <!-- AJOUT D'UN ITEM DANS LA BDD -->

      Ajouter un item : <input name='ajoutItem' class="text" placeholder="Nom de l'item" id='ajoutItem' required><br>
      Quantité : <input name='ajoutQuantiteItem' type="number" placeholder="Quantité" id= 'ajoutQuantiteItem' required>
      <input type="submit" value="Valider">
      
    </form>

  </div>

  <div class="col s6">
  
  <h5> MODIFIER QUANTITE D'UN ITEM </h5>

    <form method="post" action="AanodMerch.php">

    <!-- UPDATE DE LA BDD -->
      
      Modifier un item : <input class="text" name='modifItem' placeholder="Nom de l'item" id="modifItem" required><br>
      Nouvelle quantité : <input type="number" name='modifQuantiteItem' placeholder="Quantité" id="modifQuantiteItem" required>
      <input type="submit" value="Valider"><br>

    </form>
  
  </div>

  </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../js/aanod.js"></script>

</html>