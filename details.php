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
var_dump($row['nom']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details de <?=$row['nom']?></title>
</head>
<body>
<ul>
    <li><a href="index.php">Liste</a></li>
</ul>
<h1><?=$row['nom']?></h1>
<p><?=$row['marque']?></p>
<ul>
    <li><a href="delete.php?id=<?=$row['id']?>">Supprimer</a></li>
    <li><a href="edit.php?id=<?=$row['id']?>">Modifier</a></li>
</ul>
</body>
</html>