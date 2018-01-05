<?php
/*
Générer un tableau bidimensionnel représentant un jeu de 36 cartes, selon la forme:

                             Valeur                 Couleur                   Points
          0                       6                   coeur                      0
          1                       7                   coeur                      1
          2                       8                   coeur                      2
          3                       9                   coeur                      3
          4                      10                   coeur                      4
          5                   valet                   coeur                      5
          6                    dame                   coeur                      6
          7                     roi                   coeur                      7
          8                      as                   coeur                      8
          9                       6                 carreau                      0
        ...                     ...                    ...                      ...
         33                    dame                   pique                      6
         34                     roi                   pique                      7
         35                      as                   pique                      8
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

?>
    <table>
        <tr>
            <td>index</td>
            <td>Valeur</td>
            <td>Couleur</td>
            <td>Points</td>
        </tr>
<?php
for($i=0;$i<count($cards);$i++){
    print("<tr>
    <td>$i</td>
    <td>".$cards[$i][0]."</td>
    <td>".$cards[$i][1]."</td>
    <td>".$cards[$i][2]."</td>
    </tr>");
}

?>
    </table>
