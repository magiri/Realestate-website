<style>
    .readmore{
        padding:20px;
        margin-top:20px;
        background-color:#fff;
    }
    .readmore_title{
        margin-top:20px;
        /*height:97px;*/
        border-bottom:1px #e0dfe3 solid;

    }
    .readmore_title h3{
        text-transform: capitalize;
        font-size: 2em;
        font-weight:bold;

    }
    .readmore_body{
        padding: 20px;
        font-size:0.94em;
    }
</style>
<div class="container-fluid readmore">
    <div class="row" >

        <div class="row">
            <div class="col-md-3" >
                <img src="<?php echo site_url('assets/uploads/' . $service->img_url); ?>" alt="<?php echo $service->title; ?>" class="thumbnail" height="97" width="100%" >
            </div>
            <div class="col-md-9 readmore_title" >

                <h3><?php echo $service->title; ?> </h3>

            </div>
        </div>


        <div class="row readmore_body">


            <?php print_r($service->body); ?>
        </div>

        <div > 
            <a href="<?php echo site_url('services'); ?>" class="button">Back to Services</a>
        </div>

    </div>
</div>

