<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="logo">
                    <img src="img/logo.png">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="rooms-list.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facilities<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="rooms-list.php">Rooms</a></li>
                            <li><a href="#">Halls</a></li>                           
                        </ul>
                    </li>

                    <li><a href="about.php">About Us</a></li>
                    
                    <li><a href="contact.php">Contact Us</a></li>
                    <?php if (!$g->isSignedIn()): ?>
                    <li><a href="#" role="button" data-toggle="popover" title="Popover title"  data-placement="bottom" 
                        data-content="
                        <div style='width: 200px;'>
                            <form method='post' action='sign'>
                                <input hidden type='text' name='_method' value='login' />
                                <div class='form-group'>
                                    <input class='form-control' type='email' name='email' placeholder='Enter email'>
                                </div>
                                <div class='form-group'>
                                    <input class='form-control' type='password' name='password' placeholder='Enter Password'>
                                </div>
                                <div class='form-group text-center'>
                                    <button type='submit' class='btn btn-success btn-block'>Login</button>
                                </div>
                                <div class='text-right'><small><u><a href='#myModal' data-toggle='modal'>New User? Sign Up</a></u></small></div>
                            </form>
                        </div>
                        " data-html="true">Sign In</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- /.container -->
        </nav>
    </div>
</header>

