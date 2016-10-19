<?php $this->load->view('components/css_and_js'); ?>
<div class="container">
    <div class="bloder-content">
        <div class="articles-content">                
            <div class="col-md-9">
                <div class="current-page">
                    <h4 class="heading1 text-capitalize"> <a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a><a href="<?php echo site_url('articles'); ?>"> articles <i class="fa fa-angle-double-right"></i></a> <a href="<?php echo site_url($prev_url); ?>"><?php echo strtolower($title_prev); ?> <i class="fa fa-angle-double-right"></i></a> <?php echo strtolower($article->title); ?></h4>
                </div> <!--current-page --> 
                <div class="singeart">
                    <?php echo get_article_excerpt_front_full($article); ?>
                </div>

            </div>   

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
            <div class="clearfix"></div>
        </div>
    </div>
</div>

