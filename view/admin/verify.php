<?php 
if (Input::exists('get')) {
	# code...
	if (!Input::has('hash')) {
		# code...
		require('404.php');
		die;
	}
} else {
	require('404.php');
	die;
}
require_once('includes/includes.header.php'); ?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post" action="/controller/">
		        <h2 class="form-login-heading">Verify Email</h2>
		        <div class="login-wrap">
		            <input type="email" required name="email" class="form-control" placeholder="User Email" autofocus>
                <small id="emailHelp" class="form-text text-warning">Enter your email to continue verification.</small>
		            <br>
			        <div class="hidden" style="">
			        	<div class="form-group">
			            	<input type="password" required name="password" id="main" class="form-control" placeholder="Password">
			            </div>
			            <br>
			            <div class="form-group">
			            	<input type="password" required id="other-pass" class="form-control" placeholder="Re-Type Password">
			            </div>
			            <div style="margin: 10px;"></div>
			            <input type="text" hidden name="_method" value="signup">
			            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> COMPLETE VERIFICATION</button>
			        </div>
		            <hr>
		            
		            <!-- <div class="login-social-link centered">
		            <p>Already verified your Account?</p>
		                <a href="login" class="btn btn-facebook"><i class="fa fa-door-open"></i> Login</a>
		                <a href="/" class="btn btn-twitter"><i class="fa fa-home"></i> Go Home</a>
		            </div> -->
		            <div class="registration">
		                For GECC Online Employees With an Accounts Only<br/>
		                <!-- <a data-toggle="modal" href="#requestModal"> Request For One</a> -->
		            </div>
		
		        </div>

		
		      </form>	  	
	  	
	  	</div>
	  </div>
      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="requestModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">A Request Has Been Sent To The System's Admin</h4>
                  </div>
                  <div class="modal-body">
                      <p>You will be notified by email upon request process completion.</p>
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">OK</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- modal -->

      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <div class="modal-body">
                      <p>A Reset Link Would be sent to your email upon request processing completion</p>
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- modal -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
    <script>
    	$().ready(function() {
    		$('input[type="password"]').on('keyup', function(e) {
    			var other = ($(this).attr('id') == 'main') ? $('#other-pass') : $('#main');
    			// console.log($(this).val() == other.val());
    			// console.log($(this).val());
    			// console.log(other.val());
    			if($(this).val() != other.val()) {
    				// alert();
    				$('button[type="submit"]').attr('disabled', 'true');
    				// $('input[type="password"]').css('borderColor', '#f00');
    				$('input[type="password"]').parents('.form-group').addClass('has-error');
    			} else if($(this).val() == other.val()) {
    				$('input[type="password"]').parents('.form-group').removeClass('has-error');  
    				$('button[type="submit"]').removeAttr('disabled');
    				$('input[type="password"]').css('borderColor', '#0f0');  
    				// alert();				
    			}
    		});

    		$('input[type="email"]').on('keyup', function(e) {
    			var val = '_method=verify&email=';
    			val += $(this).val();
    			var _email = $(this).val();
    			$.ajax({
    				url: '/controller/',
    				method: 'post',
    				data: val,
    				success: function (d) {
    					// body...
    					if(d[0].length !== 0) {
    						if(d[0][0].email == _email) {
    							$('div[class="hidden"]').removeClass('hidden');
    						}
    					} 
    					// if(d[0].email == _email) {
    					// }
    				},
    				error: function (e) {
    					alert('error', e);
              console.log(e);
    				}
    			});
    		});

        $('form').on('submit', function(e) {
          e.preventDefault();
          // alert();
          // return false;
          var _data = $(this).serialize();
          $.ajax({
            url: '/controller/',
            data: _data,
            method: 'post',
            success: function (d) {
              // body...
              if(d[0].indexOf('/cpanel/') >= 0) {
                window.location.href = d[0];
              } else {
                alert('error signing Up');
              }
            },
            error: function (e) {
              // body...
              console.log(e);
            }
          })
        });
    	});
    </script>

  </body>
</html>
