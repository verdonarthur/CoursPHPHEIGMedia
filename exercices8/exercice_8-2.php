<?php
require_once "DB.php";

$db = new DB(array('hostname' => 'localhost',
    'username' => 'verdon', 'password' => 'verdon',
    'database' => 'heigvd-verdon'));


if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {
    $db->insert(array('first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'notes' => $_POST['notes']), "contacts");
    //var_dump($db->get_sql_request_string());
    $db->execute();

}

$db->select()->from("contacts");

if (isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] !== "") {
    $db->where(array("last_name", "like", "%" . $_POST['search'] . "%"));
}

if (isset($_POST['order'])) {
    switch ($_POST['order']) {
        case 1:
            $db->order_by_desc('id');
            break;
        case 2:
            $db->order_by_asc('id');
            break;
    }
}
//var_dump($db->get_sql_request_string());
$tabOfQueryResult = $db->execute()->fetch_obj();

//$result = $mysqli->query("select * from contacts" . $paramRequest);


//$tabOfQueryResult = null;

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
<p>Nombre total d'élément : <?php print($tabOfQueryResult != null ? count($tabOfQueryResult) : 0) ?></p>
