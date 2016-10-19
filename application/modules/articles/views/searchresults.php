<div class="bloder-content">
    <div class="articles-content">
        <!--search-->
        <div class="searchresults">          
            <!--event search results-->
            <?php
            if (count($results)) {
                ?>
            <div class="viewart-result">
                <h1 class="h2-heading">Search Results</h1>                   
                    <?php
                    foreach ($results as $article) {
                        echo '<div class="article">';
                        $text = substr($article['body'], 0, 500);
                        echo '<h2>' . anchor('articles/viewart/' . $article['id'] . '/' . $article['slug'], ucfirst($article['title'])) . '</h2>';
                        echo '<h3>'.'<i class="fa fa-calendar"></i>  ' . $article['pubdate'] . ', ' . '</h3>';
                        echo '<p>' . strip_tags($text) . '... ' . anchor('articles/viewart/' . $article['id'] . '/' . $article['slug'], '[Read More]') . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php
            } else {
                echo '<p class="error">' . 'Soryy no result was found' . '</p>';
            }
            ?>

            <!--event search results-->


        </div>
    </div>
</div>