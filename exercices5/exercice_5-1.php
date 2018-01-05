<?php?>
<!DOCTYPE>
<html>
<head></head>
<body>
<h1>Address client</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="surname" placeholder="surname">
    <input type="text" name="address" placeholder="address">
    <input type="text" name="city" placeholder="city">
    <input type="number" name="npa" placeholder="npa">
    <input type="submit">
</form>
<h2>Data</h2>
<table>
    <?php
    if (isset($_POST)) {

        $data = array(
            'name' => FILTER_SANITIZE_STRIPPED,
            'surname' => FILTER_SANITIZE_STRIPPED,
            'address' => FILTER_SANITIZE_STRIPPED,
            'city' => FILTER_SANITIZE_STRIPPED,
            'npa' => array(
                'filter' => FILTER_VALIDATE_INT,
                'options' => array('min_range' => 0, 'max_range' => 9999)
            )
        );

        $filtered_dataform = filter_input_array(INPUT_POST, $data);

        if ($filtered_dataform)
            foreach ($filtered_dataform as $metadata=> $filter) {
                if (isset($filtered_dataform[$metadata]) && $filtered_dataform[$metadata] !== "")
                    print("<tr><td>$metadata</td><td>" . $filtered_dataform[$metadata] . "</td></tr>");
                else
                    print("<tr><td>$metadata</td><td>DATA NOT SET</td></tr>");
            }
    }

    ?>
</table>
</body>
</html>
