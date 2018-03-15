<?php
if (!isset($_POST['nom']) || !isset($_POST['marque']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "../config/connexion.php";
$sql = "INSERT INTO
`test`
(
`nom`,
`marque`
)
VALUES
(
:nom,
:marque
)
;";
$stmt = $db->prepare($sql);
$stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
$stmt->execute();
header('Location: ../index.php');