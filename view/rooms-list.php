<?php
$guest = new Guest;
$title = 'GECC - Available Rooms List';
include "include/head.php";
?>

<body>
<!-- Header Start -->
<?php include "include/header.html" ?>
<!-- Header End -->

<!-- Page Banner Start -->
<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-area">
                    <h2>Rooms List</h2>
                    <p>Rk Riyasat Resorts is one of the best resort provides BANQUETS , RESTAURANTS AND ROOMS services </p>
                    <a href="index.html" class="btn btn-fill">Home</a>
                    <a href="about.html" class="btn btn-fill btn-default">About Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner End -->

<!-- About Item Start -->
<div class="about-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text">
                    <h2>Our Rooms List</h2>
                </div>
            </div>
            <?php foreach ($guest->getCategories() as $key => $room):
            $category = new Category($room->id);
            ?>
            <div class="col-md-12">
                <?php if ($key > 0): ?>
                    <hr>
                <?php endif ?>
                <?php if ($key % 2 == 0): ?>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="rooms-detail-slider simple-slider">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img src="img/about-item-3.jpg" class="img-preview" alt="About">
                                        </div>
                                        <div class="item active">
                                            <img src="img/about-item-4.jpg" class="img-preview" alt="About">
                                        </div>
                                        <div class="item">
                                            <img src="img/about-item-5.jpg" class="img-preview" alt="About">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                            <span class="slider-mover-left no-bg" aria-hidden="true">
                                                <img src="img/chevron-left.png" alt="chevron-left">
                                            </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                            <span class="slider-mover-right no-bg" aria-hidden="true">
                                                <img src="img/chevron-right.png" alt="chevron-right">
                                            </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="text">
                            <h2><?php echo $category->getName(); ?></h2>
                            <p class="text-capitalize"><?php echo $category->getDescription(); ?></p>
                            <h3>Features</h3>
                            <ul class="list-unstyled">
                                <li>Feature item</li>
                                <li>Feature item</li>
                                <li>Feature item</li>
                                <li>Feature item</li>
                            </ul>
                        </div>
                        <div>
                            <hr>
                            <div class="text-left">
                                <h2 class="h2">$230 <small> per Night</small></h2>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- About Item End -->
                </div>
                <?php else: ?>
                <div class="col-md-12">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="text">
                                <h2>Room Name</h2>
                                <p>Room Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                <h2>Features</h2>
                                <ul class="list-unstyled">
                                    <li>Feature item</li>
                                    <li>Feature item</li>
                                    <li>Feature item</li>
                                    <li>Feature item</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="rooms-detail-slider simple-slider">
                                <div id="carousel-custom2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-outer">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item">
                                                <img src="img/about-item-1.jpg" class="img-preview" alt="About">
                                            </div>
                                            <div class="item active">
                                                <img src="img/about-item-2.jpg" class="img-preview" alt="About">
                                            </div>
                                            <div class="item">
                                                <img src="img/about-item-3.jpg" class="img-preview" alt="About">
                                            </div>
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-custom2" role="button" data-slide="prev">
                                                <span class="slider-mover-left no-bg" aria-hidden="true">
                                                    <img src="img/chevron-left.png" alt="chevron-left">
                                                </span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-custom2" role="button" data-slide="next">
                                                <span class="slider-mover-right no-bg" aria-hidden="true">
                                                    <img src="img/chevron-right.png" alt="chevron-right">
                                                </span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Item End -->
                    </div>
                </div> 
                <?php endif ?>
                
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Footer Start-->
<footer class="main-footer clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                     <a href="index-2.html" class="logo">
                         <img src="img/footer-logo.png">
                     </a>
                    <div class="clearfix"></div>
                    <!-- paragraph-->
                    <p>Just 7 km From Pipli Towards Karnal,NH-1,Samana,Opp. Shakti Bhog Mill Samana, India</p>

                    <ul class="clearfix">
                        <li>
                            <a href="tel:+55-417-634-7071">
                                <i class="fa fa-phone"></i>
                                099967 89101
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@themevessel.com">
                                <i class="fa fa-envelope-o"></i>
                                info@riyasatresorts.com
                            </a>
                        </li>
                    </ul>
                    <!-- Social List-->
                    <div class="social-list clearfix">
                        <a href="https://www.facebook.com/RiyasatResorts/" class="bg-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.facebook.com/RiyasatResorts/" class="bg-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://plus.google.com/108325996483570413797" class="bg-google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="https://www.facebook.com/RiyasatResorts/" class="bg-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="https://www.facebook.com/RiyasatResorts/" class="bg-pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                    <h2>Recent Services</h2>
                    
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-1.jpg" alt="footer-img-1">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Amazing Rooms</a></h3>
                            <span>August 12, 2017</span>
                            <p>Best Rates</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-2.jpg" alt="footer-img-2">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Best Wedding</a></h3>
                            <span>August 12, 2017</span>
                            <p>Offers</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-3.jpg" alt="footer-img-3">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Best Service</a></h3>
                            <span>August 12, 2017</span>
                            <p>Discounts</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                    <h2>Tags</h2>

                    <a href="#" class="tags">Resorts</a>
                    <a href="#" class="tags">Wedding</a>
                    <a href="#" class="tags">Restaurant</a>
                    <a href="#" class="tags">Lawns</a>
                    <a href="#" class="tags">Parties</a>
                    <a href="#" class="tags">Fashion Shows</a>
                    <a href="#" class="tags">Catering</a>
                    <a href="#" class="tags">Best Chef</a>
                    <a href="#" class="tags">Theme Dedtination</a>
                    <a href="#" class="tags">Spa</a>
                    <a href="#" class="tags">Swimming Pool</a>
                    <a href="#" class="tags">Rooms</a>
                    <a href="#" class="tags">Best Amenities</a>
                    <a href="#" class="tags">Online Booking</a>
                    <a href="#" class="tags">Hotels</a>
                </div>
            </div>

            <!--div class="col-md-3 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                    <h2>Gallery</h2>
                    
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-1.jpg" alt="gallery-1">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-2.jpg" alt="gallery-2">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-3.jpg" alt="gallery-3">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-4.jpg" alt="gallery-4">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-5.jpg" alt="gallery-5">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-1.jpg" alt="gallery-1">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-2.jpg" alt="gallery-2">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-3.jpg" alt="gallery-3">
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="#">
                            <img src="img/gallery-4.jpg" alt="gallery-4">
                        </a>
                    </div>
                </div>
            </div-->
        </div>
    </div>
</footer>
<!-- Footer End-->

<!-- Sub Footer-->
<div class="sub-footer">
    <div class="container">
        <span>&copy;  2017 Riyasat Resorts. Trademarks and brands are the property of their respective owners.</span>
    </div>
</div>
<!-- Sub Footer-->

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-slider.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script src="js/app.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','www.google-analytics.com/analytics.html','ga');

    ga('create', 'UA-89110077-1', 'auto');
    ga('send', 'pageview');

</script>
</body>

<!-- Mirrored from hotel-empire.sohelrana.me/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:18:11 GMT -->

<!-- Mirrored from riyasatresorts.com/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:06:40 GMT -->
</html>