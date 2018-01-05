<?php
$data = array(
    'price' => FILTER_VALIDATE_FLOAT,
    'tva' => FILTER_VALIDATE_FLOAT
);
?>
<!DOCTYPE>
<html>
<head></head>
<body>
<h1>TTC PRICE CALCULATOR</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="price" placeholder="price in CHF">
    <input type="text" name="tva" placeholder="tva in percent">
    <input type="submit">
</form>
<h2>TTC PRICE</h2>
<?php
if (isset($_POST)) {
    $filtered_data = filter_input_array(INPUT_POST,$data);

    if ($filtered_data) {
        $priceTTC = $filtered_data['price'] + ($filtered_data['price'] * ($filtered_data['tva'] / 100));
        print "<p>TVA de " . $filtered_data['tva'] . "%</p>";
        print "<p>Prix de " . $priceTTC . " CHF</p>";
    }
}

?>
</body>
</html>
