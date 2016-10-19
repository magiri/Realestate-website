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
        margin-bottom:20px;
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
        /*background-color:burlywood;*/
        padding:5px;
    }
    .pro-profile{
        background-color: #e0dfe3;
    }
    .prop-heading {
        border-bottom: 2px solid #74451b ;
        margin-top: 7%;
    }
    @media screen and (min-width: 640px){
        .hide_thumb{
            display:inherit;
        }
        .detail-slider{
            height:100%;

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
            max-height:600px;
        }

    }
    .my-badge {
        background-color: #fff;
        border-radius: 10px;
        color: #000;
        display: inline-block;
        /*font-size: 14px;*/
        /*        font-weight: 700;
                line-height: 1;*/
        min-width: 10px;
        padding: 3px 7px;
        text-align: center;
        vertical-align: middle;
        /*white-space: nowrap;*/
    }
    .fff {
        color:#fff; 
    }

</style>
<div class="container-fluid" style="background-color:#fff;">
    <?php if (isset($p_details) and $p_details != NULL): ?>
        <div class="page-header">
            <h3> <?php echo $p_details->name ?></h3>
        </div>



        <div class="row-fluid details_features">

            <div class="col-md-6">
                <?php
                $model = new Gen_model;
                $image = $model->get_property_image($p_details->id, true);
                ?>

                <?php if ($image == NULL): ?>
                    <div class="prop-heading">
                        <h3 class=""> Main Image Missing </h3>

                    </div>
                    <img class="" style="width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/logo.png') ?>'>
                <?php else: ?>
                    <div class="prop-heading">
                        <h3 class=""> <?php echo $image->caption ?> </h3>

                    </div>
                    <img class="" style="width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/' . $image->file_name) ?>'>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="desc">
                    <div class="prop-heading">
                        <h3 class=""> Basic Information </h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <h4>   Price : </h4>  
                            </td>
                            <td>
                                <h4 >
                                    <?php echo $p_details->price ?>
                                </h4>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>   Size </h4>  
                            </td>
                            <td>
                                <h4 >
                                    <?php echo ($p_details->size . $p_details->size_unit) ?>
                                </h4>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>   Year Built : </h4>  
                            </td>
                            <td>
                                <h4 >
                                    <?php echo ($p_details->yearbuilt) ?>
                                </h4>  
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <div class="col-md-6">
                <div class="desc">
                    <div class="prop-heading">
                        <h3 class=""> Location </h3>

                    </div>
                    <?php echo $p_details->address; ?>
                </div>

            </div>

            <div class="col-md-12">
                <div class="prop-heading">
                    <h3 class=""> Features </h3>

                </div>
                <?php
                if (isset($p_features)):foreach ($p_features as $feature):
                        $feature_details = $this->Gen_model->get_feature_name($feature->feature_id);
                        ?>
                        <button class="btn btn-default">                  
                            <h3 class="fff"> 
                                <?php echo $feature_details->name ?>




                            </h3> 
                            <h3 class="my-badge"><?php echo $feature->value ?></h3>
                        </button>
                        <?php
                    endforeach;
                endif;
                ?>

            </div>



            <div class="col-md-12">
                <div class="desc">
                    <div class="prop-heading">
                        <h3 class=""> Description </h3>

                    </div>
                    <?php echo $p_details->description; ?>
                </div>

            </div>
        </div>

        <link rel="stylesheet" href="<?php echo site_url('assets/plugins/maginificpopup/style.css') ?>">

        <script type="text/javascript" src="<?php echo site_url('assets/plugins/maginificpopup/js.js') ?>"></script>
        <?php $images = $model->get_property_image($p_details->id, FALSE); ?>
        <?php if (count($images)): ?>
            <!------------------------------------------------------------start of units images---------------------------------------------------------------------------------------->
            <div class="col-md-12">

                <div class="desc">
                    <div class="prop-heading row-fluid">
                        <h3>Unit Images</h3>
                    </div>
                    <div class="parent-container">
                        <?php foreach ($images as $image): ?>
                            <div class="col-md-4" style="margin-top:2%;">
                                <a href="<?php echo site_url('assets/uploads/' . $image->file_name); ?>">
                                    <img class="img-responsive thumbnail" alt="<?php echo $image->caption; ?>" src="<?php echo site_url('assets/uploads/' . $image->file_name); ?>" />
                                    <h6><?php echo $image->caption; ?></h6>
                                </a>

                            </div>
                        <?php endforeach; ?>

                        <!---------------------------------------------------------end of units images------------------------------------------------------------------------------------------->
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<script type="text/javascript" >
    // Stop carousel
    //    $('.carousel').carousel({
    //        interval: false
    //    });
//    $('.carousel').carousel({
//        interval: 20
//    });


    $(document).ready(function () {
        $('.parent-container').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            gallery: {
                enabled: true
            },
            type: 'image'
                    // other options
        });

    });
</script>
