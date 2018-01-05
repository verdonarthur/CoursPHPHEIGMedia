<?php
$DATATOSUBMIT = array("email", "typeofnavigator");
$data = array(
    'email' => FILTER_SANITIZE_EMAIL,
    'typeofnavigator' => FILTER_SANITIZE_STRIPPED
);
?>
<!DOCTYPE>
<html>
<head></head>
<body>
<h1>Exercice 2</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="email" name="email" placeholder="email">
    <input type="hidden" name="typeofnavigator" value="<?php print $_SERVER['HTTP_USER_AGENT']; ?>">
    <input type="submit">
</form>
<h2>Data</h2>
<table>
    <?php
    if (isset($_POST)) {
        $browser = get_browser(null, true);
        $filtered_data = filter_input_array(INPUT_POST, $data);

        if ($filtered_dataform)
            foreach ($filtered_data as $metadata => $filter) {
                if (isset($filtered_data[$metadata]) && $filtered_data[$metadata] !== "")
                    print("<tr><td>$metadata</td><td>" . $filtered_data[$metadata] . "</td></tr>");
                else
                    print("<tr><td>$metadata</td><td>DATA NOT SET</td></tr>");
            }


        var_dump($browser);
        var_dump($_POST);
    }

    ?>
</table>
</body>
</html>
