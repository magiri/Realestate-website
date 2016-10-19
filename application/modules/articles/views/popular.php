<?php
if (count($popular_posts)) {
    ?>
    <div class="current-page">
        <h4 class="heading1">Popular News</h4>
    </div>
    <div class="popular-posts">
        <?php
        foreach ($popular_posts as $article) {
            echo get_popular_articles($article);
        }
        ?>
    </div>

    <?php
}
?>