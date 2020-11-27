
<?php 
    include 'views/nav.php';    
    include 'views/blog.php';
    include 'views/moving.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $created_by  = trim($_POST['created_by'])    ?? '';
        $post_title  = trim($_POST['post_title'])    ?? '';
        $post_text   = trim($_POST['post_text'])     ?? '';
        $link        = trim($_POST['link'])          ?? '';

        $statement = $dbConnection->prepare("INSERT INTO `posts` (created_at, created_by, post_title, post_text, link) VALUES(now(), :created_by, :post_title, :post_text, :link)");
        $statement->execute([':created_by' => $created_by, ':post_title' => $post_title, ':post_text' => $post_text, ':link' => $link]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
    <meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'">
    <meta http-equiv="X-WebKit-CSP" content="default-src 'self'; script-src 'self'">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css"></link>
</head>
<body>

<div id="trigger">

    <li id="newpost"><a href="#add-new-post-form">Neuen Beitrag hinzufügen</a></li><br>



    </div>
        <?php
            $statement = $dbConnection->query('SELECT * FROM posts order by created_at desc');
            foreach($statement->fetchAll() as $posts) {
        ?><div id="blogpost"><?php
                echo '<p id="name" class="blog">'. $posts["created_by"]. '</p>';   
                echo '<p id="title" class="blog">'. $posts["post_title"]. '</p>';  
                echo '<p id="text" class="blog">'. $posts["post_text"]. '</p>';
                echo '<p id="time" class="blog">'. $posts["created_at"]. '</p>';
                echo "<br><img src>".'<br>';
        ?></div><?php
            }
        ?>


        <form action="schreiben.php" method="post" id="add-new-post-form">
                <legend class="form-legend">Blog</legend>   
                <div class="created_by"><br>
                    <label for="created_by">Name:</label><br>
                    <input type="text" id="created_by" name="created_by" value="<?=htmlspecialchars( $created_by ?? '' )?>"><br>
                </div><br>

                <div class="post_title"><br>
                    <label for="post_title">Titel:</label><br>
                    <input type="text" id="post_title" name="post_title" value="<?=htmlspecialchars($post_title ?? '' )?>"><br>
                </div><br>
                
                <div class="post_text">
                    <label for="post_text">Beitrag:</label><br>
                    <textarea name="post_text" rows="15" cols="60" value="<?=htmlspecialchars($post_text ?? '' )?>"></textarea>
                </div><br>
                <div class="bild">
                    <label class="form-label" for="link" name="link">Link vom Bild:</label><br>
                    <textarea class="form-control" type="text" id="link" name="link" rows="1" cols="68" value="<?= htmlspecialchars($created_by ?? '' )?>"></textarea>
                </div>      

                <form method="post">
                    <input class="submit" type="submit" value="Absenden"/>
                    
                </form>       
        </form>
</body>
</html>

<!-- INSERT INTO posts (created_at, created_by, post_text, post_title) 
 VALUES(now(), 'Corinne', 'Das war ein toller Tag! So schönes Wetter!', 'Ausflug im BLJ') -->