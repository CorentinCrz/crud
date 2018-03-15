<?php
if (!isset($_POST['id'])) {
    header('Location: ../index.php?nopostdata');
    exit;
}
require_once "../config/connexion.php";
$sql = "DELETE FROM
`test`
WHERE
id = :id
;";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
$stmt->execute();
header('Location: ../index.php');