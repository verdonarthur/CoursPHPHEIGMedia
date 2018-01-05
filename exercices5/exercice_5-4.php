<!DOCTYPE>
<html>
<head></head>
<body>
<h1>TTC PRICE CALCULATOR</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="file" name="zip" placeholder="Zip file" size="1">
    <input type="submit">
</form>
<h2>TTC PRICE</h2>
<?php
if (isset($_FILES['zip'])) {
    $filename = $_FILES['zip']['name'];
    $filesize = $_FILES['zip']['size'];
    $filetmpname = $_FILES['zip']['tmp_name'];
    $fileerror = $_FILES['zip']['error'];
    $filetype = $_FILES['zip']['type'];

    print("<pre>");
    var_dump($_FILES);
    print("</pre>");

    if($filetype == 'application/x-zip-compressed' && $filesize < 1*10^6){
        print("le fichier {$filename} fait {$filesize} octet");
    }else{
        die("Fichier trop grand ou de format invalide");
    }


}

?>
</body>
</html>
