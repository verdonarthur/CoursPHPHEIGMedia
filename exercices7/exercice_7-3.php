<?php

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


if (!empty($_POST['login']) && !empty($_POST[mdp])) :
    if (user_ok($_POST["login"], $_POST['mdp'])) {
        setcookie("logged",
            json_encode(array("logged" => array($_POST['login'], sha1($_POST['mdp'])))), time() + 5 * 60);
        print "You are authentified";
    } else {
        print "error credentials";
        print "<script>window.location.replace(\"/exercice_7-3.php/\");</script>";
    }
    ?>

<?php else : ?>
<?php var_dump(json_decode($_COOKIE['logged'])); ?>
    <form method="post" action="">
        <fieldset>
            <legend>Saisissez votre nom et mot de passe</legend>
            <label>Login :
                <input type="text" name="login"
                       value="<?php print isset($_COOKIE['logged']) ? json_decode($_COOKIE['logged'])->logged[0] : ''; ?>">
            </label><br>
            <label>MDP :
                <input type="password" name="mdp"
                       value="<?php print isset($_COOKIE['logged']) ? json_decode($_COOKIE['logged'])->logged[1] : ''; ?>">
            </label><br>
            <input type="submit" value="Connection">&nbsp;&nbsp;
        </fieldset>
    </form>
<?php endif; ?>