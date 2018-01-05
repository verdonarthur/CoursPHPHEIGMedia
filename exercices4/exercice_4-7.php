<?php
/*
Formulaires HTML et interprétation par PHP des valeurs transmises.

Créer un petit formulaire où on peut saisir son nom et son âge. 
Lorsqu'on envoie le formulaire correctement rempli, la page affiche le nom et l'âge. 
Si les données ne sont pas complètes, ou si l'âge n'est pas un nombre, 
    le formulaire se réaffiche pour être corrigé. 

*/

$name=$_GET['name'];
$age=$_GET['age'];

if($_GET['name'] != "" && is_numeric($_GET['age'])):
    print("<p>Vous vous appelez $name<br>votre age est de : $age<br></p>");
else :
?>

<form method="get" action="">
    <input type="text" name="name" placeholder="Type a name here" value="<?php print($name) ?>">
    <input type="number" name="age" placeholder="Type an age here" value="<?php print($age) ?>">
    <input type="submit" name="submit" value="Envoyer">
</form>

<?php
endif;

print("<br><br>");
var_dump($_GET);
?>
