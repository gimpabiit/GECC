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
    <title><?php echo isset($title) ? $title : 'GECC - Home';?></title>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 0px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
        <form class="form" action="sign" method="post">
          <div class="modal-body">
            <div class="container-fluid">
                <input type="text" name="_method" value="register" hidden>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input required type="text" name="fname" id="fname" class="form-control" placeholder="e.g. John">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input required type="text" name="lname" id="lname" class="form-control" placeholder="e.g. Snow">
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
                </div>
                <div class="text-center">
                    
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-fill btn-default" style="color: #2a2a2a;" data-dismiss="modal"><b>Close</b></button>
            <button type="submit" class="btn btn-fill pull-right">Sign Up</button>
          </div>
        </form>
    </div>
  </div>
</div>