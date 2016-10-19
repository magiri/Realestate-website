<script src="<?php echo site_url('assets/plugins/bootstrap-news/jquery.bootstrap.newsbox.js') ?>" type="text/javascript"></script>
<style type="text/css">
    .news-img{
        width:100%;
        min-height:210px;
    }
    .news-item{
        width:100%;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel-news">

            <div class="panel-newss">
                <div class="upcoming" style="overflow-y: hidden; height: 210px;">
                    <?php
                    $model = new Gen_model;
                    $model->create_model('eb_images');
                    $slider_images = $model->get_many_by(array('upcoming_project' => 1));
                    ?>
                    <?php foreach ($slider_images as $key => $slider_image) : ?>
                        <div  style="" class="news-item">
                            <img class="news-img" src="<?php echo site_url('assets/uploads/'.$slider_image->file_name) ?>">

                        </div>
                        
                    <?php endforeach; ?>
                </div>


            </div>

        </div>
    </div>

</div>
<script type="text/javascript">

    $(function () {
        $(".upcoming").bootstrapNews({
            newsPerPage: 1,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 1000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>