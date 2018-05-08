<?php
require_once "DB.php";
require_once('./includes/class/Smarty/Smarty.class.php');
$tpl = new Smarty();

$db = new DB(array('hostname' => 'localhost',
    'username' => 'verdon', 'password' => 'verdon',
    'database' => 'heigvd-verdon'));

if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {
    $db->insert(array('first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'notes' => $_POST['notes']), "contacts");
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
$tabOfQueryResult = $db->execute()->fetch_obj();

$tpl->assign('tabOfQueryResult',$tabOfQueryResult);

$tpl->display("exercice_9-1.tpl");

?>
