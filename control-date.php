<?php

function calculerAge($jourNaissance, $moisNaissance, $anneeNaissance) {
  
  if (!validerDate($jourNaissance, $moisNaissance, $anneeNaissance)) {
    return false;
  }

  $anneeEnCours = (int) date("Y");
  $moisEnCours  = (int) date("n");
  $jourEnCours  = (int) date("j");

  if ($anneeEnCours < $anneeNaissance ||
      $anneeEnCours === $anneeNaissance && $moisEnCours < $moisNaissance ||
      $anneeEnCours === $anneeNaissance && $moisEnCours === $moisNaissance && $jourEnCours < $jourNaissance
     ) {
    return false;
  }

  $age = $anneeEnCours - $anneeNaissance;
  if ($moisEnCours < $moisNaissance || $moisEnCours == $moisNaissance && $jourEnCours < $jourNaissance) {
    $age--; 
  }
  return $age;
}



echo checkdate(01,14,1994);




for ($i = 0; $i < strlen($nom); $i++){
  $c = $nom[$i];
  if($c == "!" || $c == "#" || $c == "$" || $c == "%" || $c == "&" || $c == "*" || $c ==  "+" || $c == "-" || $c == ":" || $c == ";" || $c == "=" || $c == " " ){
    $errorNom = 1;
  }

for ($i = 0; $i < strlen($nom); $i++){
  $c = $nom[$i];
  if($c >= "A" && $c <= "Z" || $c >= "a" &&  $c <= "z" ){
      $errorNom = 0;
  }

}


?>
