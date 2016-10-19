<style type="text/css">
    .ebony-reason-desc{
        border:1px  #74451B solid;
        border-top:none;
        padding:4px;
        font-size:14px;
        height:200px;
        overflow: hidden;
    }
</style>
<div class="container-fluid">

    <div class="page-header">
        <h1 class="text text-center">Why Ebony Estates</h1>
    </div>
    <?php
    $model = new Gen_model;
    $model->create_model('pages');
    $pages = $model->get_many_by(array('home_location' => array(1, 2, 3)));
    
    ?>
    <?php foreach ($pages as $page): ?>
    <div class="col-md-4" style="margin-top:20px; min-width:203px; ">
        <div style=" border:none  #74451B solid;" >


            <img style="height:200px;width:100%" src='<?php echo site_url('assets/uploads/'.$page->image) ?>'>
            <div class="ebony-reason-desc">
                <a href="<?php echo site_url('pages/view/'.$page->slug) ?>">
                    <h3 class="text" style="color: #74451B;" >
                       <?php Echo $page->name ?>
                    </h3>
                </a>



                <?php echo $page->content ?>



            </div>



        </div>
    </div>
    <?php endforeach; ?>

</div>