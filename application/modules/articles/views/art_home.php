<div class="">
    <?php
    if (count($articles)) {
        foreach ($articles as $article) {
            ?>  
            <div class="singeart">
                <?php echo get_article_excerpt_front($article); ?>
                <div class="clearfix"></div>
            </div>
            <?php
        }
        ?>

        <?php
    } else {
        echo '<p class="error show">' . ucfirst('no updates have been made recently') . '</p>';
    }
    ?>

</div>