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

    $idItem=$_GET['id'];
    DatabaseQuery::supprimerItemMerch($idItem);
    var_dump($idItem);
    
}



$merch = DatabaseQuery::afficherMerch();

?>

<doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AANOD ADMIN</title>
  
  <link rel="stylesheet" href="..\vendor\bootstrap.css">
  <link rel="stylesheet" href="..\vendor\bootstrap-grid.css">
  <link rel="stylesheet" href="..\css\AanodMerch.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
  </head>

<header> 

<div class="container">
  <div class="row">
    <div class="col-12"><p class="text-center"><h1>AANOD</h1></p></div>
  </div>
</div>
  
</header>

<nav>

<div class="container">
  <div class="row">
    <div class="col-6"><h3><a href="AanodMerch.php">MERCH</a></h3></div>
    
    <div class="col-6"><h3><a href="AanodToolbox.php">TOOLBOX</a></h3></div>
  </div>
</div>

</nav>

<body>

<div class="container">
  <div class="row">

    <table class="table table-striped table-bordered" id="tableMerch">
      
      <tr>
       
        <th>ITEM</td>
        <th>QUANTITE</th>
        <th>SUPPRIMER</th>

      </tr>
           
        <?php

        foreach ($merch as $value) {
          
          echo '<tr><td>' . $value->item . '</td>';
          echo '<td>' . $value->quantite . '</td>'; 
          echo '<td><a href ="AanodMerch.php?id=' . $value->id . '"><button>X</input></td></tr>';
          
        }

        ?>

  </table>

<div class="col-6">

  <h5> AJOUTER UN ITEM </h5>

<form  method="post" action="AanodMerch.php">

  Ajouter un item : <input name='ajoutItem' class="text" placeholder="Nom de l'item" id='ajoutItem' required><br>
  Quantité : <input name='ajoutQuantiteItem' type="number" placeholder="Quantité" id= 'ajoutQuantiteItem' required>
  <input type="submit" value="Valider">
  
</form>

</div>

  <div class="col-6">
  
  <h5> MODIFIER QUANTITE D'UN ITEM </h5>

  <form method="post" action="AanodMerch.php">
    
    Modifier un item : <input class="text" name='modifItem' placeholder="Nom de l'item" id="modifItem" required><br>
    Nouvelle quantité : <input type="number" name='modifQuantiteItem' placeholder="Quantité" id="modifQuantiteItem" required>
    <input type="submit" value="Valider"><br>

  </form>
  
  </div>

  </div>

  </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="../js/aanod.js"></script>

</html>