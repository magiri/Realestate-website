<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
<style type="text/css">


    /* Carousel Header Styles */
    .header-text {
        position: absolute;
        left: 0%;
        top: 10%;
        background-color:#e8e8e8;
        height:fit-content;

        width:20%;
        /*right:auto;*/
        /*width: 96.66666666666666%;*/
        color: #fff;
    }

    .header-text h2 {
        font-size: 40px;
    }

    .header-text h2 span {
        /*background-color: #2980b9;*/
        padding: 5px;
    }

    .header-text h3 span {
        background-color: #000;
        padding: 15px;
    }

    .btn-min-block {
        min-width: 170px;
        line-height: 26px;
    }

    .btn-theme {
        color: #fff;
        background-color: transparent;
        border: 2px solid #fff;
        margin-right: 15px;
    }

    .btn-theme:hover {
        color: #000;
        background-color: #fff;
        border-color: #fff;
    }
    .my_carousel-caption{
        background:rgba(0,0,0,0.5);

    }
    .carousel{
        margin:0px;
        /*        width:100%;*/
        /*max-width:100%;*/
    }
    .carousel-control.right{
        background:none;
        color: #000;
        /*background-image:  linear-gradient(to right, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.9) 100%)*/ 
    }
    .carousel-control.left{
        background:none;
        color:#000;
/*        background-image: linear-gradient(to left, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.9) 100%) */

    }
    .slider-image{
        height:100%;
        width:100%;

        max-height:570px;
        /*float: right*/


    }
    .item{

    }
</style>
<div class="container">
    <?php
    $model = new Gen_model;
    $model->create_model('eb_images');
    $slider_images = $model->get_many_by(array('slider_image' => 1));
    if (count($slider_images)):
        ?>
        <div id="home-carousel" class="row carousel  slide col-md-mine" data-ride="carousel">

            <!-- Indicators --> 
            <ol class="carousel-indicators">

                <?php foreach ($slider_images as $key => $slider_image) : ?>
                    <li data-target="#home-carousel" data-slide-to="<?php echo $key ?>" class="<?php
                    if ($key == 0) {
                        echo "active ";
                    }
                    ?>"></li>
                    <?php endforeach ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="" >
                <?php foreach ($slider_images as $key => $slider_image) : ?>
                    <div class="item <?php
                    if ($key == 0) {
                        echo "active ";
                    }
                    ?>" style=" background-image:url('<?php echo site_url('assets/uploads/' . $slider_image->file_name) ?>');">
                        <div class="">
                            <img class='img-responsive slider-image'   src="<?php echo site_url('assets/uploads/' . $slider_image->file_name) ?>" alt="...">

                            <!-- Static Header -->
                            <?php if (strlen($slider_image->caption) > 3): ?>
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12">
                                        <h2>

                                            <span><strong><?php echo $slider_image->caption ?></strong></span>
                                        </h2>

                                    </div>
                                </div><!-- /header-text -->
                            <?php endif; ?>
                            <div class="carousel-caption hidden-xs my_carousel-caption">
                                <div class="col-md-12">
                                    <?php echo $slider_image->description; ?>
                                </div>
                            </div><!-- /header-text -->

                        </div>
                    </div>
                <?php endforeach; ?>



                <!-- Controls -->
                <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    //    $('.carousel').carousel({
    //        interval: 20
    //    })
</script>