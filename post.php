<?php
$posts = json_decode(file_get_contents('posts.json'), true);
$comments = json_decode(file_get_contents('comments.json'), true);
$post_id = $_GET['id'];

$post = null;
foreach ($posts as $p) {
    if ($p['id'] == $post_id) {
        $post = $p;
        break;
    }
}

if (!$post) {
    echo "Post not found.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title'] ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?= $post['title'] ?></h1>
    <p><em>By <?= $post['author'] ?> on <?= $post['date'] ?></em></p>
    <p><?= $post['content'] ?></p>

    <h3>Comments</h3>
    <?php foreach ($comments as $comment): ?>
        <?php if ($comment['post_id'] == $post_id): ?>
            <div>
                <p><strong><?= $comment['name'] ?>:</strong> <?= $comment['comment'] ?></p>
                <p><em><?= $comment['date'] ?></em></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <h3>Add a Comment</h3>
    <form action="comment.php" method="post">
        <input type="hidden" name="post_id" value="<?= $post_id ?>">
        <p><label for="name">Name:</label><br>
        <input type="text" name="name" required></p>
        <p><label for="comment">Comment:</label><br>
        <textarea name="comment" required></textarea></p>
        <p><input type="submit" value="Submit"></p>
    </form>
</body>
</html>
