<?php require_once('exercice_3-1.php'); 
?>
<a href="?lang=fr">français</a>

<a href="?lang=en">anglais</a>

<a href="?lang=de">allemand</a>

<?php

$lang = isset($_GET['lang']) ? $_GET['lang'] : "fr";
require_once("exercice_3-2.lang.$lang.php");

print('Langue choisie : ' . $lang);

?>
<ul>
<?php
foreach ($lst_article as $name => $chf) {
    print("<li>$name : ".round(convert_currency($chf)[CURRENCY],2)."</li>");
}
?>
</ul>


