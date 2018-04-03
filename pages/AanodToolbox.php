
<doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AANOD ADMIN</title>

  <link rel="stylesheet" href="..\vendor\materialize.css">
  <link rel="stylesheet" href="..\css\AanodMerch.css">

  </head>

<header> 

<div class="container">
  <div class="row">
    <div class="col s12"><p class="text-center"><h1>AANOD</h1></p></div>
  </div>
</div>
  
</header>

<body>

<div class="container">
  <div class="row">
    <div class="col s6"><h3><a href="AanodMerch.php">MERCH</a></h3></div>
    
    <div class="col s6"><h3><a href="AanodToolbox.php">TOOLBOX</a></h3></div>
  </div>
</div>

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

                  echo '<li><a href="../file/drum/' . $fichierLyrics . '">' . $fichierLyrics . '</a></li>';

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

  <div class="row">
    
    <div class= "col s4">
 
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