<?php

echo "<pre>".print_r($_GET, true)."</pre>"; // DEBUG

// ajouter le code de gestion de ce formulaire

?>



<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajout d'un client</title>
  <style>
    body                                         { width: 80%; margin: 50px auto; }
    input, select, textarea                      { display: block; width: 200px; margin: 10px; }
    input[type="radio"], input[type="checkbox"]  { display: inline-block; width: 20px; }
    label, input, select, textarea               { line-height: 24px; }  
  </style>
</head>
<body>
  <h2>Ajout d'une client</h2>

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
    
    <br>
    <label>Nom :</label>
    <input type="text" name="nom" value="">
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="">

    <br>
    <label>Téléphone :</label>
    <input type="text" name="telephone" value="">

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>