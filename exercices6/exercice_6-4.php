<?php

class Form {
    private $form;
    public $isClosed = false;

    public function __construct($action, $method) {
        $this->form = "<form action='$action' method='$method'>";
    }

    public function setText($name, $text = "", $class = "") {
        if ($this->isClosed)
            return;

        $this->form .= "<fieldset>";
        $this->form .= "<textarea name='$name' class='$class'>";
        $this->form .= $text;
        $this->form .= "</textarea>";
        $this->form .= "</fieldset>";
    }

    public function setSubmit() {
        $this->isClosed = true;
        $this->form .= "<input type='submit'>";
        $this->form .= "</form>";
    }

    public function setForm($value){
        $this->form.=$value;
    }

    public function getForm() {
        return $this->form;
    }

}

class Form2 extends Form{
    private function setRadioCheckbox($name,$values,$class,$type){
        if ($this->isClosed)
            return;

        $this->setForm("<fieldset>");
        foreach($values as $value)
            $this->setForm("<input type='$type' name='$name' value='$value' class='$class'>");
        $this->setForm("</fieldset>");
    }

    public function setRadio($name,$values,$class=""){
        $this->setRadioCheckbox($name,$values,$class,"radio");
    }
    public function setCheckbox($name,$values,$class=""){
        $this->setRadioCheckbox($name,$values,$class,"checkbox");
    }

}

?>
<h1>Exercice 6-4</h1>
<h2>partie A</h2>
<?php
$form1 = new Form("","post");
$form1->setText("a");
$form1->setText("b");
$form1->setSubmit();
$form1->setText("c");
print $form1->getForm();
?>
<h2>partie B</h2>
<?php
$form2 = new Form2("","post");
$form2->setCheckbox("a",array("a","b","c"));
$form2->setRadio("a",array("a","b","c"));
$form2->setSubmit();
print $form2->getForm();
?>
<h2>Partie C</h2>
<?php
$form3 = new Form2("","post");
$form3->setCheckbox("a",array("a","b","c"));
$form4 = clone $form3;
$form4->setText("c","Salut");
$form4->setSubmit();
$form3->setSubmit();
print $form3->getForm();
print $form4->getForm();
?>