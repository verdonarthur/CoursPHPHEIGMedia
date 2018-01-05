<?php
$mysqli;
$paramRequest = "";
$result = null;

try {
    $mysqli = new mysqli("localhost", "verdon", "verdon", "heigvd-verdon") or die(mysqli_connect_error());
} catch (Exception $e) {
    print "erreur a la connexion";
}

if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {

    $result = $mysqli->query("INSERT INTO contacts (`first_name`, `last_name`, `email`, `notes`)"
        . " VALUES ('" . $mysqli->real_escape_string($_POST['first_name']) . "',"
        . "'" . $mysqli->real_escape_string($_POST['last_name']) . "',"
        . "'" . $mysqli->real_escape_string($_POST['email']) . "',"
        . "'" . $mysqli->real_escape_string($_POST['notes']) . "')");
}

if (isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] !== "") {
    $paramRequest .= " WHERE last_name like '%" . $mysqli->real_escape_string($_POST['search']) . "%'";
}

if (isset($_POST['order'])) {
    switch ($_POST['order']) {
        case 1:
            $paramRequest .= " ORDER BY id DESC";
            break;
        case 2:
            $paramRequest .= " ORDER BY id ASC";
            break;
    }
}

$result = $mysqli->query("select * from contacts" . $paramRequest);


$tabOfQueryResult = null;

if ($result != null) {
    while ($rsQueryElement = $result->fetch_object()) {
        $tabOfQueryResult[] = $rsQueryElement;
    }//while
}

?>
<form action="" method="post">
    <fieldset>
        <legend>add record</legend>
        <input name="first_name" placeholder="first_name" type="text">
        <input name="last_name" placeholder="last_name" type="text">
        <input name="email" placeholder="email" type="email">
        <textarea name="notes" placeholder="notes"></textarea>
        <input type="submit" value="add">
    </fieldset>
</form>


<form action="" method="post">
    <fieldset>
        <legend>Search param</legend>
        <input type="text" name="search" placeholder="search">
        <select name="order" onchange="this.form.submit()">
            <option></option>
            <option value="1">Descendant</option>
            <option value="2">Ascendant</option>
        </select>
    </fieldset>
</form>

<table border="1">
    <?php
    if ($tabOfQueryResult != null)
        foreach ($tabOfQueryResult as $contact) {
            print("<tr>");
            print("<td>" . $contact->id . "</td>");
            print("<td>" . $contact->first_name . "</td>");
            print("<td>" . $contact->last_name . "</td>");
            print("<td><a href='mailto:" . $contact->email . "'>" . $contact->email . "</a></td>");
            print("<td>" . $contact->notes . "</td>");
            print("</tr>");
        }
    ?>
</table>
<p>Nombre total d'élément : <?php print($tabOfQueryResult != null ? $result->num_rows : 0) ?></p>
