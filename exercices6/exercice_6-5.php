<?php

class Tamagoshi implements JsonSerializable {
    private $lvl_tiredness;
    private $lvl_thirst;
    private $lvl_hunger;
    private $weight;

    private function check_is_right_lvl($lvl) {
        if ($lvl < 0 || $lvl > 1)
            return false;

        if (!is_float($lvl))
            return false;

        return true;
    }


    /**
     * Tamagoshi constructor.
     * @param $lvl_tiredness
     * @param $lvl_thirst
     * @param $lvl_hunger
     * @param $weight
     */
    public function __construct($lvl_tiredness = 0.5, $lvl_thirst = 0.5, $lvl_hunger = 0.5, $weight = 50) {
        $this->lvl_tiredness = $lvl_tiredness;
        $this->lvl_thirst = $lvl_thirst;
        $this->lvl_hunger = $lvl_hunger;
        $this->weight = $weight;
    }


    public function sleep() {
        $this->setLvlTiredness($this->getLvlTiredness() - $this->getLvlTiredness() * 0.9);
        $this->setWeight($this->getWeight() + $this->getWeight() * 0.25);
    }

    public function eat() {
        $this->setLvlHunger($this->getLvlHunger() - $this->getLvlHunger() * 0.9);
        $this->setWeight($this->getWeight() + $this->getWeight() * 0.33);
    }

    public function drink() {
        $this->setLvlThirst($this->getLvlThirst() - $this->getLvlThirst() * 0.9);
    }

    public function wait() {
        $this->setLvlTiredness($this->getLvlTiredness() - $this->getLvlTiredness() * 0.5);
        $this->setLvlHunger($this->getLvlHunger() + $this->getLvlHunger() * 0.5);
        $this->setLvlThirst($this->getLvlThirst() + $this->getLvlThirst() * 0.5);
        $this->setWeight($this->getWeight() + $this->getWeight() * 0.25);
    }

    public function doSport() {
        $this->setLvlTiredness($this->getLvlTiredness() + $this->getLvlTiredness() * 0.6);
        $this->setLvlHunger($this->getLvlHunger() + $this->getLvlHunger() * 0.5);
        $this->setLvlThirst($this->getLvlThirst() + $this->getLvlThirst() * 0.5);
        $this->setWeight($this->getWeight() - $this->getWeight() * 0.25);
    }

    public function getHealthLvl() {
        return 1 - ($this->getWeight() / 100 + $this->getLvlTiredness() + $this->getLvlHunger() + $this->getLvlThirst()) / 4;
    }

    /**
     * @return mixed
     */
    public function getLvlTiredness() {
        return $this->lvl_tiredness;
    }

    /**
     * @param mixed $lvl_tiredness
     * @throws Exception
     */
    public function setLvlTiredness($lvl_tiredness) {
        if ($this->check_is_right_lvl($lvl_tiredness))
            $this->lvl_tiredness = $lvl_tiredness;
        else
            $this->lvl_tiredness = $this->getLvlTiredness() > 0.5 ? 1.0 : 0.0;
    }

    /**
     * @return mixed
     */
    public function getLvlThirst() {
        return $this->lvl_thirst;
    }

    /**
     * @param mixed $lvl_thirst
     * @throws Exception
     */
    public function setLvlThirst($lvl_thirst) {
        if ($this->check_is_right_lvl($lvl_thirst))
            $this->lvl_thirst = $lvl_thirst;
        else
            $this->lvl_thirst = $this->getLvlThirst() > 0.5 ? 1.0 : 0.0;
    }

    /**
     * @return mixed
     */
    public function getLvlHunger() {
        return $this->lvl_hunger;
    }

    /**
     * @param mixed $lvl_hunger
     * @throws Exception
     */
    public function setLvlHunger($lvl_hunger) {
        if ($this->check_is_right_lvl($lvl_hunger))
            $this->lvl_hunger = $lvl_hunger;
        else
            $this->lvl_hunger = $this->getLvlHunger() > 0.5 ? 1.0 : 0.0;
    }

    /**
     * @return mixed
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight) {
        $this->weight = $weight;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}

if (isset($_POST['action']) && isset($_POST['t'])) {
    $decoded_object = json_decode($_POST['t']);

    $t = new Tamagoshi($decoded_object->lvl_tiredness,
        $decoded_object->lvl_thirst,
        $decoded_object->lvl_hunger,
        $decoded_object->weight);

    switch ($_POST['action']) {
        case 0:
            $t->wait();
            break;
        case 1:
            $t->sleep();
            break;
        case 2:
            $t->eat();
            break;
        case 3:
            $t->drink();
            break;
        case 4:
            $t->doSport();
            break;
    }
} else {
    $t = new Tamagoshi();

}


?>
<h1>Exercice 6-5 : TamagoshiPHP</h1>
<h2>Stat du tamagoshi</h2>
<table>
    <tr>
        <td>Santé général :</td>
        <td><?php print $t->getHealthLvl() ?></td>
    </tr>
    <tr>
        <td>Poids :</td>
        <td><?php print $t->getWeight() ?></td>
    </tr>
    <tr>
        <td>Fatigue :</td>
        <td><?php print $t->getLvlTiredness() ?></td>
    </tr>
    <tr>
        <td>Soif :</td>
        <td><?php print $t->getLvlThirst() ?></td>
    </tr>
    <tr>
        <td>Faim :</td>
        <td><?php print $t->getLvlHunger() ?></td>
    </tr>
</table>
<h2>Action possible</h2>
<form method="post" action="">
    <input type="hidden" name="t" value='<?php print json_encode($t); ?>'>
    <input type="hidden" name="action" value="0">
    <input type="submit" value="patienter">
</form>
<form method="post" action="">
    <input type="hidden" name="t" value='<?php print json_encode($t); ?>'>
    <input type="hidden" name="action" value="1">
    <input type="submit" value="dormir">
</form>

<form method="post" action="">
    <input type="hidden" name="t" value='<?php print json_encode($t); ?>'>
    <input type="hidden" name="action" value="2">
    <input type="submit" value="nourrir">
</form>
<form method="post" action="">
    <input type="hidden" name="t" value='<?php print json_encode($t); ?>'>
    <input type="hidden" name="action" value="3">
    <input type="submit" value="abreuver">
</form>
<form method="post" action="">
    <input type="hidden" name="t" value='<?php print json_encode($t); ?>'>
    <input type="hidden" name="action" value="4">
    <input type="submit" value="faire du sport">
</form>