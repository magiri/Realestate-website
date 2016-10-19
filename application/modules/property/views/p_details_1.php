<style type="text/css">
    /* Main carousel style */
    .carousel {
        width:100%;
        margin:0;
        padding:0;
    }
    .carousel img {
        width:100%;
        /*max-height: 600px;*/
    }

    .carousel-control.right{
        background:none;
        color: #000;
    }
    .carousel-control.left{
        background:none;
        color:#000;

    }
    .desc{
        background-color:burlywood;
        padding:5px;
    }
    .pro-profile{
        background-color: #e0dfe3;
    }
    @media screen and (min-width: 980px){
        .hide_thumb{
            display:inherit;
        }
    }
    @media screen and (max-width: 640px){
        .hide_thumb{
            display:none;
        }
        .slider-image{
            height:100%;
            width:100%;
            max-height:670px;
        }
    }
</style>
<div class=" container-fluid">


    <div class="row">
        <?php if (isset($p_details)): ?>
            <div class="col-md-9">
                <div id="home-carousel" class="carousel  slide col-md-mine" data-ride="carousel">
                    <?php
                    $model = new Gen_model;
                    $images = $model->get_property_image($p_details->id, FALSE);
                    ?>

                    <div class="carousel slide article-slide" id="article-photo-carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner cont-slider">
                            <?php if (count($images) > 0) : foreach ($images as $key => $image): ?>

                                    <div class="item <?php
                                    if ($key == 0) {
                                        echo "active ";
                                    }
                                    ?>">
                                        <img alt="" class='img-responsive'  title="" src="<?php echo site_url('assets/uploads/' . $image->file_name) ?>">
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            <?php else:
                                ?>
                                <div class="item active ">
                                    <img alt="" title="" src="<?php echo site_url('assets/uploads/logo.png') ?>">
                                </div>
                            <?php
                            endif;
                            ?>

                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#article-photo-carousel" role="button" data-slide="prev">
                            <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                            <span class="text text-aqua">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#article-photo-carousel" role="button" data-slide="next">
                <!--                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                            <span class="text text-success">Next</span>
                        </a>
                    </div>


                </div>
            </div>
            <div class="col-md-3">


                <div class="hide_thumb">
                    <ul>
                        <?php if (count($images) > 0) : foreach ($images as $key => $image): ?>
                                <li style="display:inline" class=" <?php
                                if ($key == 0) {
                                    echo "active";
                                }
                                ?>" data-slide-to="<?php echo $key ?>" data-target="#article-photo-carousel">
                                    <img class="" alt="" src="<?php echo site_url('assets/uploads/' . $image->file_name) ?>" style="height:100px; widows:150px ">

                                    <?php
                                endforeach;
                                ?>
                            <?php else:
                                ?>
                                <div class="item active ">
                                    <img alt="" title="" src="<?php echo site_url('assets/uploads/logo.png') ?>">
                                </div>
                            <?php
                            endif;
                            ?>

                        </li>
                    </ul>

                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6 col-md-mine">
                <div class="panel panel-info">
                    <div class="panel-heading" data-toggle="collapse" data-target="#demo">
                        Basic Info
                        <span class="pull-right badge badge-warning" data-toggle="collapse" data-target="#demo" style=" cursor:pointer; ">Mini</span>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">Ksh. <?php echo $p_details->price; ?></span>
                            Price


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->yearbuilt; ?></span>
                            Year Built


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->no_of_units; ?></span>
                            Number Of Units


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->size . ' ' . $p_details->size_unit; ?></span>
                            Size Per Unit


                        </li>

                    </ul>


                </div>
            </div>
            <div class="col-md-6 col-md-mine">
                <div class="panel panel-info">
                    <div class=" panel-heading " data-toggle="collapse" data-target="#demo2">
                        Basic Amedities
                        <span class="pull-right badge badge-warning" data-toggle="collapse" data-target="#demo2" style=" cursor:pointer; ">Mini</span>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->bedroom; ?></span>
                            Bedrooms


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->bathroom; ?></span>
                            Baths


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->diningroom; ?></span>
                            Dining room


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->livingroom; ?></span>
                            Living room

                        </li>

                    </ul>

                </div>

            </div>
            <div class="col-md-12 col-md-mine">
                <div class="panel panel-info">
                    <div class=" panel-heading " data-toggle="collapse" data-target="#demo3">
                        Other 
                        <span class="pull-right badge badge-warning" data-toggle="collapse" data-target="#demo3" style=" cursor:pointer; ">Mini</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->parking; ?></span>
                            Parking


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->swimmingpool; ?></span>
                            Swimming Pool


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->garden; ?></span>
                            Garden


                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $p_details->yardgrounds; ?></span>
                            Play Grounds


                        </li>

                    </ul>

                    <div class="desc">
                        <div class="page-header">
                            <h3> Write up </h3>

                        </div>
                        <?php echo $p_details->description; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<script type="text/javascript" >
// Stop carousel
//    $('.carousel').carousel({
//        interval: false
//    });
    $('.carousel').carousel({
        interval: 20
    });



</script>
