
<?php 
    include 'nav.php';    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $created_by  = trim($_POST['created_by'])    ?? '';
        $post_title  = trim($_POST['post_title'])  ?? '';
        $post_text   = trim($_POST['post_text'])   ?? '';

        $statement = $dbConnection->prepare("INSERT INTO `blog_db` (created_at, created_by, post_title, post_text) VALUES(now(), :created_by, :Post_title, :post_text)");
        $statement->execute([':created_by' => $created_by, ':post_title' => $post_title, ':post_text' => $post_text]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<a href="#add-new-post-form" >Neuen Beitrag hinzufügen</a>
<?php
include 'blog.php';
?>

    <form action="blog.php" method="post" id="add-new-post-form">
        <div class="created_by"><br>
            <label for="created_by">created_by:</label><br>
            <input type="text" id="created_by" name="created_by" value="<?= $created_by ?? '' ?>"><br>
        </div><br>

        <div class="post_title"><br>
            <label for="post_title">Titel:</label><br>
            <input type="text" id="post_title" name="post_title" value="<?= $post_title ?? '' ?>"><br>
        </div><br>
        
        <div class="post_text">
            <label for="post_text">Beitrag:</label><br>
            <textarea name="post_text" rows="15" cols="60" value="<?= $post_text ?? '' ?>"></textarea> 
        </div>

        <form method="post">
            <input class="submit" type="submit" value="Submit"/>
            </form>      
    </form>
</body>
</html>

<!-- INSERT INTO posts (created_at, created_by, post_text, post_title) 
 VALUES(now(), 'Corinne', 'Das war ein toller Tag! So schönes Wetter!', 'Ausflug im BLJ') -->