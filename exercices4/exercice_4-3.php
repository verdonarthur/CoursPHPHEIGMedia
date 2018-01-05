<?php
/*
Créer une boucle permettant d'afficher les cartes, c'est-à-dire leur valeur, couleur et points. Exemple:
6 de coeur vaut 0 points
6 de carreau vaut 0 points
6 de trefle vaut 0 points
6 de pique vaut 0 points
7 de coeur vaut 1 points
7 de carreau vaut 1 points
7 de trefle vaut 1 points
7 de pique vaut 1 points
8 de coeur vaut 2 points
*/

$COLOR = array("coeur","carreau","trefle","pique");
$VALUE = array(6,7,8,9,10,"valet","dame","roi","as");

$cards;

for ($i=0,$j=0,$k=0,$points=0; $i<36; $i++,$points++,$k++) {
    $value;
    $color;

    //define color
    $j = $i % 9 == 0 && $i!=0 ? $j+1 : $j;
    $color = $COLOR[$j];

    //define value
    $k = $i % 9 == 0 ? 0 : $k;
    $value = $VALUE[$k];

    //define points
    $points = $points===9 ? 0 : $points;
    
    $cards[$i] = array($value,$color,$points);
}

function sort_by_cards_value($a,$b){
    return ($a[2] < $b[2]) ? -1 : 1;
}
usort($cards,"sort_by_cards_value");

for($i=0;$i<count($cards);$i++){
    print($cards[$i][0]." de ".$cards[$i][1]." vaut ".$cards[$i][2]." points<br>");
}
?>