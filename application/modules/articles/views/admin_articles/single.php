<?php
if (count($article)) {
    ?>
    <div class="container-fluid" style="background:#fff; color:#000">
        <!-- Content Wrapper. Contains page content -->
        <div class="contsent-wrapper" >
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Current News & Events
                </h1>
                <div>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo site_url('articles/admin'); ?>">News</a></li>
                        <li class="active"><?php echo $article->title; ?></li>
                    </ol>
                </div>
                <div class="alert-danger error">            
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                </div>
                <div class="alert-success" style="color: green !important;">
                    <p><?php echo $this->session->flashdata('success'); ?></p>
                </div>

            </section>

            <!-- Main content -->
            <section class="constent">
                <!-- row -->
                <div class="row">
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="">                        
                                <?php
                                echo get_article_excerpt_full($article);
                                ?>                           
                                <!--action buttons-->
                                <div class="col-md-12 btn-group mybtns">
                                    <a href="<?php echo site_url('articles/admin/edit') . '/' . $article->id . '/' . $article->slug; ?>"><button type="button" class="btn btn-info">Edit</button></a>
                                    <?php echo $article->status == 1 ? '<a href="' . site_url('articles/admin/blockopt/block') . '/' . $article->id . '/' . $article->slug . '">' . '<button type="button" class="btn btn-warning">' . 'Block' . '</button>' . '</a>' : '<a href="' . site_url('sitemanagement/articles/blockopt/unblock') . '/' . $article->id . '/' . $article->slug . '">' . '<button type="button" class="btn btn-success">' . 'Unblock' . '</button>' . '</a>'; ?>
                                    <a href="<?php echo site_url('articles/admin/delete') . '/' . $article->id . '/' . $article->slug; ?>" onclick = "return confirm('You are about to delete a record. this cannot be undone. Are you sure?');"><button type="button" class="btn btn-danger">Delete</button></a>

                                </div>
                                &nbsp;
                                <!--end of action buttons-->
                            </div><!-- /.col -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.content-wrapper -->

    <?php
}
?>