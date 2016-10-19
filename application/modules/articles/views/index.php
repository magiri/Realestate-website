<div class="bloder-content">
    <div class="articles-content">
        <div class="container col-md-8">
            <div class="current-page" style="">
                <h4 class="heading1"> <a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a><a href="<?php echo site_url('articles'); ?>"> articles <i class="fa fa-angle-double-right"></i></a> <?php echo strtolower($title); ?></h4>
            </div> <!--current-page --> 
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
                echo '<p class="error">' .'Articles category updates have not been made' . '</p>';
            }
            ?>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <nav class="pagination showtext">
                            <?php
                            if (strlen($pagination) > 0) {
                                echo $data_info_string = count($articles) == 1 ? ($offset_data + 1) . ' OF ' . $noOfarticles :
                                ($offset_data + 1) . ' TO ' . ($offset_data + count($articles)) . ' OF ' . $noOfarticles;
                            } else {
                                //echo $noOfcategories;
                            }
                            ?>
                        </nav>
                    </div>
                    <div class="col-md-8">
                        <?php if ($pagination): ?>
                            <nav class="bottom-nav"><?php echo $pagination; ?></nav>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>


        <!--popular posts-->
        <div class="col-md-4">
            <!--popular posts-->
            <?php echo Modules::run('articles/popular'); ?>
            <!--popular posts-->
        </div>
        <div class="clearfix"></div>
    </div>
</div>