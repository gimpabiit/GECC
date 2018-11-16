<?php require_once('includes/includes.header.php'); ?>
  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post" action="/controller/">
		        <h2 class="form-login-heading">sign in</h2>
		        <div class="login-wrap">
		            <input type="email" required name="email" class="form-control" placeholder="User Email" autofocus>
		            <br>
		            <input type="password" required name="password" class="form-control" placeholder="Password">
		            <input type="text" name="_method" value="login" hidden>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

      <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <div class="modal-body">
                      <p>A Reset Link Would be sent to your email upon the request process' completion</p>
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
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
      $('input').on('keypress', function(e) {
        $('form').find('input').css('borderColor', '#e2e2e2');
      });
      $('form').on('submit', function(e) {
        e.preventDefault();
        var _data = $(this).serialize();
        $.ajax({
          url: '/controller/',
          method: 'post',
          data: _data,
          success: function(d) {
            try {
              if(d[0].indexOf('/cpanel/') >= 0) {
                window.location.href = d[0];
              }
            } catch (err) {
              if (!d[0]) {
                $('form').find('input').css('borderColor', 'red');
              }
            }
          } 
        });
      })
    </script>

  </body>
</html>
