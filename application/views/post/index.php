<?php
/**
 * @var array $posts
 */
include_once __DIR__."/../../public/posts/articles.php";
    foreach ($posts as $title => $text) {
        echo"<h1>$title</h1><article>$text</article>";
    }
?>