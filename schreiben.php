
<?php

    $errors  = [];
    $formSent  = false;

    $created_by  = $_POST['created_by']    ?? '';
    $post_title  = $_POST['post_title']   ?? '';
    $text        = $_POST['text']   ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $created_by     = trim($created_by);
        $post_title     = trim($post_title);
        $text           = trim($text);

        if ($created_by === ''){
            $errors[] = 'Bitte geben Sie einen Namen ein.';
        }
        if ($post_title === ''){
            $errors[] = 'Bitte geben Sie einen Titel ein.';
        }
        if ($text === ''){
            $errors[] = 'Bitte geben Sie einen Text ein.';
        }
        if (count($errors) === 0) {
            $formSent = true;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="../css/styles.css"></link>

    </head>
    <body>

        <?php
            include 'nav.php' 
        ?>

            <div class="wrapper">

            <?php if ($formSent): ?>

            <h2>Formular abgesendet!</h2>
            <p>Vielen Dank für Ihre Anmeldung.</p>

            <?php else: ?>

            <h1 class="form-title">Blog</h1>

            <?php if(count($errors) > 0); ?>
                
                <ul class="error-box"> 
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error?></li>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>

        <form method="post">
            <fieldset>
                <div class="form-group">
                    <label class="form-label" for="created_by" name="created_by">Ihr Name</label><br>
                    <textarea class="form-control" type="text" id="created_by" name="created_by" rows="1" value="<?= $created_by ?? '' ?>"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="post_title" name="post_title">Titel</label><br>
                    <textarea class="form-control" type="text" id="post_title" name="post_title" rows="1" value="<?= $post_title ?? '' ?>"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="text" name="text">Text</label><br>
                    <textarea class="form-control" type="text" id="text" rows="3" name="text" value="<?= $text ?? '' ?>"></textarea>
                </div>
                <input type="submit" value="senden">
            </fieldset>
        </form>

        <?php
            include 'footer.php' 
        ?>

    </body>
</html>