<?php
   include 'nav.php';
    include 'moving.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"></link>
    <title>Document</title>
</head>
<body>
    
    <h2 class="linktext">
        Hier geht es zu den anderen Links:
    </h2>

    <div class="otherurls" id="otherurls">
        <?php
            $dbuser = "d041e_listuder";
            $dbpass = "12345_Db!!!";

            $dbConnection = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);

            $sqlQuery = $dbConnection->query("SELECT * FROM blog_url");
            $urls = $sqlQuery->fetchAll();


            foreach($urls as $url) {
        ?><div id="urls"><?php
                htmlspecialchars($link = '<a href="' . $url["blogUrl"] . '" target="_blank">' . $url["blogAuthor"] . '\'s Blog' . '</a>' . '<br>');
                echo $link;
        ?></div><?php
            }
        ?>
    </div>
</body>
</html>