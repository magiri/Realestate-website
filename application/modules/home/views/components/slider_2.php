<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">

<style type="text/css">
    /*
Bootstrap Image Carousel Slider with Animate.css
Code snippet by Hashif (http://hashif.com) for Bootsnipp.com
Image credits: unsplash.com
    */
    @import url(https://fonts.googleapis.com/css?family=Quicksand:400,700);

    body {
        font-family: 'Quicksand', sans-serif;
        font-weight:700;
    }





    /********************************/
    /*          Main CSS     */
    /********************************/


    #first-slider .main-container {
        padding: 0;
    }


    #first-slider .slide1 h3, #first-slider .slide2 h3, #first-slider .slide3 h3, #first-slider .slide4 h3{
        color: #fff;
        font-size: 30px;
        text-transform: uppercase;
        font-weight:700;
    }

    #first-slider .slide1 h4,#first-slider .slide2 h4,#first-slider .slide3 h4,#first-slider .slide4 h4{
        color: #fff;
        font-size: 30px;
        text-transform: uppercase;
        font-weight:700;
    }
    #first-slider .slide1 .text-left ,#first-slider .slide3 .text-left{
        padding-left: 40px;
    }


    #first-slider .carousel-indicators {
        bottom: 0;
    }
    #first-slider .carousel-control.right,
    #first-slider .carousel-control.left {
        background-image: none;
    }
    #first-slider .carousel .item {
        min-height: 425px; 
        height: 100%;
        width:100%;
    }

    .carousel-inner .item .container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }


    #first-slider h3{
        animation-delay: 1s;
    }
    #first-slider h4 {
        animation-delay: 2s;
    }
    #first-slider h2 {
        animation-delay: 3s;
    }


    #first-slider .carousel-control {
        width: 6%;
        text-shadow: none;
    }


    #first-slider h1 {
        text-align: center;  
        margin-bottom: 30px;
        font-size: 30px;
        font-weight: bold;
    }

    #first-slider .p {
        padding-top: 125px;
        text-align: center;
    }

    #first-slider .p a {
        text-decoration: underline;
    }
    #first-slider .carousel-indicators li {
        width: 14px;
        height: 14px;
        background-color: rgba(255,255,255,.4);
        border:none;
    }
    #first-slider .carousel-indicators .active{
        width: 16px;
        height: 16px;
        background-color: #fff;
        border:none;
    }


    .carousel-fade .carousel-inner .item {
        -webkit-transition-property: opacity;
        transition-property: opacity;
    }
    .carousel-fade .carousel-inner .item,
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        opacity: 0;
    }
    .carousel-fade .carousel-inner .active,
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }
    .carousel-fade .carousel-inner .next,
    .carousel-fade .carousel-inner .prev,
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-control {
        z-index: 2;
    }

    .carousel-control .fa-angle-right, .carousel-control .fa-angle-left {
        position: absolute;
        top: 50%;
        z-index: 5;
        display: inline-block;
    }
    .carousel-control .fa-angle-left{
        left: 50%;
        width: 38px;
        height: 38px;
        margin-top: -15px;
        font-size: 30px;
        color: #fff;
        border: 3px solid #ffffff;
        -webkit-border-radius: 23px;
        -moz-border-radius: 23px;
        border-radius: 53px;
    }
    .carousel-control .fa-angle-right{
        right: 50%;
        width: 38px;
        height: 38px;
        margin-top: -15px;
        font-size: 30px;
        color: #fff;
        border: 3px solid #ffffff;
        -webkit-border-radius: 23px;
        -moz-border-radius: 23px;
        border-radius: 53px;
    }
    .carousel-control {
        opacity: 1;
        filter: alpha(opacity=100);
    }


    /********************************/
    /*       Slides backgrounds     */
    /********************************/
        #first-slider  {
            /*background-image: url(http://s20.postimg.org/h50tgcuz1/image.jpg);*/
            background-size: cover;
            background-repeat: no-repeat;
        }
        #first-slider .slide2 {
            /*background-image: url(http://s20.postimg.org/uxf8bzlql/image.jpg);*/
            background-size: cover;
            background-repeat: no-repeat;
        }
        #first-slider .slide3 {
            /*background-image: url(http://s20.postimg.org/el56m97f1/image.jpg);*/
            background-size: cover;
            background-repeat: no-repeat;
        }
        #first-slider .slide4 {
            /*background-image: url(http://s20.postimg.org/66pjy66dp/image.jpg);*/
            background-size: cover;
            background-repeat: no-repeat;
        }




    /********************************/
    /*          Media Queries       */
    /********************************/
    @media screen and (min-width: 980px){

    }
    @media screen and (max-width: 640px){

    }


</style>
<script type="text/javascript">
    (function ($) {

        //Function to animate slider captions 
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                        $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load 
        var $myCarousel = $('#carousel-example-generic'),
                $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

        //Initialize carousel 
        $myCarousel.carousel();

        //Animate captions in first slide on page load 
        doAnimations($firstAnimatingElems);

        //Pause carousel  
        $myCarousel.carousel('pause');


        //Other slides to be animated on carousel slide event 
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
        $('#carousel-example-generic').carousel({
            interval: 3000,
            pause: "false"
        });

    })(jQuery);


</script>

<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <?php for($i=1;$i<=10;$i++): ?>
            
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
          
            <?php endfor; ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
             <?php for($i=1;$i<=10;$i++): ?>
            <!-- Item 1 -->
            <div class="item <?php if($i==1){echo "active ";}  echo'slide'.$i ;?>" style="background-image: url(<?php echo site_url('assets/dimages/alila/0'.$i.'.jpg') ?>);background-size: cover;
            background-repeat: no-repeat;">
                <div class="row">
                    <div class="container">
                        <div class="col-md-3 text-right" >
                            <img style="max-width: 200px;"  data-animation="animated zoomInLeft" src="http://s20.postimg.org/pfmmo6qj1/window_domain.png">
                        </div>
                        <div class="col-md-9 text-left">
                            <h3 data-animation="animated bounceInDown">Add images, or even your logo!</h3>
                            <h4 data-animation="animated bounceInUp">Easily use stunning effects</h4>             
                        </div>
                    </div>
                </div>
            </div> 
            <?php endfor; ?>
            <!-- Item 2 -->
           
            <!-- End Item 4 -->

        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>


<footer>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 text-center">

            <h6>Coded with <i class="fa fa-heart red" style="color: #BC0213;"></i> by <a href="http://hashif.com" target="_blank">Hashif</a></h6>
        </div>   
    </div>
</footer>