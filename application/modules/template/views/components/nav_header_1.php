<style type="text/css">
    @media screen and (min-width: 980px){
        .home-logo img{
            float: right !important;
        }
    }
    @media screen and (max-width: 640px){
        .home-logo img{
            float: left !important;
        }
    }
    .home-logo img {
        height:100%;
        width:100%;
        overflow:visible;
        background-color:#fff !important;
    }
    /*    .my-menu{
            border: 1px #b26a29 solid ;
            border-top-right-radius: 2em;
            border-bottom-right-radius: 2em;
    
        }
        .my-menu li{
            border-right: 2px #b26a29 solid ;
            border-top-right-radius: 2em;
                 color:burlywood
        }*/

</style>
<div class="my-header">
    <div class="row ">
        <div class="col-md-2">
            <div class="home-logo">
                <a class="" href="#">
                    <!--                                HomesEbony-->
                    <img class="img-sresponsive" src="<?php echo site_url('assets/uploads/logo.png'); ?>" alt="Logo"  >
                </a>
            </div>
        </div>
        <div class="col-md-10 col-md-mine">
            <div class="my-menu2">
                
                            <div class="adverts" style=" height:45px;">
                
                            </div>



                <link href="<?php echo site_url('assets/plugins/megamenu/megamenu.css') ?>" media="screen" rel="stylesheet" type="text/css" />
                <script src="<?php echo site_url('assets/plugins/megamenu/megamenu.js') ?>"></script>
                <script>$(document).ready(function () {
                        $(".megamenu").megamenu();
                    });</script>

                <div class="my-menu">
                    <!--835b38--> 
                    <!-- start header menu -->
                    <ul class="megamenu skyblue">
                        <li class="active"><a class="color1" href="<?php echo site_url() ?>">Home</a></li>
                        <li><a class="color4" href="<?php echo site_url('services'); ?>">Services</a>
                        </li>
                        <li class="drop" style="" ><a class="color3" href="<?php echo site_url('property') ?>">Properties</a>


                            <ul class="dropdown">
                                <li><a class="color3"  href="#">Office</a></li>

                            </ul>


                        </li>


                        </li>

                        <li ><a class="color2" href="<?php echo site_url('products/trends'); ?>">Land For Sale</a>

                        </li>
                        <li class="" style="" ><a class="color3" href="#">Form Downloads</a>


                            <ul class="dropdown">
                                <li><a class="color3"  href="#">One</a></li>

                            </ul>


                        </li>
                        <li><a class="color4" href="<?php echo site_url('about_us'); ?>">About Us</a>

                        </li>				





                        <li><a class="color10" href="<?php echo site_url('contacts'); ?>">Contact</a>

                        </li>
                        <li><a class="color10" href="<?php echo site_url('articles'); ?>">Blogg</a>

                        </li>


                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
