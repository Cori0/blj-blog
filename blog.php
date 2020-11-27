<?php
$user = 'root';
$password = '';

$dbConnection = new PDO('mysql:host=localhost;dbname=blogdb', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

        $sqlQuery = $dbConnection->query("SELECT * FROM `posts`");
        $urls = $sqlQuery->fetchAll();
        ?>
        
          


