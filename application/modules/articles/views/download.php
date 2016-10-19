
<?php
date_default_timezone_set('Africa/Nairobi');
$currentDate = date('F-d-Y');
$currentTime = date("h:i:sA");
header("Content-type: application/vnd.ms-doc");
header("Content-Disposition: attachment;Filename=" . str_replace(' ', '_', $article->title) . ".doc");
//header("Content-Disposition: attachment;Filename=" . $currentDate . "_TIME_" . $currentTime . ".doc");
?>
<center>
    <h3><font style="color: #60B001"><?php echo strtoupper(config_item('site_name')); ?></font></h3>
    <h5>Website: <font><a style="color: blue" href="http://routine-health.com">www.routine-health.com</a></font></h5>
    <h5 class="text text-info">Email: <font style="color: blue">contact@routine-health.com / omarnoor811@gmail.com</font> </h5>
    <h5>Phone: <i class="fa fa-phone"></i>  +254 722 219944</h5>
    <h4>P.O BOX 46336-00100</h4>
</center>
<section>
    <hr>
    <div class="cleafix"></div>

    <div class="singeart">
        <?php echo get_article_excerpt_front_full_d($article); ?>
        <div class="cleafix"></div>
    </div>
    <hr>
    <tfoot>
    <p style="color: blue">All rights reserved. http://routine-health.com<font style="text-align: right"> &nbsp;&nbsp;&nbsp; Phone:  +254 722 219944</font></p>
</tfoot>
</section>


