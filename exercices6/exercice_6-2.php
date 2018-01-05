<h1>Exercice 6-2</h1>
<?php

class Card {
    private $value, $color, $points;


    public function __construct($value, $color, $points) {

        $this->color = $color;
        $this->value = $value;
        $this->points = $points;
    }

    public function get_value() {
        return $this->value;
    }

    public function get_color() {
        return $this->color;
    }

    public function get_points() {
        return $this->points;
    }

    public function __toString() {
        return $this->value . " de " . $this->color;
    }

}

class GameOfCard {
    public const NB_OF_CARDS = 36;
    public const COLORS = array("carreau", "pique", "trefle", "coeur");
    public const VALUE = array(6, 7, 8, 9, 10, "valet", "dame", "roi", "as");

    private $array_of_cards;

    public function __construct() {
        $this->generate_array_of_cards();

    }

    private function generate_array_of_cards() {
        foreach (static::COLORS as $color) {
            $i = 1;
            foreach (static::VALUE as $value) {
                $this->add_card(new Card($value, $color, $i++));
            }
        }
    }

    public function add_card($card) {
        if ($card instanceof Card) {
            $this->array_of_cards[] = $card;
        }
    }

    public function sort_by_value() {
        usort($this->array_of_cards, function ($a, $b) {
            return ($a->get_points() < $b->get_points()) ? -1 : 1;
        });
    }

    public function mix_deck() {
        usort($this->array_of_cards, function ($a, $b) {
            return rand(-1, 1);
        });
    }

    public function draw() {
        return $this->array_of_cards[rand(0, count($this->array_of_cards) - 1)];
    }

    public function get_array_deck() {
        return $this->array_of_cards;
    }
}

class GameOfCardExtended extends GameOfCard {
    public const NB_OF_CARDS = 52;
    public const VALUE = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "valet", "dame", "roi", "as");
}

?>

<h2>Exercice 4-2</h2>
<table>
    <tr>
        <td>index</td>
        <td>Valeur</td>
        <td>Couleur</td>
        <td>Points</td>
    </tr>
    <?php
    $deck = new GameOfCard();
    $i = 1;
    foreach ($deck->get_array_deck() as $card) {
        print("<tr>
                    <td>$i</td>
                    <td>" . $card->get_value() . "</td>
                    <td>" . $card->get_color() . "</td>
                    <td>" . $card->get_points() . "</td>
              </tr>");
        $i++;
    }
    ?>
</table>
<h2>Exercice 4-3</h2>
<?php
$deck->sort_by_value();
foreach ($deck->get_array_deck() as $card) {
    print($card->get_value() . " de " . $card->get_color() . " vaut " . $card->get_points() . " points<br>");
}
?>
<h2>Exercice 4-4</h2>
<?php
$deck->mix_deck();
foreach ($deck->get_array_deck() as $card) {
    print($card->get_value() . " de " . $card->get_color() . " vaut " . $card->get_points() . " points<br>");
}
?>
<h2>Exercice 4-5</h2>
<?php
print("Carte tirée au hasard : " . $deck->draw() . "<br>");
?>
<h2>Exercice 4-6</h2>
<table>
    <tr>
        <td>index</td>
        <td>Valeur</td>
        <td>Couleur</td>
        <td>Points</td>
    </tr>
    <?php
    $deck_extended = new GameOfCardExtended();
    $i = 1;
    foreach ($deck_extended->get_array_deck() as $card) {
        print("<tr>
                    <td>$i</td>
                    <td>" . $card->get_value() . "</td>
                    <td>" . $card->get_color() . "</td>
                    <td>" . $card->get_points() . "</td>
              </tr>");
        $i++;
    }
    ?>
</table>

<h1>BlackJackPHP v.1.0</h1>
<?php
$random_card = $deck->draw();
$player_point = isset($_POST['player_point']) ? (int)$_POST['player_point'] : 0;

if (!isset($_POST['type']) || $_POST['type'] === "continuer") : ?>
    Carte tirée : <?php print($random_card) ?>
    <?php $player_point += $random_card->get_points(); ?>
    <p>Nombre de points actuel :
        <?php print($player_point) ?>
    </p>
<?php else : ?>
    <p>
        <?php print($player_point > 21 ? "Vous avez depassez 21 points" : "Vous n'avez pas depassez 21 points"); ?>
        <br>
        <?php $player_point += $random_card->get_points(); ?> Si vous aviez continé vous auriez obtenu :
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
