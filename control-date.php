<?php

function calculerAge ( $anneeNaissance, $moisNaissance, $jourNaissance ) {
    $anneeEnCours = date ("Y");
    $moisEnCours = date ("n");
    $jourEnCours = date ("j");
    $age = $anneeEnCours - $anneeNaissance ;
    if ($moisEnCours < $moisNaissance) {
        $age = $age - 1;
    }
}
function valideDate ($annee, $mois, $jour)
$nbJoursMois = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ] ;
$anneeMini = 1900;

if (is_int($annee) === false || $annee < $anneeMini ) {
    return false;
}

if (is_int($mois) === false || $mois < 1 || $mois >12) {
    return false;
}

if ($annee %4 === 0 && ($annee%100 > 0 || $annee%400 === 0)) {
    $nbJoursMois[1] =29;
}

if (is_int($jour) || $jour < 1 || $jour < $nbJoursMois[ $mois] ) {
    return false;
}
return false;
}