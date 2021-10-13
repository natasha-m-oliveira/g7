<?php
# [database]
$driver = 'mysql';
$host = 'localhost';
$port = '3306';
$dbname = 'g7';
$username = 'root';
$password = 'root';
$charset = 'utf8';

try {
    $pdo = new PDO("$driver:host=$host;port=$port;dbname=$dbname", $username, $password);
    #$sql = $pdo->prepare(file_get_contents('./createTables.sql')); # Caso voce queira ja criar as tabelas
    #$sql->execute();
} catch (\PDOException $ex) {
    echo 'Oi mundo';
} 