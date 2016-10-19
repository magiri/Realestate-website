<link href="<?php echo site_url('assets/services/services.css'); ?>" rel="stylesheet" />
<div class="container-fluid">

    <div class="row" >
        <?php if (count($services)):foreach ($services as $service): ?>
                <div class="col-md-12" style="min-height:300px" >
                    <div class="serv">
                        <div class="page-header">
                            <h3 class=""><?php echo $service->title; ?></h3>
                        </div>
                        <div class="serv-desc">
                            <div style="" class="col-md-3 icon_img">
                                <img class="" alt="<?php echo $service->title; ?>" src="<?php echo site_url('assets/uploads/' . $service->img_url); ?>" width="100%" height="100%">
                            </div>

                            <div class="col-md-9 "> 
                                <?php echo character_limiter($service->body, 400); ?>

                            </div>
                            <a href="<?php echo site_url('services/read_more/' . $service->id); ?>" class="btn btn-ebony-color pull-right">Read More...</a>
                            <div class=" clearfix "></div>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        else:
            ?>
            <h2>Coming Soon</h2>
        <?php endif; ?>

    </div>

</div>


