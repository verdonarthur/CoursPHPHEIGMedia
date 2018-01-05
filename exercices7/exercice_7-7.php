<?php session_start();

function user_ok($login, $mdp) {
    $authorized_users = array("jean" => "7110eda4d09e062aa5e4a390b0a572ac0d2c0220",
        "michael" => "7110eda4d09e062aa5e4a390b0a572ac0d2c0220",
        "user1" => "7110eda4d09e062aa5e4a390b0a572ac0d2c0220");

    foreach ($authorized_users as $user => $password) {
        if ($user === $login && $password === sha1($mdp))
            return true;
    }

    return false;
}


if (isset($_POST['logout']) && $_POST['logout'] === "1") {
    session_unset();
    header('Location: /exercice_7-6.php', true);
    exit();
}

if (isset($_SESSION['logged'])):
    ?>
    <h1>CONTENUS TRES SENSIBLE !!</h1>
    <form action="" method="post">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="logout">
    </form>
    <?php
    exit();
endif;


if (!empty($_POST['login']) && !empty($_POST[mdp])) :
    if (user_ok($_POST["login"], $_POST['mdp'])) :
        $_SESSION['logged'] =
            json_encode(array("logged" => array($_POST['login'], sha1($_POST['mdp']))));
        header('Location: /exercice_7-6.php', true);
        exit();
    else :
        header('Location: /exercice_7-6.php', true);
        print "error credentials";
        exit();
    endif;
    ?>

<?php else : ?>

    <form method="post" action="">
        <fieldset>
            <legend>Saisissez votre nom et mot de passe</legend>
            <label>Login :
                <input type="text" name="login"
                       value="">
            </label><br>
            <label>MDP :
                <input type="password" name="mdp"
                       value="">
            </label><br>
            <input type="submit" value="Connection">&nbsp;&nbsp;
        </fieldset>
    </form>
<?php endif; ?>