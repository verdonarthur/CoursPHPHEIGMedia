<?php
/*
Nous allons créer le jeu du BlackJack, ou plutôt une version rudimentaire à 1 joueur du jeu. 
L'interface graphique se compose d'un affichage du nombre de points du joueur ainsi que de 2 boutons: continuer et arrêter. 
Fonctionnement:
    Lorsque la page est chargée, un jeu de carte est construit et une carte est tirée au hasard. 
    Les points de la carte tirée s'ajoutent au nombre de points du joueur.
    Le joueur décide s'il veut continuer ou arrêter en cliquant sur l'un des deux boutons
    S'il veut continuer, la page se recharge et la logique continue depuis le point a.
    S'il veut arrêter, la page se recharge et la logique indique à l'utilisateur s'il a dépassé les 21 points 
    et le nombre de points qu'il aurait obtenu s'il avait continué. 

Conseils:
    Le nombre de points de l'utilisateur est passé par le tableau GET ou POST
    A chaque tour, la carte est tirée au hasard dans un jeu plein
*/

function create_deck()
{
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

    return $cards;
}

function draw_in_deck($deck)
{
    return $deck[rand(0, count($deck)-1)];
}

function display_cards($card)
{
    return $card[0]." de ".$card[1];
}

$deck = create_deck();
$random_card = draw_in_deck($deck);
$player_point = isset($_POST['player_point']) ? (int)$_POST['player_point']:0;
?>

    <h1>BlackJackPHP v.1.0</h1>
    <?php if (!isset($_POST['type']) || $_POST['type'] === "continuer") : ?>
    Carte tirée : <?php print(display_cards($random_card)) ?>
    <?php $player_point += $random_card[2]; ?>
    <p>Nombre de points actuel :
        <?php print($player_point) ?>
    </p>
    <?php else : ?>
    <p>
        <?php print($player_point>21?"Vous avez depassez 21 points":"Vous n'avez pas depassez 21 points"); ?>
        <br>
        <?php $player_point += $random_card[2]; ?> Si vous aviez continé vous auriez obtenu :
        <?php print($player_point) ?>
        <br>
    </p>
    <?php endif ?>
    <?php if (!isset($_POST['type']) || $_POST['type'] === "continuer") : ?>
    <form action="" method="POST">
        <input type="hidden" name="player_point" value="<?php print($player_point) ?>">
        <input type="submit" name="type" value="arreter">
    </form>
    <form action="" method="POST">
        <input type="hidden" name="player_point" value="<?php print($player_point) ?>">
        <input type="submit" name="type" value="continuer">
    </form>
    <?php else : ?>
    <form action="" method="POST">
        <input type="submit" value="recommencer">
    </form>
    <?php endif ?>

<?php
print("<br><br>");
var_dump($_POST);
?>
