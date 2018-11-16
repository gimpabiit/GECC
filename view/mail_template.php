<?php
$c = new Category(Input::get('cat'));
$fd = date_create(Input::get('from_date'));
$td = date_create(Input::get('to_date'));
$diff = date_diff($fd, $td)->days;
$title = 'GECC - GIMPA Executive Conference Center';
?>
<?php if (!isset($g)) {
    # code...
    $g = new Guest;
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotel-empire.sohelrana.me/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:17:51 GMT -->

<!-- Mirrored from riyasatresorts.com/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:06:17 GMT -->
<head>
    <title>Order Invoice | GECC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="/view/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/view/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/view/css/slider.css">
    <link rel="stylesheet" href="/view/css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/view/css/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/view/css/flaticon/font/flaticon.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/view/css/style.css">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
</head>
<div class="" style="margin: 0px; padding: 0px;">
    <nav class="navbar navbar-inverse" style="margin: 0px; border-radius: 0px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header pull-right">
        <!-- <span class="">024 xxx xxxx</span> | <span class="">024 xxx xxxx</span> -->
      <a class="navbar-brand" href="#"><i class="fa fa-phone"></i> 024 xxx xxxx</a><!--  | <a class="navbar-brand" href="#"><i class="fa fa-phone"></i> 024 xxx xxxx</a> -->
    </div>
  </div><!-- /.container-fluid -->
</nav>
</div>
<body>
<!-- Header Start -->
<header class="main-header">
    <div class="container">
    </div>
</header>


<!-- Blog Banner Start -->
<div class="blog-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Room(s) Reservation Complete</h2>
                <a href="#" class="home">Reservation Invoice</a>
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
                        <?php echo Input::get('title'). ' ' . Input::get('fname'). ' ' . Input::get('lname'); ?><br>
                        <?php echo Input::get('email'); ?><br>
                        <?php echo Input::get('phone'); ?><br>
                        <?php echo Input::get('address'); ?><br>
                        <?php echo Input::get('city'); ?>, <?php echo Input::get('country'); ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Company:</strong><br>
                        The Executive Hostel<br>
                        <a>http://gecc.com</a><br>
                        +55 4XX-634-7071<br>
                        1234 Main Apt. 4B<br>
                        P. O. Box AH 50
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Booking Date:</strong><br>
                        <?php echo date('F j, Y'); ?>
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
                            Night(s)
                        </th>
                        <th class="text-right">
                            Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border-bottom">
                            <strong></strong>
                        </td>
                        <td class="border-bottom">
                            <?php echo date_diff(date_create(Input::get('from_date')), date_create(Input::get('to_date')))->days; ?>
                        </td>
                        <td class="text-right border-bottom">
                            $<?php echo number_format((float)$diff * $c->getPrice(), 2, '.', ''); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Room:</strong>
                        </td>
                        <td>
                            <span><?php echo $c->getName(); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Checkin Date:</strong>
                        </td>
                        <td>
                            <span><?php echo date_format(date_create(Input::get('from_date')), 'F j, Y') ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Checkout Date:</strong>
                        </td>
                        <td>
                            <span><?php echo date_format(date_create(Input::get('to_date')), 'F j, Y') ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Guest</strong>
                        </td>
                        <td>
                            <span>Adults: <?php echo Input::get('adult'); ?>, Chlidren: <?php echo Input::get('child'); ?></span>
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
                </div>
            </div>

            <div class="thanks-area">
                <p>
                    For more information on your order please call us on 123 467 8961, or mail us at <a href="mailto:info@gecc.com">info@gecc.com</a>
                    <br/>
                    <strong>GECC</strong>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Blog Body End -->


<!-- Sub Footer-->
<div class="sub-footer">
    <div class="container">
        <span>&copy;  2018 GECC. Trademarks and brands are the property of their respective owners.</span>
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