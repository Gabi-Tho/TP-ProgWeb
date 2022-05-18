<?php
require "clients.php";

$nom     = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$naissance     = $_POST["naissance"] ?? "";
$telephone     = $_POST["telephone"] ?? "";

$id = $_GET['id'] ?? "";




$erreurDateFormat = "";
$errorLength = "";
$messageNaissance = "";
$erreurDateFormat = "";
$msgTelephone = "";
$messageTelephone = " ";
$messageTelephone2 = "";
$errorNaissance = 0;
$errorTelephone = 0;
$errorNom = 0;
$errorPrenom = 0;
$messagePrenom = " ";
$errorNom2 = 0;
$errorPrenom2 = 0;
$checkdate = 0;
$messageDate = "";
$messageNom = " ";


?>

<?php

foreach ($clients as $client)  {
  if ($client["id"] == $id) {
    $nom           = $client['nom'];
    $prenom        = $client['prenom'];
    $naissance    = $client['dateNaissance'];
    $telephone    = $client['tel']; 
  }
}

if(count($_POST) > 0){

  for($i = 0; $i < strlen($nom); $i++){
    $c = $nom[$i];
    if($c == "!" || $c == "#" || $c == "$" || $c == "%" || $c == "&" || $c == "*" || $c ==  "+" || $c == "-" || $c == ":" || $c == ";" || $c == "=" || $c == " " ){
      $messageNom = "pas de characteres speciaux";
      $errorNom2 = 1;
    }
  }

for ($i = 0; $i < strlen($nom); $i++){
  $c = $nom[$i];
  if($c >= "A" && $c <= "Z" || $c >= "a" &&  $c <= "z" ){
      $errorNom = 0;
  }

}



  if(mb_strlen($nom) <= 2){
    $errorNom = 1;
    $messageNom = "plus que deux characteres";
  }else{
    $errorNom = 0;
  }
  
  $accents="çéâêîôûàèìòùëï";
  if(strpbrk($nom,$accents)){  
      $errorNom = 0;
  }


  for ($i = 0; $i < strlen($nom); $i++){
    $c = $nom[$i];
    if($c >= "0" && $c <= "9"){
        $errorNom = 1;
        $messageNom = "pas de characteres speciaux";
    }
  
  }
  
  //code for prenom

  for($i = 0; $i < strlen($prenom); $i++){
    $c = $prenom[$i];
    if($c == "!" || $c == "#" || $c == "$" || $c == "%" || $c == "&" || $c == "*" || $c ==  "+" || $c == "-" || $c == ":" || $c == ";" || $c == "=" || $c == " " ){
      $messagePrenom = "pas de characteres speciaux";
      $errorPrenom2 = 1;
    }
  }

  for ($i = 0; $i < strlen($prenom); $i++){
    $c = $prenom[$i];
    if($c >= "A" && $c <= "Z" || $c >= "a" &&  $c <= "z" ){
        $errorPrenom = 0;
    }
  
  }
  
  
    if(mb_strlen($prenom) <= 2){
      $errorPrenom = 1;
      $messagePrenom = "plus que 2 characteres";
    }else{
      $errorPrenom = 0;
    }
    
    $accents="çéâêîôûàèìòùëï";
    if(strpbrk($prenom,$accents)){  
        $errorPrenom = 0;
    }

    for ($i = 0; $i < strlen($prenom); $i++){
      $c = $prenom[$i];
      if($c >= "0" && $c <= "9"){
          $errorPrenom = 1;
          $messagePrenom = "pas de characteres speciaux";
      }
    
    }
    
  
  
  $naissance = str_replace("-", " ", $naissance);

  if(strlen($naissance) == 10){

  }else{
    $errorNaissance = 1;
    $messageDate = "mauvais format";
  }
  
  date_default_timezone_set("America/Toronto");
  
  $annee = substr($naissance,0,4)." ";
  $mois = substr($naissance,5,2)." ";
  $jour = substr($naissance,8,2)." ";
  
  $annee = intval($annee);
  $mois = intval($mois);
  $jour = intval($jour);
  
  
  if (checkdate($mois,$jour,$annee) == true){

  }elseif(checkdate($mois,$jour,$annee) == false){
    $checkdate = 1;
    $messageDate = "mauvais format";
  }
  
  $anneePresent = date("Y");  
  $moisPresent = date("n"); 
  $jourPresent = date("d");


  if($annee == 2004 && $mois == $moisPresent && $jour > $jourPresent){
    $errorNaissance = 1;
    $messageNaissance = "doit etre majeur";
  }elseif($annee == 2004 && $mois > $moisPresent){
    $messageNaissance = "doit etre majeur";
    $errorNaissance = 1;
  }elseif($annee > 2004){
    $messageNaissance = "doit etre majeur";
    $errorNaissance = 1;
  }

  if($annee == 1922 && $mois == $moisPresent && $jour > $jourPresent){
    $errorNaissance = 1;
    $messageNaissance = "plus que 100 ans";
  }elseif($annee == 1922 && $mois > $moisPresent){
    $messageNaissance = "plus que 100 ans";
    $errorNaissance = 1;
  }elseif($annee < 1922){
    $messageNaissance = "plus que 100 ans";
    $errorNaissance = 1;
  }




  //code for telephone


  if(strlen($telephone) == 12){
    $messageTelephone = " ";
  }else{
    $errorTelephone = 1;
    $msgTelephone = "mauvais format";

  }
  
  
  //check proper spacing
  if (substr($telephone,3,1) == " "){
    $messageTelephone = " ";

    
  }else{
    $errorTelephone = 1;
    $messageTelephone2 = "mauvais format";

  }


  //check proper "-"
  if (substr($telephone,7,1) == "-"){
    $messageTelephone = " ";
    
  }else{
    $errorTelephone = 1;
    $msgTelephone = "mauvais format";


  }
  
  // check proper number sequence
  
  if (is_numeric(substr($telephone,0,3))){
    $messageTelephone = " ";
  }else{
    $errorTelephone = 1;
    $msgTelephone = "mauvais format";

  }

  if (is_numeric(substr($telephone,4,3))){
    $messageTelephone = " ";

  }else{
    $errorTelephone = 1;
    $msgTelephone = "mauvais format";

  }


  if (is_numeric(substr($telephone,8,4))){
    $messageTelephone = " ";


  }else{
    $errorTelephone = 1;
    $msgTelephone = "mauvais format";
  } 



  if($errorTelephone == 0 && $errorNaissance == 0  && $errorNom == 0 && $errorNom2 == 0 && $errorPrenom == 0 && $checkdate == 0){?>
    <h1>Votre ajout a été affectuer</h1>
    <?php
    exit();
  }


}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>modifications</title>
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
    
    <input type="text" name="nom" value="<?=$nom?>">
    <span>&nbsp;<?= $messageNom?></span>
    
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="<?=$prenom?>">
    <span>&nbsp;<?= $messagePrenom?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="<?=$naissance?>" placeholder="aaaa-mm-jj">
    <span>&nbsp;<?= $messageNaissance."<br>".$messageDate?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="<?=$telephone?>" placeholder=<?= $telephone?>>
    <span>&nbsp;<?=$msgTelephone.$messageTelephone.$messageTelephone2?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>




