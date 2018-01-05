<?php

if (!isset($_COOKIE['background']) && !isset($_COOKIE['text_color'])) {
    if (!empty($_POST['background']) && !empty($_POST['text_color'])) {
        $background = $_POST['background'];
        $text_color = $_POST['text_color'];

        $expiration_time = time() + 2 * 30 * 24 * 3600; // 2 mois

        setcookie("background", $background, $expiration_time);
        setcookie("text_color", $text_color, $expiration_time);
    } else {
        $background = "#FFFFFF";
        $text_color = "#000000";
    }
} else {
    $background = $_COOKIE['background'];
    $text_color = $_COOKIE['text_color'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"/>
    <title>Exercice 7-1</title>
    <style type="text/css" media="screen">
        body {
            background-color: <?php echo $background; ?>;
            color: <?php echo $text_color;?>;
        }
    </style>
</head>
<body>
<form method="post" action="">
    <fieldset>
        <legend>Choisissez vos couleurs</legend>
        <label>Couleur de fond
            <input type="text" name="background"/>
        </label><br><br>
        <label>Couleur de text_color
            <input type="text" name="text_color"/>
        </label><br>
        <input type="submit" value="Changer les couleurs"/>&nbsp;&nbsp;
    </fieldset>
</form>
</body>
</html>
