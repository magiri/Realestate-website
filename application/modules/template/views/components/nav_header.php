<style type="text/css">
    @media screen and (min-width: 980px){
        .ebony-logo{
            margin-bottom:-60px;
            z-index:1;
        }
    }
    .ebony-logo img{
        width:100%;
        background-color:#fff;
    }
</style>

<div class="row my-header">
    <div class="col-md-2 ebony-logo">
        <img class="img-responsive" src="<?php echo site_url('assets/uploads/logo.png'); ?>" alt="Logo" >
    </div>

    <link href="<?php echo site_url('assets/plugins/megamenu/megamenu.css') ?>" media="screen" rel="stylesheet" type="text/css" />
    <script src="<?php echo site_url('assets/plugins/megamenu/megamenu.js') ?>"></script>
    <script>$(document).ready(function () {
            $(".megamenu").megamenu();
        });</script>

    <div class=" col-md-10 col-md-offset-2 my-menu">
        <!--835b38--> 
        <!-- start header menu -->
        <ul class="megamenu skyblue">

            <li class="active"><a class="color1" href="<?php echo site_url() ?>">Home</a></li>
            <li><a class="color4" href="<?php echo site_url('services'); ?>">Services</a>
            </li>
            <li class="drop" style="" ><a class="color3" href="<?php echo site_url('property') ?>">Properties</a>
                <?php
                $model = new Gen_model;
                $model->create_model('categories');
                $cats = $model->get_all();
                ?>
                <?php if($cats!==NULL): ?>


                <ul class="dropdown">

                    <?php foreach ($cats as $cat): 
                    ?>

                    <li><a class="color3"  href="<?php echo site_url('property/sort/'.$cat->id) ;?>"><?php echo ($cat->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <?php endif; ?>
            </li>


            </li>

            <li ><a class="color2" href="<?php echo site_url('property/land_properties'); ?>">Land For Sale</a>

            </li>

            <li><a class="color4" href="<?php echo site_url('about-us'); ?>">About Us</a>

            </li>				





            <li><a class="color10" href="<?php echo site_url('contacts'); ?>">Contact</a>

            </li>
            <li><a class="color10" href="<?php echo site_url('articles'); ?>">Blogg</a>

            </li>


        </ul> 
    </div>
</div>



