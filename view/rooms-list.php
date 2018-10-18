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

<!-- Section-2 Start-->
<div class="Section-2 content-area ">
    <div class="container">
            <div class="testimonials-2">
                <div id="carouse2-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                    
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($guest->getCategories() as $key => $room):
                        $category = new Category($room->id);
                        ?>
                        <div class="item <?php echo $key==0 ? 'active' : ''; ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-pad" style="background: url('');">
                                        <img src="<?php echo $category->getImages()[0]->image; ?>" alt="room01" class="img-responsive">
                                        <!-- <img src="img/room01.jpg" alt="room01" class="img-responsive"> -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 details">
                                        <h3><?php echo $category->getName(); ?></h3>
                                        <h4>Room Details</h4>
                                        <ul>
                                            <li>
                                                <strong>Guests:</strong> <?php echo $category->getAdult(); ?>
                                            </li>
                                            <li>
                                                <strong>Children:</strong> <?php echo $category->getChild(); ?>
                                            </li>
                                            <li>
                                                <u>Features / Amenities</u>
                                            </li>
                                            <?php foreach ($category->getAmenities() as $key => $value): ?>
                                                <li>
                                                   <strong><?php echo $category->getAmenityName($value->amenity_id); ?></strong>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                        <div class="price">
                                            Rates from  <span class="amount"> $<?php echo $category->getPrice(); ?>.00</span> per night
                                        </div>
                                        <a target="_blank" class="btn btn-fill" href="room-details?rid=<?php echo $room->id; ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carouse2-example-generic" role="button" data-slide="prev">
                    <span class="slider-mover-left" aria-hidden="true">
                        <img src="img/chevron-left.png" alt="left-chevron">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carouse2-example-generic" role="button" data-slide="next">
                    <span class="slider-mover-right" aria-hidden="true">
                        <img src="img/chevron-right.png" alt="right-chevron">
                    </span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius: 0px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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