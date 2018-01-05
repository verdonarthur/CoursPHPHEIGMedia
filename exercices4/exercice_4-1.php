<?php
/*
Créer un tableau unidimensionnel nommé "$salade" contenant 6 fruits 
(pomme, banane, raisin, poire, orange et figue). Afficher le contenu du tableau 
à l'aide de l'opérateur "foreach".

Parcourir le tableau à la recherche du raisin. Une fois trouvé, 
afficher la position du raisin dans le tableau.
Afficher la position du raisin sans parcourir 
le tableau (utiliser la fonction adéquate en parcourant les 
fonctions d'opérations sur les tableaux: http://php.benscom.com/manual/fr/ref.array.php). 
*/

$salad = array("pomme","banane","raisin","poire","orange","figue");

foreach ($salad as $fruit) {
    print($fruit."<br>");
}

print("<br>");

for ($i=0; $i<count($salad); $i++) {
    if ($salad[$i] == "raisin") {
        print($i);
        break;
    }
}

print("<br>");

print(array_search("raisin",$salad));

?>