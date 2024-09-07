<?php
$posts = json_decode(file_get_contents('posts.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog\blog.css">
</head>
<body>
    <h1>Blog</h1>
    <?php foreach ($posts as $post): ?>
        <article>
            <h2><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <p><em>By <?= $post['author'] ?> on <?= $post['date'] ?></em></p>
            <p><?= substr($post['content'], 0, 150) ?>...</p>
        </article>
    <?php endforeach; ?>
</body>
</html>
