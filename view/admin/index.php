<?php $boss = new Boss; ?>
<?php require_once('includes/includes.header.php'); ?>
<section id="container" >
  <!-- **********************************************************************************************************************************************************
  TOP BAR CONTENT & NOTIFICATIONS
  *********************************************************************************************************************************************************** -->
  <!--header start-->
  <header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>GECC Dashboard</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
    <!--  notification start -->
      <!-- <ul class="nav top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
            <i class="fa fa-tasks"></i>
            <span class="badge bg-theme">4</span>
          </a>
          <ul class="dropdown-menu extended tasks-bar">
            <div class="notify-arrow notify-arrow-green"></div>
            <li>
              <p class="green">You have 4 pending tasks</p>
            </li>
            <li>
              <a href="index.html#">
                <div class="task-info">
                  <div class="desc">DashGum Admin Panel</div>
                  <div class="percent">40%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <div class="task-info">
                  <div class="desc">Database Update</div>
                  <div class="percent">60%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (warning)</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <div class="task-info">
                  <div class="desc">Product Development</div>
                  <div class="percent">80%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <div class="task-info">
                  <div class="desc">Payments Sent</div>
                  <div class="percent">70%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                    <span class="sr-only">70% Complete (Important)</span>
                  </div>
                </div>
              </a>
            </li>
            <li class="external">
              <a href="#">See All Tasks</a>
            </li>
          </ul>
        </li>
        <li id="header_inbox_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-theme">5</span>
          </a>
          <ul class="dropdown-menu extended inbox">
            <div class="notify-arrow notify-arrow-green"></div>
            <li>
              <p class="green">You have 5 new messages</p>
            </li>
            <li>
              <a href="index.html#">
                <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                </span>
                <span class="message">
                  Hi mate, how is everything?
                </span>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                </span>
                <span class="message">
                  Hi, I need your help with this.
                </span>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                </span>
                <span class="message">
                  Love your new Dashboard.
                </span>
              </a>
            </li>
            <li>
              <a href="index.html#">
                <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                </span>
                <span class="message">
                  Please, answer asap.
                </span>
              </a>
            </li>
            <li>
              <a href="index.html#">See all messages</a>
            </li>
          </ul>
        </li>
      </ul> -->
      <!--  notification end -->
    </div>
    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <li><a class="logout" href="logout">Logout</a></li>
      </ul>
    </div>
  </header>
  <!--header end-->
  
  <!-- **********************************************************************************************************************************************************
  MAIN SIDEBAR MENU
  *********************************************************************************************************************************************************** -->
  <!--sidebar start-->
  <aside>
    <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
        
        <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        <h5 class="centered">Super Administrator</h5>
        
        <li class="mt">
          <a class="active" href="index.html">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- <li class="sub-menu">
          <a href="javascript:;" >
            <i class="fa fa-desktop"></i>
            <span>UI Elements</span>
          </a>
          <ul class="sub">
            <li><a  href="general.html">General</a></li>
            <li><a  href="buttons.html">Buttons</a></li>
            <li><a  href="panels.html">Panels</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" >
            <i class="fa fa-cogs"></i>
            <span>Components</span>
          </a>
          <ul class="sub">
            <li><a  href="calendar.html">Calendar</a></li>
            <li><a  href="gallery.html">Gallery</a></li>
            <li><a  href="todo_list.html">Todo List</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" >
            <i class="fa fa-book"></i>
            <span>Extra Pages</span>
          </a>
          <ul class="sub">
            <li><a  href="blank.html">Blank Page</a></li>
            <li><a  href="login.html">Login</a></li>
            <li><a  href="lock_screen.html">Lock Screen</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" >
            <i class="fa fa-tasks"></i>
            <span>Forms</span>
          </a>
          <ul class="sub">
            <li><a  href="form_component.html">Form Components</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" >
            <i class="fa fa-th"></i>
            <span>Data Tables</span>
          </a>
          <ul class="sub">
            <li><a  href="basic_table.html">Basic Table</a></li>
            <li><a  href="responsive_table.html">Responsive Table</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" >
            <i class=" fa fa-bar-chart-o"></i>
            <span>Charts</span>
          </a>
          <ul class="sub">
            <li><a  href="morris.html">Morris</a></li>
            <li><a  href="chartjs.html">Chartjs</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
  <!--sidebar end-->
  
  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <!-- <div class="col-lg-1"></div> -->
        <div class="col-lg-9 main-chart">
          
          <div class="row mtbox">
            <div class="col-md-5 col-sm-2 col-md-offset-1 box0">
              <div class="box1">
                <span class="text-success fa fa-user"></span>
                <h3>933</h3>
              </div>
              <p>All Employees</p>
            </div>
            <div class="col-md-5 col-sm-2 box0">
              <div class="box1">
                <span class="text-danger fas fa-ban"></span>
                <h3>+48</h3>
              </div>
              <p>Blocked Employees</p>
            </div>
          </div><!-- /row mt -->

          <div class="row mtbox">
            <div class="col-sm-12" style="margin-bottom: 20px;">
              <button class="btn  pull-right btn-success" data-toggle="modal" data-target="#exampleModal">Add New Employee</button>
            </div>
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Employees List</h4>
                <hr>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>...</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($boss->getEmployees() as $key => $value): ?>
                      <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->access_type; ?></td>
                        <?php switch ($boss->getStatus($value)) {
                          case 'Suspended':
                            # code...
                            ?>
                            <td><span class="bg-danger text-light p-1">Suspended</span></td>
                            <td>
                              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Click to unsuspend Employee"><span class="fa fa-user"></span></button>
                            </td>
                            <?php
                            break;
                          case 'Active':
                            # code...
                            ?>
                            <td><span class="bg-success text-light p-1">Active</span></td>
                            <td>
                              <button data-toggle="tooltip" data-placement="left" title="Click to suspend Employee" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                              <button type="button" data-toggle="tooltip" data-placement="left" title="Click to resend verification" class="btn btn-sm btn-success"><span class="fa fa-send"></span></button>
                            </td>
                            <?php
                            break;
                          case 'Unverified':
                            # code...
                            ?>
                            <td><span class="bg-warning text-light p-1">Unverified</span></td>
                            <td>
                              <button type="button" data-toggle="tooltip" data-placement="left" title="Click to resend verification" class="btn btn-sm btn-success"><span class="fa fa-send"></span></button>
                            </td>
                            <?php
                            break;
                        } ?>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>        
                      
          <div class="row mtbox">
            <!-- TWITTER PANEL -->
            <div class="col-md-4 mb">
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>DROPBOX STATICS</h5>
                </div>
                <canvas id="serverstatus02" height="120" width="120"></canvas>
                <p>April 17, 2014</p>
                <footer>
                  <div class="pull-left">
                    <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                  </div>
                  <div class="pull-right">
                    <h5>60% Used</h5>
                  </div>
                </footer>
              </div><!-- /darkblue panel -->
            </div><!-- /col-md-4 -->
                
                
            <div class="col-md-4 mb">
              <!-- INSTAGRAM PANEL -->
              <div class="instagram-panel pn">
                <i class="fa fa-instagram fa-4x"></i>
                <p>@THISISYOU<br/>
                  5 min. ago
                </p>
                <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
              </div>
            </div><!-- /col-md-4 -->
                  
            <div class="col-md-4 col-sm-4 mb">
              <!-- REVENUE PANEL -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>REVENUE</h5>
                </div>
                <div class="chart mt">
                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                </div>
                <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
              </div>
            </div>
          </div>
                  
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
                                  
                                  
        <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->
        
        <!-- CALENDAR-->
        <div class="col-lg-3 ds">
          <div id="calendar" class="mb" style="height: 100vh;">
            <div class="panel green-panel no-margin">
              <div class="panel-body">
                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                  <div class="arrow"></div>
                  <h3 class="popover-title" style="disadding: none;"></h3>
                  <div id="date-popover-content" class="popover-content"></div>
                </div>
                <div id="my-calendar"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /col-lg-3 -->
      </div><!--/row -->
    </section>
  </section>
  <!--main content end-->
  <!--footer start-->
  <footer class="site-footer">
    <div class="text-center">
      2018 - GIMPA Incubation
      <a href="index.html#" class="go-top">
        <i class="fa fa-angle-up"></i>
      </a>
    </div>
  </footer>
  <!--footer end-->
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form class="container-fluid" method="post" action="/controller/">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInput1">Enter Employee's Name</label>
            <input type="text" required class="form-control" name="name" id="exampleInput1" aria-describedby="emailInput" placeholder="Enter Name">
            <small id="emailHelp" class="form-text text-warning">We'll never share your info with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Enter Employee's Email address</label>
            <input type="email" required class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-warning">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Access Level</label>
            <select required name="access_type" class="form-control" id="inlineFormCustomSelectPref">
              <option>Choose...</option>
              <option value="super-administrator">Super Administrator</option>
              <option value="administrator">Administrator</option>
              <option value="accountant">Accountant</option>
              <option selected value="receptionist">Receptionist</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="text" hidden name="_method" value="new_user">
          <button type="submit" class="btn btn-theme">Add Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once('includes/includes.footer.php'); ?>