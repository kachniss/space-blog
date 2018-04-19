<!DOCTYPE html>
<html lang="en">
<?php
    include_once('templates/header.php');
?>
<body>
    <div class="content">
        <div class="sidebar">
            <?php
                include_once('templates/sidebar.php');
            ?>
        </div>
        <main>
            <?php
                require_once('lib/functions.php');

                $json = file_get_contents('data/posts.json');
                $articles = json_decode( $json, true );

                usort($articles, 'sort_array');

                foreach ($articles as $article) {
                    $title = $article['title'];
                    $post_date = date("F d, Y", $article['post_date']);
                    $author = $article['author'];
                    $content = $article['content'];
                    $category = $article['category'];
                    
                    echo "<h1>$title</h1>";
                    echo "<p class='date'>$post_date</p>";
                    echo "<p>by $author</p>";
                    echo "<p>$content</p>";

                    $items = join(', ', $category);
                    $items = ucwords($items);
                    echo "<p><span class='category'>Categorized in:</span> $items</p>";
                    echo "<hr>";
                }
            ?>
        </main>

        <footer>
            <?php
                include_once('templates/footer.php');
            ?>
        </footer>
    </div>
</body>
</html>
