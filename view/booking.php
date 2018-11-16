<?php
$g = new Guest;
// print_r(Input::getAll());
// die;
if (!Input::exists()) {
    # code...
    Redirect::to('home');
}
$c = new Category(Input::get('cat'));
$fd = date_create(Input::get('from_date'));
$td = date_create(Input::get('to_date'));
$diff = date_diff($fd, $td)->days;
if ($g->isSignedIn()) {
    # code...
    if ($g->checkRoomAvailability(Input::get('from_date'), Input::get('to_date'), Input::get('cat'))) {
        $g->makeReservation(Input::get('from_date'), Input::get('to_date'), Input::get('cat'), $g->getKey());
    }
}
$title = 'GECC - GIMPA Executive Conference Center';
include "include/head.php";
?>
<body>
<!-- Header Start -->
<?php include "include/header.php" ?>
<!-- Header End -->

<!-- Blog Banner Start -->
<div class="blog-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Complete Room Booking</h2>
                REGISTER HERE or LOGIN to continue
            </div>
        </div>
    </div>
</div>
<!-- Blog Banner End -->

<!-- Blog Body Start -->
<div class="blog-body">
    <div class="container">
        <p>
          <button class="btn btn-primary btn-fill" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            View Room Details
          </button>
        </p>
    </div>   
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="collapse" id="collapseExample">
                  <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <!-- Blog Box Start -->
                            <div class="thumbnail blog-box clearfix">
                                <img src="<?php echo $c->getImages()[0]->image; ?>" alt="5.jpg">
                                <!-- detail -->
                                <div class="caption detail">
                                    <h1 class="title">
                                        <a href="#"><?php echo $c->getName(); ?></a>
                                    </h1>
                                    <h2>
                                        $<?php echo $c->getPrice(); ?>.00
                                    </h2>
                                    <!-- paragraph -->
                                    <p><?php echo $c->getDescription(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($g->checkRoomAvailability(Input::get('from_date'), Input::get('to_date'), Input::get('cat'))): ?>
                <form class="form" action="book-order" method="post">
                    <legend class="title">Enter Guest Details To Continue Booking</legend>
                    <input type="text" name="_method" value="register" hidden>
                    <?php if (!$g->isSignedIn()): ?> 
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Title</label>
                            <select class="form-control" name="title">
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Mrs./Ms./Miss</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="fname">Firstname</label>
                                <input required type="text" name="fname" id="fname" class="form-control" placeholder="e.g. John">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="lname">Lastname</label>
                                <input required type="text" name="lname" id="lname" class="form-control" placeholder="e.g. Snow">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Program (optional)</label>
                                <input type="text" name="program" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Company (optional)</label>
                                <input type="text" name="program" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="email" name="email" id="email" class="form-control" placeholder="e.g. john.snow@stark.com">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input required type="text" name="phone" id="phone" class="form-control" placeholder="e.g. 024 xxx xxxx">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="addrtess">Address</label>
                                <input required type="text" name="address" id="addrtess" class="form-control" placeholder="e.g. P. O. Box 123">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input required type="text" name="city" id="city" class="form-control" placeholder="e.g. Accra">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input required type="text" name="country" id="country" class="form-control" placeholder="e.g. Ghana">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Reason for Stay (optional)</label>
                            <textarea class="form-control" rows="7"></textarea>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="row">
                        <input type="text" hidden name="from_date" value="<?php echo Input::get('from_date'); ?>" />
                        <input type="text" hidden name="to_date" value="<?php echo Input::get('to_date'); ?>" />
                        <input type="text" hidden name="cat" value="<?php echo Input::get('cat'); ?>" />
                        <input type="text" hidden name="adult" value="<?php echo Input::get('adult'); ?>" />
                        <input type="text" hidden name="child" value="<?php echo Input::get('child'); ?>" />
                        <div class="row">
                            <div class="text-center" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-fill ">Book Room</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php else: ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-xs-12">
                                <p>Sorry, This room is not available for reservations</p>
                                <a href="rooms-list" class="btn btn-fill">Click here to check out other options</a> 
                            </div>

                        </div>
                    </div> 
                <?php endif ?> 
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <h3>Reservation Details</h3><hr>
                <div class="list-group" style="">
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Arrival Date</b></h4>
                    <p class="list-group-item-text"><?php echo date_format(date_create(Input::get('from_date')), 'jS F Y') ?></p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Nights</b></h4>
                    <p class="list-group-item-text"><?php echo $diff; ?></p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Depature Date</b></h4>
                    <p class="list-group-item-text"><?php echo date_format(date_create(Input::get('to_date')), 'jS F Y') ?></p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Room </b></h4>
                    <p class="list-group-item-text"><?php echo $c->getName(); ?></p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Guests</b></h4>
                    <p class="list-group-item-text">Adults: <?php echo Input::get('adult'); ?>, Chlidren: <?php echo Input::get('child'); ?></p>
                  </a>
                  <a href="#" class="list-group-item active">
                    <p class="list-group-item-text">Total Price</p>
                    <h4 class="list-group-item-heading text-right"><b><span>USD <?php echo number_format((float)$diff * $c->getPrice(), 2, '.', ''); ?></span></b></h4>
                  </a>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- Blog body End End -->

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
<script>
    $().ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
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
<!-- Mirrored from hotel-empire.sohelrana.me/with-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:18:24 GMT -->

<!-- Mirrored from riyasatresorts.com/with-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:06:49 GMT -->
</html>