<?php
require_once "Humain.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes humanoïdes</title>
</head>
<body>
<h1>Les classes de base</h1>
<?php
$human1 = new Humain("Pitz","Michaël","j;hgkyjfytf");
$human2 = new Humain("Antony","Audrey","hahahaharggggg ;-)");
echo Humain::GENRE;
?>
<pre>
    <?php
    var_dump($human1,$human2);
    ?>
</pre>
</body>
</html>
