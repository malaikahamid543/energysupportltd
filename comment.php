<?php
$comments = json_decode(file_get_contents('comments.json'), true);

$new_comment = [
    "post_id" => $_POST['post_id'],
    "name" => $_POST['name'],
    "comment" => $_POST['comment'],
    "date" => date("Y-m-d")
];

$comments[] = $new_comment;

file_put_contents('comments.json', json_encode($comments, JSON_PRETTY_PRINT));

header("Location: post.php?id=" . $_POST['post_id']);
