<?php

 

// ajouter le code de gestion de ce formulaire

$nom     = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$naissance     = $_POST["naissance"] ?? "";
$telephone     = $_POST["telephone"] ?? "";
$messageAjout = "Ajout effectué dans la base de données";
$errorChar = "";
$erreurDateFormat = "";
$errorLength = "";
$errorNaissance = "";
$errorTelephone = ""; //format incorrecte. Doit etre 123 123-1234
$erreurDateFormat = "";




?>

<?php

//code for nom and prenom is correct

if(count($_POST) > 0){

  $teleExit = false;

  if(strlen($nom) == mb_strlen($nom)){
    $errorChar = "au moins quelques characteres speciale";
    $name = false;
  }else {
    $errorChar = " ";
    $name = true;
  }
  
  if (mb_strlen($nom) <= 2 ){
    $errorChar = "au moins quelques characteres speciale";
    $name = false;
  }else{
    $errorChar = " ";
    $name = true;
  }
  
  
  
  $naissance = str_replace("-", " ", $naissance);
  
  date_default_timezone_set("America/Toronto");
  
  $annee = substr($naissance,0,4)." ";
  $mois = substr($naissance,5,2)." ";
  $jour = substr($naissance,8,2)." ";
  
  $annee = intval($annee);
  $mois = intval($mois);
  $jour = intval($mois);
  
  
  if (checkdate($mois,$jour,$annee)){
    $erreurDateFormat = "";
    $date = false;
  }elseif(checkdate($mois,$jour,$annee) == false){
    $erreurDateFormat = "wrong format";
    $date = true;
  }
  
  $anneePresent = date("Y")." ";  
  $moisPresent = date("m")." "; 
  $jourPresent = date("d");
  
  
  if(substr($naissance,0,4) == 2004 && $mois == $moisPresent && $jour == $jourPresent){
    $errorNaissance = " ";
    $date = false;
  }elseif(substr($naissance,0,4) == 2004 && $mois <= $moisPresent && $jour <= $jourPresent){
    $errorNaissance = " ";
    $date = false;
  }elseif(substr($naissance,0,4) < 2004){
    $errorNaissance = " ";
    $date = false;
  }elseif(substr($naissance,0,4) > 2004){
    $errorNaissance = "doit etre majeur";
    $date = true;
  }
  
    
  //code for telephone
  if (mb_strlen($telephone) == 12){
    $errorTelephone = " ";
  }else{
    $errorTelephone = "mauvais format";
  }
  
  //check proper spacing
  if (substr($telephone,3,1) == " "){
    $errorTelephone1 = " ";
  }else{
    $errorTelephone1 = "mauvais format";
    $teleExit == false;
  }
  //check proper "-"
  if (substr($telephone,7,1) == "-"){
    $errorTelephone2 = " ";
  }else{
    $errorTelephone2 = "mauvais format";
    $teleExit = false;
  }
  
  // check proper number sequence
  
  if (is_numeric(substr($telephone,0,3))){
    $errorTelephone = " ";
    $teleExit = true;

  }else{
    $errorTelephone = "mauvais format";
    $teleExit = false;
  }
  if (is_numeric(substr($telephone,4,3))){
    $errorTelephone = " ";
    $teleExit = true;

  }else{
    $errorTelephone = "mauvais format";
    $teleExit = false;

  }
  if (is_numeric(substr($telephone,4,3))){
    $errorTelephone = " ";
    $teleExit = true;

  }else{
    $errorTelephone = "mauvais format";
    $teleExit = false;

  }
  if (is_numeric(substr($telephone,8,4))){
    $errorTelephone = " ";
    $teleExit = true;
  }else{
    $errorTelephone = "mauvais format";
    $teleExit = false;
  } 
  if($teleExit === true){
    exit("new user has been added");

  }
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

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post"  >
    
    <br>
    <label>Nom :</label>
    
    <input type="text" name="nom" value="">
    <span>&nbsp;<?= $errorChar?></span>
    
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">
    <span>&nbsp;<?=  $errorChar?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="" placeholder="aaaa-mm-jj">
    <span>&nbsp;<?= $errorNaissance."<br>".$erreurDateFormat;?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="" placeholder="123 -1234">
    <span>&nbsp;<?= $errorTelephone?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>
