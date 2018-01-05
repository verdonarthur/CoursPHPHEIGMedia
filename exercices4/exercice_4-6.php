<?php
/*
Étendre le jeu à 52 cartes (de 2 à l'AS) 
*/

$COLOR = array("coeur","carreau","trefle","pique");
$VALUE = array(2,3,4,5,6,7,8,9,10,"valet","dame","roi","as");

$cards;

for ($i=0,$j=0,$k=0,$points=0; $i<52; $i++,$points++,$k++) {
    $value;
    $color;

    //define color
    $j = $i % count($VALUE) == 0 && $i!=0 ? $j+1 : $j;
    $color = $COLOR[$j];

    //define value
    $k = $i % count($VALUE) == 0 ? 0 : $k;
    $value = $VALUE[$k];

    //define points
    $points = $points===count($VALUE) ? 0 : $points;
    
    $cards[$i] = array($value,$color,$points);
}

?>
    <table>
        <tr>
            <td>index</td>
            <td>Valeur</td>
            <td>Couleur</td>
            <td>Points</td>
        </tr>
<?php
for ($i=0; $i<count($cards); $i++) {
    print("<tr>
    <td>$i</td>
    <td>".$cards[$i][0]."</td>
    <td>".$cards[$i][1]."</td>
    <td>".$cards[$i][2]."</td>
    </tr>");
}

?>
    </table>
