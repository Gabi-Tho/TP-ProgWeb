<?php
require "clients.php";

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
    span { color:red; text-align: left; display: block;}
  </style>
</head>
<body>
  
  <h2>Modifications</h2>

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post"  >
    
    <br>
    <label>Nom :</label>
    
    <input type="text" name="nom" value="">
    <span>&nbsp;<?= $errorNom.$messageNom.$errorNom2?></span>
    
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">
    <span>&nbsp;<?= $errorPrenom.$errorPrenom2?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="" placeholder="aaaa-mm-jj">
    <span>&nbsp;<?= $messageNaissance.$errorNaissance.$checkdate?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="" placeholder=<?= $telephone?>>
    <span>&nbsp;<?=$messageTelephone.$errorTelephone?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>
