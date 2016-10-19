<?php
if (count($articles)) {
    ?>
    <div class="recent-articles">
        <div>
            <h3>recent articles</h3>

            <?php
            foreach ($articles as $article) {
                ?>            
                <div class="col-md-6"> 
                    <div class="home-recent">
                        <?php
                        echo get_recent_articles($article);
                        ?>
                    </div>
                    <div class="cleafix"></div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?> 
