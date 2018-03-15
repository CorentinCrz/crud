<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=db-demo', 'root', 'root');
} catch (PDOException $exception) {
    die($exception);
}