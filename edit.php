<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddetails');
    exit;
}
require_once "config/connexion.php";
$sql = "SELECT
`id`,
`nom`,
`marque`
FROM
`test`
WHERE
`id` = :id
;";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>modifier</title>
</head>
<body>
<ul>
    <li><a href="index.php">Liste</a></li>
</ul>
<form action="models/doedit.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label for="nom">Nom</label> <input type="text" name="nom" value="<?=$row['nom']?>"><br>
    <label for="marque">Marque</label> <input type="text" name="marque" value="<?=$row['marque']?>"><br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>