<?php

interface CountableGameElement {
    public function get_points();
}

class Card implements CountableGameElement {
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

abstract class  GameOfCard {

    protected $array_of_cards;

    abstract function generate_array_of_cards();

    public function add_card($card) {
        if ($card instanceof Card) {
            $this->array_of_cards[] = $card;
        }
    }

    public function get_array_deck() {
        return $this->array_of_cards;
    }
}

interface Playable {
    public function mix_deck();

    public function draw();
}

class GameOf36Card extends GameOfCard implements Playable {

    function generate_array_of_cards() {
        $COLORS = array("carreau", "pique", "trefle", "coeur");
        $VALUE = array(6, 7, 8, 9, 10, "valet", "dame", "roi", "as");

        foreach ($COLORS as $color) {
            $i = 1;
            foreach ($VALUE as $value) {
                $this->add_card(new Card($value, $color, $i++));
            }
        }
    }

    public function mix_deck() {
        usort($this->array_of_cards, function ($a, $b) {
            return rand(-1, 1);
        });
    }

    public function draw() {
        return $this->array_of_cards[rand(0, count($this->array_of_cards) - 1)];
    }
}

class GameOf52Card extends GameOfCard implements Playable {

    function generate_array_of_cards() {
        $COLORS = array("carreau", "pique", "trefle", "coeur");
        $VALUE = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "valet", "dame", "roi", "as");

        foreach ($COLORS as $color) {
            $i = 1;
            foreach ($VALUE as $value) {
                $this->add_card(new Card($value, $color, $i++));
            }
        }
    }

    public function mix_deck() {
        usort($this->array_of_cards, function ($a, $b) {
            return rand(-1, 1);
        });
    }

    public function draw() {
        return $this->array_of_cards[rand(0, count($this->array_of_cards) - 1)];
    }
}

class BlackJack {
    private $player_points;
    private $deck;

    public function __construct($point) {
        $this->deck = new GameOf52Card();
        $this->deck->generate_array_of_cards();
        $this->player_points = $point;
    }

    public function play() {
        $card = $this->deck->draw();
        $this->player_points += $card->get_points();
        return array($card, $this->player_points);
    }

    public function reset() {
        self::__construct();
    }


}

?>
<h1>BlackJackPHP v.1.0</h1>
<?php
$blackjack = new BlackJack(isset($_POST['player_point']) ? (int)$_POST['player_point'] : 0);
$actual_game = $blackjack->play();


if (!isset($_POST['type']) || $_POST['type'] === "continuer") : ?>
    Carte tirée : <?php print($actual_game[0]) ?>
    <p>Nombre de points actuel :
        <?php print($actual_game[1]) ?>
    </p>
<?php else : ?>
    <p>
        <?php print($_POST['player_point'] > 21 ? "Vous avez depassez 21 points" : "Vous n'avez pas depassez 21 points"); ?>
        <br>
        Si vous aviez continé vous auriez obtenu:
        <?php print($_POST['player_point'] + $actual_game[0]->get_points()); ?>
        <br>
    </p>
<?php endif ?>
<?php if (!isset($_POST['type']) || $_POST['type'] === "continuer") : ?>
    <form action="" method="POST">
        <input type="hidden" name="player_point" value="<?php print($actual_game[1]) ?>">
        <input type="submit" name="type" value="arreter">
    </form>
    <form action="" method="POST">
        <input type="hidden" name="player_point" value="<?php print($actual_game[1]) ?>">
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
