<?php
$g = new Guest;
$c = null;
if (Input::exists('get') and Input::has('rid')): 
    $c = new Category(Input::get('rid'));
else:
    Redirect::to('home');
endif;
// echo "<pre>";
// var_dump($c);
// die;
$title = 'GECC - GIMPA Executive Conference Center';
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
                    <h2>Room Details</h2>
                    <p>Whether you're looking to sell or let your home or want to buy or rent a home, we really are the people for you to come to.</p>
                    <a href="index-2.html" class="btn btn-fill">Home</a>
                    <a href="rooms-details.html" class="btn btn-fill btn-default">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner End -->

<!-- Rooms Details Body Start-->
<div class="rooms-details-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="hotel-details">
                    <!-- Option Bar Start-->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="section-heading">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="flaticon-royalty-crown"></i>
                                        </div>
                                        <div class="media-body hidden-xs">
                                            <h4><?php echo $c->getName(); ?></h4>
                                            <div class="border"></div>
                                            <p>Checkout the latest deal</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="header-price">
                                    <h3>$ <?php echo $c->getPrice(); ?>.00</h3>
                                    <p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Option Bar End-->
                   
                    <!-- Rooms Detail Slider Start-->
                    <div class="rooms-detail-slider simple-slider">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php foreach ($c->getImages() as $key => $value): ?>
                                    <div class="item <?php echo ($key == 0) ? 'active' : '' ;?>">
                                        <img src="<?php echo $value->image; ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>    
                                    <?php endforeach ?>
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
                            <!-- Indicators -->
                            <ol class="carousel-indicators thumbs visible-lg visible-md">
                                <?php foreach ($c->getImages() as $key => $value): ?>
                                <li data-target="#carousel-custom" data-slide-to="<?php echo $key; ?>" class="<?php echo ($key == 0) ? 'active' : '' ;?>"><img src="<?php echo $value->image; ?>" alt="Chevrolet Impala"></li>       
                                <?php endforeach ?>
                            </ol>
                        </div>
                    </div>
                    <!-- Car Detail Slider End-->
                    <br/>
                    <!-- Room Details Start -->
                    <div class="room-specifications clearfix visible-xs">
                        <!-- Option Bar Start -->
                        <div class="option-bar clearfix">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="section-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="flaticon-royalty-crown"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4><?php echo $c->getName(); ?></h4>
                                                <div class="border"></div>
                                                <p>Check the <?php echo $c->getName(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="book-btn" data-toggle="modal" href="#exampleModal">
                            <span class="book-btn-l"><i class="fa fa-bed"></i></span>
                            <span class="book-btn-r">Make a Reservation</span>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <!-- Room Details-End -->

                    <!-- About Room start-->
                    <div class="about-room">
                        <h2 class="title">
                            General Information About Room
                        </h2>
                        <p> <?php echo $c->getDescription(); ?>.</p>
                    </div>
                    <!-- About Room End-->

                    <!-- Amenities Start-->
                    <div class="amenities">
                        <h2 class="title">Amenities</h2>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 amenities-box">
                                <ul>
                                    <?php foreach ($c->getAmenities() as $key => $value): ?>
                                    <li>
                                        <i class="flaticon-bed"></i><?php echo $c->getAmenityName($value->id); ?>
                                    </li>    
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- About Room End-->
                    
                    <!-- Inside Room Start-->
                   <!--  <div class="inside-room">
                        <h2 class="title">Inside Room</h2>
                        <iframe src="https://www.youtube.com/embed/ynYgotFKIpc" allowfullscreen></iframe>
                    </div> -->
                    <!-- Inside Room End-->
                </div>
                <!-- content div End-->
 

                <!-- Comments Form Start -->
                <div class="contact-form">
                    <div class="header">
                        <h3>SEND US AN EMAIL</h3>
                        <p>Donec non luctus turpis. Curabitur ut diam a turpis hendrerit aliquam. Nullam blandit bibendum turpis quis consequat. Nunc rhoncus neque ut quam venenatis consequat. Sed mollis facilisis consectetur. Curabitur purus ipsum, hendrerit id iaculis sed, congue facilisis dolor. Mauris aliquet tristique lacus vel pretium.</p>
                    </div>
                    <form action="http://hotel-empire.sohelrana.me/index.html">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                </div>
                                <div class="form-group email">
                                    <input type="text" name="Email Address" class="input-text" placeholder="Email Address">
                                </div>
                                <div class="form-group phone">
                                    <input type="text" name="phone-number" class="input-text" placeholder="Phone Number">
                                </div>
                                <div class="form-group Btn">
                                    <input type="submit" name="submit" class="btn-submit" value="submit now">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comments Form End -->
            </div>

            <div class="col-ld-4 col-md-4 col-sm-12 col-xs-12">
                <div class="details-sidebar">
                    <!-- Room Details Start -->
                    <div class="room-specifications clearfix hidden-xs">
                        <!-- Option Bar Start -->
                        <div class="option-bar clearfix">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="section-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="flaticon-royalty-crown"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4><?php echo $c->getName(); ?></h4>
                                                <div class="border"></div>
                                                <p>Check the <?php echo $c->getName(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a data-toggle="modal" href="#exampleModal" class="book-btn">
                            <span class="book-btn-l"><i class="fa fa-bed"></i></span>
                            <span class="book-btn-r">Make Reservation</span>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <!-- Room Details-End -->
                    
                    <!-- Help Center Start -->
                    <div class="helping-Center">
                        <h2>Need Our Help?</h2>
                        <h5>We Would Be Happy To Help You!</h5>
                        <span>
                            <a href="tel:+55-417-634-7071">
                                <i class="fa fa-phone"></i> +55 4XX-634-7071
                            </a>
                        </span>
                        <p>
                            <a href="#">info@themevessel.com</a>
                        </p>
                    </div>
                    <!-- Help Center End -->

                    <!-- Reasond Start -->
                    <div class="reasons">
                        <h2>Reasons to Book with us</h2>
                        <div class="media">
                            <div class="media-left">
                                <i class="flaticon-paint-palette-and-brush"></i>
                            </div>
                            <div class="media-body">
                                <h4>Awesome design</h4>
                                <p>Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequunt.</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="flaticon-needle"></i>
                            </div>
                            <div class="media-body">
                                <h4>carefylly handcrafted</h4>
                                <p>Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequunt.</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="flaticon-operator"></i>
                            </div>
                            <div class="media-body">
                                <h4>sustomer support</h4>
                                <p>Voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequunt.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Reasond End -->

                    <!-- Social List Start -->
                    <div class="social-list social-box clearfix">
                        <h2>Social Media</h2>
                        <a href="#" class="bg-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="bg-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" class="bg-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#" class="bg-pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                    <!-- Social List End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rooms Details Body End-->

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
                    <p>SunHouse perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium aperiam.<br><br>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur.</p>

                    <ul class="clearfix">
                        <li>
                            <a href="tel:+55-417-634-7071">
                                <i class="fa fa-phone"></i>
                                +55 4XX-634-7071
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@themevessel.com">
                                <i class="fa fa-envelope-o"></i>
                                info@themevessel.com
                            </a>
                        </li>
                    </ul>
                    <!-- Social List-->
                    <div class="social-list clearfix">
                        <a href="#" class="bg-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="bg-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" class="bg-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#" class="bg-pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                    <h2>Recent Rooms</h2>
                    
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-1.jpg" alt="footer-img-1">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Amazing Place</a></h3>
                            <span>October 18, 2016</span>
                            <p>$45.000</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-2.jpg" alt="footer-img-2">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Amazing Place</a></h3>
                            <span>november 13, 2016</span>
                            <p>$47.000</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/footer-img-3.jpg" alt="footer-img-3">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3><a href="rooms-details.html">Amazing Place</a></h3>
                            <span>december 21, 2016</span>
                            <p>$52.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 footer-item clearfix">
                <div class="footer-item-content">
                    <h2>Tags</h2>

                    <a href="#" class="tags">Apps</a>
                    <a href="#" class="tags">blog right sidebar</a>
                    <a href="#" class="tags">books</a>
                    <a href="#" class="tags">Apps</a>
                    <a href="#" class="tags">business</a>
                    <a href="#" class="tags">design</a>
                    <a href="#" class="tags">education</a>
                    <a href="#" class="tags">Fitness</a>
                    <a href="#" class="tags">gallery</a>
                    <a href="#" class="tags">pen</a>
                    <a href="#" class="tags">photography</a>
                    <a href="#" class="tags">real</a>
                    <a href="#" class="tags">web</a>
                    <a href="#" class="tags">Booking</a>
                    <a href="#" class="tags">Hotels</a>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 footer-item clearfix">
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
            </div>
        </div>
    </div>
</footer>
<!-- Footer End-->

<!-- Sub Footer-->
<div class="sub-footer">
    <div class="container">
        <span>&copy;  2017 Theme Vessel. Trademarks and brands are the property of their respective owners.</span>
    </div>
</div>
<!-- Sub Footer-->

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-slider.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/flatpickr.js"></script>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
        <form action="booking" method="post" class="container-fluid">
            <input type="text" name="_method" hidden value="checkAvailability">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="checkin">Check In</label>
                        <input class="flatpickr" id="checkin" name="from_date" type="text" placeholder="Checkin Date">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="checkout">Check Out</label>
                        <input class="flatpickr" id="checkout" name="to_date" type="text" placeholder="Checkout Date">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="guest">Guest</label>
                        <select class="form-control" name="adult">
                            <?php for ($i=1; $i < 20; $i++) { 
                                # code...
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="guest">Children</label>
                        <select class="form-control" name="child">
                            <?php for ($i=0; $i < 20; $i++) { 
                                # code...
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <input type="text" name="cat" hidden value="<?php echo Input::get('rid'); ?>">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-danger">Check Availability</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Mirrored from hotel-empire.sohelrana.me/rooms-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:17:23 GMT -->

<!-- Mirrored from riyasatresorts.com/rooms-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:05:43 GMT -->
</html>