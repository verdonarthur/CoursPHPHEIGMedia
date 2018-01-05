<?php
session_start();
$background = "#FFFFFF";
$text_color = "#000000";


if (isset($_SESSION['colors'])) {
    $background = $_SESSION['colors']['background'];
    $text_color = $_SESSION['colors']['text_color'];
}

if (isset($_POST['background']) && isset($_POST['text_color'])) {
    $_SESSION['colors']['background'] = $_POST['background'];
    $_SESSION['colors']['text_color'] = $_POST['text_color'];
    $background = $_POST['background'];
    $text_color = $_POST['text_color'];
}

?>

<?php ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"/>
        <title>Exercice 7-5</title>
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

<?php ?>