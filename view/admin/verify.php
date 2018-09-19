<?php require_once('includes/includes.header.php'); ?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="index.html">
		        <h2 class="form-login-heading">Verify Email</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User Email" autofocus>
		            <br>
		            <div class="form-group">
		            	<input type="password" id="main" class="form-control" placeholder="Password">
		            </div>
		            <br>
		            <div class="form-group">
		            	<input type="password" id="other-pass" class="form-control" placeholder="Re-Enter Password">
		            </div>
		            <label class="checkbox">
		                <span class="pull-right">
		                	<!-- <a data-toggle="modal" href="#myModal"> Forgot Password?</a> -->
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> COMPLETE VERIFICATION</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>Already verified your Account?</p>
		                <a href="login" class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Login</a>
		                <a href="/" class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Go Home</a>
		            </div>
		            <div class="registration">
		                GECC Online Employee Without an Account?<br/>
		                <a data-toggle="modal" href="#requestModal"> Request For One</a>
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
		
		      </form>	  	
	  	
	  	</div>
	  </div>

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
    			console.log($(this).val() == other.val());
    			console.log($(this).val());
    			console.log(other.val());
    			if($(this).val() != other.val()) {
    				// alert();
    				$('button[type="submit"]').attr('disabled', 'true');
    				// $('input[type="password"]').css('borderColor', '#f00');
    				$('input[type="password"]').parents('.form-group').addClass('has-error');
    			} else if($(this).val() == other.val()) {
    				$('input[type="password"]').parents('.form-group').removeClass('has-error');  
    				$('button[type="submit"]').attr('disabled', 'false');
    				$('input[type="password"]').css('borderColor', '#f00');  
    				alert();				
    			}
    		});
    	});
    </script>

  </body>
</html>
