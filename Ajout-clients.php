<?php

echo "<pre>".print_r($_POST, true)."</pre>"; // DEBUG

// ajouter le code de gestion de ce formulaire

$nom     = $_POST["nom"] ?? "";
$prenom     = $_POST["prenom"] ?? "";
$naissance     = $_POST["naissance"] ?? "";
$telephone     = $_POST["telephone"] ?? "";
$messageAjout = "Ajout effectué dans la base de données";
$errorChar = "";
$erreurDateFormat = " ";
$errorLength = "";
$errorNaissance = "";
$errorTelephone = ""; //format incorrecte. Doit etre 123 123-1234


?>

<?php

//code for nom and prenom is correct
if(strlen($nom) == mb_strlen($nom)){
  $errorChar = "au moins quelques characteres speciale";
}else {
  $errorChar = " ";
}

if (mb_strlen($nom) <= 2 ){
  $errorLength = "au moins quelques characteres speciale";
}else{
  $errorLength = " ";
}



$naissance = str_replace("-", " ", $naissance);

date_default_timezone_set("America/Toronto");

echo $annee = substr($naissance,0,4)." ";
echo $mois = substr($naissance,5,2)." ";
echo $jour = substr($naissance,8,2)." ";

$annee = intval($annee);
$mois = intval($mois);
$jour = intval($mois);

if (checkdate($mois,$jour,$annee)){
  $erreurDateFormat = " ";
}else{
  $erreurDateFormat = "doit avoir le bon format";
}

echo $anneePresent = date("Y")." ";  
echo $moisPresent = date("m")." "; 
echo $jourPresent = date("d");


if(substr($naissance,0,4) == 2004 && $mois == $moisPresent && $jour == $jourPresent){
  $errorNaissance = " ";
}elseif(substr($naissance,0,4) == 2004 && $mois <= $moisPresent && $jour <= $jourPresent){
  $errorNaissance = " ";
}elseif(substr($naissance,0,4) < 2004){
  $errorNaissance = " ";
}elseif(substr($naissance,0,4) > 2004){
  $errorNaissance = "doit etre majeur";
}

  
//code for telephone number
// for ($i = 0; $i <= 11 ; $i++){
//     $c = $telephone[$i];
//     if($c >= "0" && $c <= "9"){
//       $tel = true;
//       $errorTelephone = " ";
//         }
// }
//     $c = $telephone[$i];
//     if($c >= "0" && $c <= "9"){
      
//     }

//     if($telephone[3] != " "){
//       $tel = false;
//     }else{
//       $errorTelephone = " ";
//     }

//     if($telephone[7] != "-"){
//       $tel = false;
//     }else{
//       $errorTelephone = " ";
//     }
  
//code for naissance 

// if(strlen($naissance) =! 9){
//   $naiss = false;
// }else{
//   $errorNaissance = " ";
// }

//$annee = substr($naissance,0,4);
//insert code for appropriate year

//$mois = substr($birth,5,2);
//insert code for appropriate month

//$jour = substr($jour,8,2);
//insert code for appropriate day


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
    <span>&nbsp;<?= $errorChar."<br>".$errorLength ?></span>
    
    
    <br>
    <label>Prenom :</label>
    <input type="text" name="prenom" value="">
    <span>&nbsp;<?=  $errorChar."<br>".$errorLength ?></span>

    <br>
    <label>Date de naissance :</label>
    <input type="text" name="naissance" value="" placeholder="aaaa-mm-jj">
    <span>&nbsp;<?= $errorNaissance."<br>".$erreurDateFormat;?></span>

    <br>
    <label>Téléphone :</label>
    <input type="tel" name="telephone" value="" placeholder="123 -1234">
    <span>&nbsp;<?= $errorTelephone."<br>"//.$errorLength?></span>

    <br>
    <input type="submit" value="Valider"> 

  </form>

</body>
</html>