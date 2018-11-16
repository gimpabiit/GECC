<?php
if (!Input::has('hash')) {
    # code...
    Redirect::to('home');
}
$g = new Guest;
$title = 'GECC - GIMPA Executive Conference Center';
include "include/head.php";
?>

<!-- form-page-body Start -->
<body class="form-page-body">
    <div id="get" hidden><?php echo Input::get('hash'); ?></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- form content box Start -->
                <div class="form-content-box">
                    <div class="details">
                        <!-- logo Start -->
                        <a href="#" class="logo">
                            <img src="img/logo.png">
                        </a>
                        <!-- Form -->
                        <form method="post" class="verify" action="">
                            <!-- logo End -->
                            <h2 id="title">VERIFY EMAIL</h2>
                            <!-- Email-->
                            <div class="form-group email">
                                <input type="email" class="input-text" name="email" id="email" placeholder="Email Address">
                                <small hidden>Wrong email, verification error</small>
                            </div>
                            <div class="form-group password">
                                <input type="password" hidden class="input-text" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group password">
                                <input type="password" hidden class="input-text" id="password" placeholder="Verify Password">
                            </div>
                            <!-- Btn -->
                            <input type="submit" class="submit" value="verify email">
                        </form>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            New to GECC? <a href="#myModal" data-toggle="modal">Sign up now</a>
                        </span>
                    </div>
                </div>
                <!-- form content box End -->
            </div>
        </div>
    </div>
<!-- form-page-body ENd -->

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
<script>
    $().ready(function () {
        $('form').on('submit', function(e) {
            e.preventDefault();
            var _form = $(this);
            if (_form.hasClass('verify')) {
                var _get = $('div[id="get"]').text();
                var _data = '_method=verify_account&hash='+_get+'&email='+_form.find('input[name="email"]').val();
                $.ajax({
                    url: '/api/',
                    method: 'post',
                    data: _data,
                    success: function (d) {
                        // body...
                        if(d == 'true') {
                           $('#title').text('VERIFY YOUR ACCOUNT');
                            _form.find('small').hide();
                            _form.find('input[name="email"]').css('borderColor', 'green');
                            _form.removeClass('verify');
                            _form.addClass('login'); 
                           $('input[type="submit"]').val('Create Password');
                           $('[type="password"]').removeAttr('hidden');
                           $('[type="password"]').attr('required', 'true');
                        } else {
                            _form.find('input[name="email"]').css('borderColor', 'red');
                            _form.find('small').show();
                        }
                    },
                    error: function (e) {
                        // body...
                        console.log(e);
                        alert('error');
                    }
                });
            } else {
                if (_form.find('[name="password"]').val() != _form.find('[id="password"]').val()) {
                    alert('passwords must be the same');
                    return false;
                } else {
                    alert(_form.serialize());
                    return false;
                    $.ajax({
                        url: '/api/',
                        method: 'post',
                        data: _data,
                        success: function (d) {
                            // body...
                            alert('success');
                        },
                        error: function (e) {
                            // body...
                            alert('error');
                        }
                    });
                }
            }
        });
    });
</script>
</body>

<!-- Mirrored from hotel-empire.sohelrana.me/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2017 09:17:23 GMT -->

<!-- Mirrored from riyasatresorts.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 11:05:43 GMT -->
</html>