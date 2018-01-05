<?php
/*
Utiliser la méthode appropriée pour mélanger les cartes. 
L'affichage du jeu après mélange doit ressembler à cela: 
valet de trefle vaut 5 points
as de coeur vaut 8 points
8 de coeur vaut 2 points
as de carreau vaut 8 points
9 de coeur vaut 3 points
10 de pique vaut 4 points
7 de trefle vaut 1 points
valet de coeur vaut 5 points
8 de pique vaut 2 points
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


usort($cards, function ($a, $b) {
    return rand(-1, 1);
});

for ($i=0; $i<count($cards); $i++) {
    print($cards[$i][0]." de ".$cards[$i][1]." vaut ".$cards[$i][2]." points<br>");
}
