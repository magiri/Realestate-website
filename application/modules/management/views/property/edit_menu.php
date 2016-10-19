<style type="text/css">

    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #fff;
        background-color: #428bca;
    }

    .margintop20 {
        /*margin-top:20px;*/
    }

    .nav-pills>li>a {
        border-radius: 0px;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    a:hover {
        color: #000;
        text-decoration: none;
    }

    .nav-stacked{
        /*border:1px solid #dadada;*/
    }
    .nav-stacked>li+li {
        margin-top: 0px;
        margin-left: 0;
        border-bottom:1px solid #dadada;
        border-left:1px solid #dadada;
        border-right:1px solid #dadada;
    }

    .active2 {
        color: #fff;
        background-color: #428bca;
    }
</style>


<div class="column margintop20">

    <ul class="nav nav-pills nav-stacked">
        <li class="bg-green-active">
            <a href="#"><h5 class="text text-bold">Menu</h5></a>
        </li>
        <?php if (isset($property_id)and $property_id > 0): ?>
            <?php $active = ''; ?>
            <?php $this->uri->segment(3) == 'edit_basic_info' ? $active = 'active' : $active = ''; ?>
            <li class="<?php echo $active ?>">
                <a href="<?php echo site_url('management/property/edit_basic_info/' . $property_id) ?>">Information</a>
            </li>
            <?php $this->uri->segment(3) == 'edit_features' ? $active = 'active' : $active = ''; ?>
            <li class="<?php echo $active ?>">
                <a href="<?php echo site_url('management/property/edit_features/' . $property_id) ?>">Features</a>
            </li>
            <?php $this->uri->segment(3) == 'edit_images' ? $active = 'active' : $active = ''; ?>
            <li class="<?php echo $active ?>">
                <a href="<?php echo site_url('management/property/edit_images/' . $property_id) ?>">Images</a>
            </li>


        <?php else: ?>

            <li><a href="#"> New Property </a></li>
        <?php endif; ?>
        <li><a class="bg-red-active" href="<?php echo site_url('management/property/all') ?>" class=""> << Back To all Properties </a></li>
    </ul>

</div>