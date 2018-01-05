<?php

function print_debug($var) {
    print("<pre>");
    var_dump($var);
    print("</pre>");
}

class Person {
    private $name, $surname, $address;

    public function __construct($name, $surname, $address) {
        if ($name === "" || $surname === "" || $address === "")
            throw new Exception("Bad param in Person Constructor");

        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
    }

    public function getPerson() {
        return array("name" => $this->name, "surname" => $this->surname, "address" => $this->address);
    }

    public function setAddress($address) {
        $this->address = $address;
    }

}


$p1 = new Person("Jean", "Lopes", "ch. de bleu 13");
$p2 = new Person("Marc", "Lamenace", "rue du Craimoisi 1");
$p3 = new Person("Henri", "Quatre", "place de la couronne 4");

print_debug($p1, $p2, $p3);

$p1->setAddress("ch. du rouge 10");

print_debug($p1, $p2, $p3);

print_debug($p3->getPerson());
