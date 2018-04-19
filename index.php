<!DOCTYPE html>
<html lang="en">
<?php
    include_once('templates/header.php');
?>
<body>
    <?php
        include_once('templates/sidebar.php');

        $json = file_get_contents('data/posts.json');
        $articles = json_decode( $json, true );

        foreach ($articles as $article) {
            $title = $article['title'];
            $post_date = $article['post_date'];
            $author = $article['author'];
            $content = $article['content'];
            $category = $article['category'];
            
            echo "<h1>$title</h1>";
            echo "<p class='date'>$post_date</p>";
            echo "<p>by $author</p>";
            echo "<p>$content</p>";

            $items = join(', ', $category);
            echo "<p><span class='category'>Categorized in:</span> $items</p>";
            echo "<hr>";
        }

        include_once('templates/footer.php');
    ?>
</body>
</html>
