<?php $this->load->view('components/css_and_js'); ?>
<div class="container-fluid">
    <div class="bloder-content">
        <div class="articles-content">
            <div class="col-md-3">
                <div class="">
                    <div class="current-page">
                        <h4  class="heading1">Sort</h4>
                    </div>
                    <div class="popular-posts">
                        <?php
                        if (count($menu_list > 0)) {
                            ?>
                            <article class="article">
                                <h5 class="text text-info"><?php echo anchor('articles', 'All'); ?></h5>
                                <div class="clearfix"></div>
                            </article>
                            <?php
                            foreach ($menu_list as $row) {
                                ?>
                                <article class="article">
                                    <h5 class="text text-info"><a href="<?php echo site_url('articles/sort') . '/' . $row->id . '/' . $row->slug; ?>"><?php echo $row->title; ?></a></h5>
                                    <div class="clearfix"></div>
                                </article>
                                <?php
                            }
                            ?>

                            <?php
                        }
                        ?>           
                    </div>
                </div>
                <?php echo Modules::run('articles/popular'); ?>
            </div>
            <div class="container col-md-9">
                <div class="current-page" style="">
                    <h4 class="heading1 text-capitalize"> <a href="<?php echo site_url('articles'); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a><?php echo strtolower($title); ?></h4>
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
                    echo '<p class="error show">' . ucfirst('no updates have been made recently') . '</p>';
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

            <div class="clearfix"></div>
        </div>
    </div>
</div>

