<?php
require "clients.php";

$nom     = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$naissance     = $_POST["naissance"] ?? "";
$telephone     = $_POST["telephone"] ?? "";
$erreurDateFormat = "";
$errorLength = "";
$messageNaissance = "";
$erreurDateFormat = "";
$messageTelephone = "";
$errorNaissance = 0;
$errorTelephone = 0;
$errorNom = 0;
$errorPrenom = 0;
$messageNom = " ";
$errorNom2 = 0;
$errorPrenom2 = 0;
$checkdate = 0;

?>

<?php



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
    }
  
  }
  
  //code for prenom

  for($i = 0; $i < strlen($prenom); $i++){
    $c = $prenom[$i];
    if($c == "!" || $c == "#" || $c == "$" || $c == "%" || $c == "&" || $c == "*" || $c ==  "+" || $c == "-" || $c == ":" || $c == ";" || $c == "=" || $c == " " ){
      $messageNom = "pas de characteres speciaux";
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
      }
    
    }
    
  
  
  $naissance = str_replace("-", " ", $naissance);

  if(strlen($naissance) == 10){

  }else{
    echo "birthinput is too long";
    $errorNom = 1;
  }
  
  date_default_timezone_set("America/Toronto");
  
  $annee = substr($naissance,0,4)." ";
  $mois = substr($naissance,5,2)." ";
  $jour = substr($naissance,8,2)." ";
  
  $annee = intval($annee);
  $mois = intval($mois);
  $jour = intval($jour);
  
  
  if (checkdate($mois,$jour,$annee)){

  }elseif(checkdate($mois,$jour,$annee) == false){
    $checkdate = 1;
    echo "date is false";
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
    $messageTelephone = "mauvais format";

  }
  
  
  //check proper spacing
  if (substr($telephone,3,1) == " "){
    $messageTelephone = " ";

    
  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";

  }


  //check proper "-"
  if (substr($telephone,7,1) == "-"){
    $messageTelephone = " ";
    
  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";


  }
  
  // check proper number sequence
  
  if (is_numeric(substr($telephone,0,3))){
    $messageTelephone = " ";
  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";

  }

  if (is_numeric(substr($telephone,4,3))){
    $messageTelephone = " ";

  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";

  }


  if (is_numeric(substr($telephone,8,4))){
    $messageTelephone = " ";


  }else{
    $errorTelephone = 1;
    $messageTelephone = "mauvais format";
  } 

  if ($errorTelephone == 1 && $errorNaissance == 1){
    $messageTelephone = "mauvais format";
    $messageNaissance = "doit etre majeur";

  }

  if($errorTelephone == 0 && $errorNaissance == 0  && $errorNom == 0 && $errorNom2 == 0 && $errorPrenom == 0 && $checkdate == 0){?>
    <h1>woooo</h1>
    <?php
    exit("GABI YOU ARE INCREDIBLE");
  }


}

?>