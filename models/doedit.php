<?php
if (!isset($_POST['id']) || !isset($_POST['nom']) || !isset($_POST['marque'])) {
    header('Location: ../index.php?error=nopostdataedit');
    exit;
}
require_once "../config/connexion.php";
$sql = "UPDATE
`test`
SET
`nom` = :nom,
`marque` = :marque
WHERE
id = :id
;";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
$stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
$stmt->execute();
header('Location: ../details.php?id='.$_POST['id']);