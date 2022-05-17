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
$messageNaissance = "";
$erreurDateFormat = "";
$messageTelephone = "";
$errorNaissance = 0;
$errorTelephone = 0;
$errorNom = 0;
$errorPrenom = 0;





?>

<?php



if(count($_POST) > 0){

  
//code for nom and prenom is correct




for ($i = 0; $i < strlen($nom); $i++){
  $c = $nom[$i];
  if($c >= "A" && $c <= "Z" || $c >= "a" &&  $c <= "z" ){
      echo "YOU HAVE AN UPPERCASES and possibly a lowercase";
      $errorNom = 0;
  }

}


  if(mb_strlen($nom) <= 2){
    echo "you need more characters";
    $errorNom = 1;
  }else{
    echo "woohoo your name is long duude";
    $errorNom = 0;
  }
  
  $accents="çéâêîôûàèìòùëï";
  if(strpbrk($nom,$accents)){  
      echo "you have fancy accents";
      $errorNom = 0;
  }


  for ($i = 0; $i < strlen($nom); $i++){
    $c = $nom[$i];
    if($c >= "0" && $c <= "9"){
        echo "YOU HAVE AN UPPERCASES and possibly a lowercase";
        $errorNom = 1;
    }
  
  }
  
  
  $naissance = str_replace("-", " ", $naissance);
  
  date_default_timezone_set("America/Toronto");
  
  $annee = substr($naissance,0,4)." ";
  $mois = substr($naissance,5,2)." ";
  $jour = substr($naissance,8,2)." ";
  
  $annee = intval($annee);
  $mois = intval($mois);
  $jour = intval($jour);
  
  
  if (checkdate($mois,$jour,$annee)){
    echo "correct format for date";

  }elseif(checkdate($mois,$jour,$annee) == false){
    $erreurDateFormat = 1;
  }
  
  $anneePresent = date("Y");  
  $moisPresent = date("n"); 
  $jourPresent = date("d");
  
  
  if($annee == 2004 && $mois == $moisPresent && $jour == $jourPresent){
    echo "birthday is today!!!"."<br>";


  }elseif(substr($naissance,0,4) == 2004 && $mois <= $moisPresent && $jour <= $jourPresent){

    echo "you are barely old today"."<br>";


  }elseif(substr($naissance,0,4) < 2004){

    echo "you are old"."<br>";


  }elseif(substr($naissance,0,4) > 2004){
    $errorNaissance = 1;
    echo "you are not old enough"."<br>";
    $messageNaissance = "doit etre majeur";

  }
  

  


  //code for telephone


  if(strlen($telephone) == 12){
    echo "correct number of strings"."<br>";
    $messageTelephone = " ";
  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";

  }
  
  
  //check proper spacing
  if (substr($telephone,3,1) == " "){
    echo "space correct"."<br>";
    $messageTelephone = " ";

    
  }else{
    $errorTelephone = 1;
    echo "space not in the right place";
    $messageTelephone = "mauvais format";

  }


  //check proper "-"
  if (substr($telephone,7,1) == "-"){
    $messageTelephone = " ";
    
  }else{
    $errorTelephone = 1;
    echo "dash not in the right place"."<br>";
    $messageTelephone = "mauvais format";


  }
  
  // check proper number sequence
  
  if (is_numeric(substr($telephone,0,3))){
    $messageTelephone = " ";
  }else{
    $errorTelephone = 1;
    echo "not numeric"."<br>";
    $messageTelephone = "mauvais format";

  }

  if (is_numeric(substr($telephone,4,3))){
    $messageTelephone = " ";

  }else{
    $errorTelephone = 1;
    echo "not numeric"."<br>";
    $messageTelephone = "mauvais format";

  }


  if (is_numeric(substr($telephone,8,4))){
    $messageTelephone = " ";


  }else{
    $errorTelephone = 1;
    echo "not numeric"."<br>";
    $messageTelephone = "mauvais format";
  } 

  if ($errorTelephone == 1 && $errorNaissance == 1){
    $messageTelephone = "mauvais format";
    $messageNaissance = "doit etre majeur";

  }

  if($errorTelephone == 0 && $errorNaissance == 0 && $errorNom == 0 ){
    exit("GABI YOU ARE INCREDIBLE");
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
    <span>&nbsp;<?= $errorNom?></span>
    
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">
    <span>&nbsp;<?=  $errorChar?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="" placeholder="aaaa-mm-jj">
    <span>&nbsp;<?= $messageNaissance?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="" placeholder=<?= $telephone?>>
    <span>&nbsp;<?=$messageTelephone?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>
