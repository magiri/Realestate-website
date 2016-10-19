<style type="text/css">
    /* Main carousel style */
    .carousel {
        width:100%;
        margin:0;
        padding:0;
    }
    .carousel img {
        width:100%;
        height: 600px;
    }

    .carousel-control.right{
        background:none;
        color: #000;
    }
    .carousel-control.left{
        background:none;
        color:#000;

    }
    .my_thumb{
        max-height:600px;
        overflow-y:scroll;
        overflow-x:hidden;
    }

    .details_features{
        padding:10px;
    }
    .details_features button{
        margin:2px;
        background: no-repeat ;
        background-image:url('<?php echo site_url('assets/gencss/images/brickb.jpg') ?>');
    }
    .details_features h3{
        /*color:#ffffff;*/
    }
    .desc{
        background-color:burlywood;
        padding:5px;
    }
    .pro-profile{
        background-color: #e0dfe3;
    }
    @media screen and (min-width: 640px){
        .hide_thumb{
            display:inherit;
        }
        .detail-slider{
            height:600px;
            max-height: 600px;

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
<div class="container-fluid">


    <div class="row">
        <div class="detail-slider">
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
                                            <img alt="" class=''  title="" src="<?php echo site_url('assets/uploads/' . $image->file_name) ?>">
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


                    <div class="hide_thumb my_thumb">
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

                                </h3> </button>
                        </ul>

                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="details_features">




                <button class="btn btn-default">
                    <h3>   Price    <span class="badge">Ksh. <?php echo $p_details->price; ?></span></h3>

                </button>
                <button class="btn btn-default">                    <h3> 
                        Year Built
                        <span class="badge"><?php echo $p_details->yearbuilt; ?></span>



                    </h3> </button>
                <button class="btn btn-default">                    <h3> 
                        Number Of Units
                        <span class="badge"><?php echo $p_details->no_of_units; ?></span>



                    </h3> 
                </button>
                <button class="btn btn-default">                  
                    <h3> 
                        Size Per Unit

                        <span class="badge"><?php echo $p_details->size . ' ' . $p_details->size_unit; ?></span>


                    </h3> 
                </button>

                <button class="btn btn-default">                   
                    <h3>  
                        Bedrooms

                        <span class="badge"><?php echo $p_details->bedroom; ?></span>



                    </h3> 
                </button>
                <button class="btn btn-default">                 
                    <h3>   Baths
                        <span class="badge"><?php echo $p_details->bathroom; ?></span>
                    </h3> 
                </button>
                <button class="btn btn-default">                  
                    <h3>     Dining rooms
                        <span class="badge"><?php echo $p_details->diningroom; ?></span>
                    </h3> 
                </button>
                <button class="btn btn-default">                   
                    <h3> 
                        Living room
                        <span class="badge"><?php echo $p_details->livingroom; ?></span>
                    </h3>
                </button>





                <button class="btn btn-default">                   
                    <h3> 
                        Parking
                        <span class="badge"><?php echo $p_details->parking; ?></span>

                    </h3> 
                </button>
                <button class="btn btn-default">                    
                    <h3> 
                        Swimming Pool
                        <span class="badge"><?php echo $p_details->swimmingpool; ?></span>



                    </h3> 
                </button>
                <button class="btn btn-default">                    
                    <h3> 
                        Garden
                        <span class="badge"><?php echo $p_details->garden; ?></span>
                    </h3> 
                </button>
                <button class="btn btn-default">                    
                    <h3> 
                        Play Grounds
                        <span class="badge"><?php echo $p_details->yardgrounds; ?></span>
                    </h3>
                </button>



                <div class="desc">
                    <div class="page-header">
                        <h3> Write up </h3>

                    </div>
                    <?php echo $p_details->description; ?>
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
