<?php
/*
Créer la logique nécessaire à tirer une carte au hasard dans le jeu.
Exemple : Carte tirée au hasard: as de coeur (vaut 8 points)
*/

function draw_in_deck($deck){
    return $deck[rand(0,count($deck)-1)];
}
function display_cards($card){
    return $card[0]." de ".$card[1];
}

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

print("Carte tirée au hasard : ".display_cards(draw_in_deck($cards))."<br>");