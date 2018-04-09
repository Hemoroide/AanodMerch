
<doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AANOD ADMIN</title>

  <link rel="stylesheet" href="..\vendor\materialize.css">
  <link rel="stylesheet" href="..\css\AanodMerch.css">

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

  <table class="centered">
        <thead>
          <tr>
              <th>DRUMS</th>
              <th>LYRICS</th>
              <th>MP3</th>
          </tr>
        </thead>

        <tbody>

          <tr>

            <td>
            
            <?php 

            /*  LECTURE DES DOSSIER POUR AFFICHER LES FICHIER
                LIEN POUR POUVROIS LES TELECHARGER */

            if ($dossierDrum = opendir('../file/drum/')) {

              while (false !== ($fichierDrum = readdir($dossierDrum))) {

                if (($fichierDrum != '.') && ($fichierDrum != '..')) {

                  echo '<li><a href="../file/drum/' . $fichierDrum . '">' . $fichierDrum . '</a></li>';

                }

              }
              closedir($dossierDrum);
            }

            ?>
                        
            </td>
            <td>
            
            <?php 

            if ($dossierLyrics = opendir('../file/lyrics/')) {

              while (false !== ($fichierLyrics = readdir($dossierLyrics))) {

                if (($fichierLyrics != '.') && ($fichierLyrics != '..')) {

                  echo '<li><a href="../file/lyrics/' . $fichierLyrics . '">' . $fichierLyrics . '</a></li>';

                }

              }
              closedir($dossierLyrics);
            }

            ?>
            
            </td>

            <td>
            
          <?php

          if ($dossierMp3 = opendir('../file/mp3/')) {

            while (false !== ($fichierMp3 = readdir($dossierMp3))) {

              if (($fichierMp3 != '.') && ($fichierMp3 != '..')) {

                echo '<li><a href="../file/mp3/' . $fichierMp3 . '">' . $fichierMp3 . '</a></li>';

              }

            }
            closedir($dossierMp3);
          }

          ?>    

          </td>
        </tr>
      </tbody>
    </table>

    <!-- SECTION D'UPLOAD DE FICHIER -->

  <div class="row">
    
    <div class= "col s4 ">
 
      <form enctype="multipart/form-data" action="fileUploadDrum.php" method="post">

        <input type="hidden" name="MAX_FILE_SIZE" />
        Ajouter un fichier drum : <br>
        <input type="file" name="monfichier" /><br>
        <input type="submit"/>

      </form>

    </div>

    <div class="col s4">

      <form enctype="multipart/form-data" action="fileUploadLyrics.php" method="post">

          <input type="hidden" name="MAX_FILE_SIZE" />
          Ajouter un fichier lyrics : <br>
          <input type="file" name="monfichier" /><br>
          <input type="submit"/>

      </form>

    </div>

    <div class="col s4">

      <form enctype="multipart/form-data" action="fileUploadmp3.php" method="post">

        <input type="hidden" name="MAX_FILE_SIZE" />
          Ajouter un fichier mp3 : <br>
          <input type="file" name="monfichier" /><br>
          <input type="submit"/>

      </form>

    </div>

  </div>

</body>