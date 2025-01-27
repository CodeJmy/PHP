<?php
// Connection à la BDD (voir php.net/manual/fr/pdo.construct.php)
$dsn = 'mysql:dbname=exopdo;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
?>