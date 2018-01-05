<?php

if (isset($_COOKIE['url'])) {
    header('Location: ' . $_COOKIE['url'], true, $permanent ? 301 : 302);
    exit();
}


if (!empty($_POST['url'])) :
    setcookie("url", $_POST['url'], time() + 5 * 60);


    ?>

<?php else : ?>
    <form method="post" action="">
        <fieldset>
            <legend>URL favoris</legend>
            <label>URL :
                <input type="text" name="url"
                       value="">
            </label>
            <input type="submit" value="appliquer favoris">&nbsp;&nbsp;
        </fieldset>
    </form>
<?php endif; ?>