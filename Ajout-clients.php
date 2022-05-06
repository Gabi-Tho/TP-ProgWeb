<?php

echo "<pre>".print_r($_POST, true)."</pre>"; // DEBUG

// ajouter le code de gestion de ce formulaire

$nom     = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$naissance     = $_POST["naissance"] ?? "";
$telephone     = $_POST["telephone"] ?? "";
$messageAjout = "Ajout effectué dans la base de données";
$errorNom = "au moins deux characteres";
$errorPrenom = "au moins deux characteres";
$errorNaissance = "doit etre majeur";
$errorTelephone = "format incorrecte. Doit etre 123-123-1234";

?>

<?php
  if(strlen($nom) == mb_strlen($nom)){
    echo $errorNom;
      }else{
        $errorNom = " ";
      }
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
    span { color:red; text-align: right; display: block;}
  </style>
</head>
<body>
  <h2>Ajout d'une client</h2>

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    
    <br>
    <label>Nom :</label>
    <input type="text" name="nom" value=" ">
    <span>&nbsp;<?= $errorNom ?></span>
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">
    <span>&nbsp;<?= $errorNom ?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="aaaa-mm-jj">
    <span>&nbsp;<?= $errorNom ?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="123-123-1234">
    <span>&nbsp;<?= $errorNom ?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>