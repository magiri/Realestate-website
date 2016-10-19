<style type="text/css">
    .posts_body{
        background-color:#fff;
        color:#000;
        padding:10px;
        border-radius: 9px;
    }  

</style>
<div class="posts_body">
    <!-- Content Wrapper. Contains page content -->
    <div class="constent-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                News and Blog Articles
            </h1>
            <h2><small>  <?php echo anchor('articles/admin/edit', '<i class="fa fa-plus">' . '</i>' . 'Add New Post'); ?></small></h2>
             <div class="row">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('sitemanagement'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Articles</li>
                </ol>
            </div>
            <div class="error">            
                <p><?php echo $this->session->flashdata('error'); ?></p>
            </div>
            <div class="success" style="color: green !important;">
                <p><?php echo $this->session->flashdata('success'); ?></p>
            </div>
           
        </section>

        <!-- Main content -->
        <section class="contsent">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php if (count($articles)) { ?>

                            <?php
                            foreach ($articles as $article) {
                                ?>
                                <div class="article-st">
                                    <div>
                                        <div class="article" style="padding:1em">
                                            <?php
                                            echo get_article_excerpt($article);
                                            ?>
                                            <div class="clearfix"></div>
                                            <div>
                                                Tag: 
                                                <?php
                                                if (count($menu_cont)) {
                                                    foreach ($menu_cont as $menu) {
                                                        if ($menu->id == $article->category) {
                                                            echo '<label class="label label-info">' . $menu->title . '</label>';
                                                        }
                                                    }
                                                };
                                                ?>
                                            </div>
                                        </div>
                                        <!--action buttons-->
                                        <div class="col-md-12 btn-group mybtns" style="margin-bottom: 1em">
                                            <a href="<?php echo site_url('articles/admin/edit') . '/' . $article->id . '/' . $article->slug; ?>"><button type="button" class="btn btn-info">Edit</button></a>
                                            <?php echo $article->status == 1 ? '<a href="' . site_url('articles/admin/blockopt/block') . '/' . $article->id . '/' . $article->slug . '">' . '<button type="button" class="btn btn-warning">' . 'Block' . '</button>' . '</a>' : '<a href="' . site_url('articles/admin/blockopt/unblock') . '/' . $article->id . '/' . $article->slug . '">' . '<button type="button" class="btn btn-success">' . 'Unblock' . '</button>' . '</a>'; ?>
                                            <a href="<?php echo site_url('articles/admin/delete') . '/' . $article->id . '/' . $article->slug; ?>" onclick = "return confirm('You are about to delete a record. this cannot be undone. Are you sure?');"><button type="button" class="btn btn-danger">Delete</button></a>
                                            <!--<a href="<?php echo site_url('articles/admin/broadcast') . '/' . $article->id . '/' . $article->slug; ?>"><button type="button" class="btn btn-info">Broadcast Newsletter</button></a>-->

                                        </div>
                                        &nbsp;
                                        <!--end of action buttons-->
                                    </div>
                                       <hr>
                                    <div class="clearfix"></div>
                                 
                                    
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                        }
                        ?>                    
                        <div class="col-md-9">
                            <div class="col-md-3">
                                <nav class="dataTables_info pagination showtext">
                                    <?php
                                    if (strlen($pagination) > 0) {
                                        echo $data_info_string = count($events) == 1 ? ($offset_data + 1) . ' OF ' . $noOfevents :
                                        ($offset_data + 1) . ' TO ' . ($offset_data + count($events)) . ' OF ' . $noOfevents . ' EVENTS';
                                    } else {
                                        //echo $noOfcategories;
                                    }
                                    ?>
                                </nav>
                            </div>
                            <div class="col-md-6">
                                <?php if ($pagination): ?>
                                    <nav class="dataTables_paginate paging_bootstrap"><?php echo $pagination; ?></nav>
                                <?php endif; ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- /.content-wrapper -->