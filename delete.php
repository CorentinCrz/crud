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
    <title>T'es sur?</title>
</head>
<body>
<ul>
    <li><a href="index.php">Liste</a></li>
</ul>
<form action="models/dodelete.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="">T'es sur de vouloir supprimer <?=$row['nom']?></label><br>
<input type="submit" value="Je suis certain! OUIIII!">
</form>
</body>
</html>