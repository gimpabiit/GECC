<?php
$g = new Guest;
if (Input::has('_method')) {
    # code...
    echo "<pre>";
    print_r(Input::getAll());
    die;
} else {
Redirect::to('home');
}
$title = 'GECC - GIMPA Executive Conference Center';
include "include/head.php";
?>
<body>
<!-- Header Start -->
<?php include "include/header.php" ?>
<!-- Blog Banner Start -->
<div class="blog-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reservation Invoice</h2>
                <a href="index" class="home">Go back Home</a>
                <a class="m0">/</a>
                <a>Invoice</a>
            </div>
        </div>
    </div>
</div>
<!-- Blog Banner End -->

<!-- Blog Body Start -->
<div class="blog-body">
    <div class="container">
        <div class="invoice-page">
            <div class="invoice-title">
                <h2 class="pull-left">Reservation: #12345</h2>
                <h3 class="pull-right">
                    <a class="invoice-status">STATUS: UNPAID</a>
                </h3>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        John Smith<br>
                        client@gmail.com<br>
                        +55 4XX-634-7071<br>
                        1234 Main Apt. 4B<br>
                        Springfield, ST 54321
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Company:</strong><br>
                        The Hotel Empire<br>
                        <a>http://hotelempire.com</a><br>
                        +55 4XX-634-7071<br>
                        1234 Main Apt. 4B<br>
                        Springfield, ST 54321
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Booking Date:</strong><br>
                        Dec 7, 2016
                    </address>
                </div>
            </div>
            <div class="invoice-item">
                <table class="invoice-item-table">
                    <thead>
                    <tr>
                        <th>
                            Product
                        </th>
                        <th>
                            Night
                        </th>
                        <th class="text-right">
                            Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border-bottom">
                            <strong>Liv Race Day Short</strong>
                        </td>
                        <td class="border-bottom">
                            2
                        </td>
                        <td class="text-right border-bottom">
                            $155.22
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Room:</strong>
                        </td>
                        <td>
                            <span>STA - KING SUITE</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Checkin Date:</strong>
                        </td>
                        <td>
                            <span>May 5,2015</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Checkout Date:</strong>
                        </td>
                        <td>
                            <span>May 7,2015</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Guest</strong>
                        </td>
                        <td>
                            <span>2</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="note">
                        <h3>Note</h3>
                        <p>
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-offset-4">
                    <table class="price-table no-border">
                        <tbody>
                        <tr>
                            <td>
                                <strong>VAT</strong>
                            </td>
                            <td class="text-right">
                                <span>$15.99</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Sub-total</strong>(VAT included):
                            </td>
                            <td  class="text-right">
                                <span>155.22</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Order discount:</strong>
                            </td>
                            <td  class="text-right">
                                <span>$15.99</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Grand Total:</strong>
                            </td>
                            <td  class="text-right">
                                <span>$155.22</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="thanks-area">
                <p>
                    For more information on your order please call us on 123 467 8961, or mail us at <a href="mailto:info@themevessel.com">info@themevessel.com</a>
                    <br/>
                    <strong>The Hotel Empire</strong>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Blog Body End -->

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

<!-- Mirrored from hotel-empire.sohelrana.me/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:17:51 GMT -->

<!-- Mirrored from riyasatresorts.com/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:06:17 GMT -->
</html>