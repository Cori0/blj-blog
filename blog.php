<?php
$user = 'root';
$password = '';

$dbConnection = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

        $sqlQuery = $dbConnection->query("SELECT * FROM `blog_db`");
        $urls = $sqlQuery->fetchAll();
        ?>
        
          


