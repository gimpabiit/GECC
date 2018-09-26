<?php $admin = new Admin; ?>
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
        <h5 class="centered">Administrator</h5>
        
        <li class="mt">
          <a class="active" href="index.html">
            <i class="fa fa-ellipsis-v"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="mt">
          <a class="" href="index.html">
            <i class="fa fa-clone"></i>
            <span>Categories</span>
          </a>
        </li>
        <li class="mt">
          <a class="" href="index.html">
            <i class="fa fa-home"></i>
            <span>Rooms</span>
          </a>
        </li>
        <li class="mt">
          <a class="" href="index.html">
            <i class="fa fa-archway"></i>
            <span>Halls</span>
          </a>
        </li>
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
        <div class="col-lg-12 main-chart">
          
          <div class="row mtbox">
            <div class="col-md-3 col-sm-2 col-md-offset-1 box0">
              <div class="box1">
                <span class="text-success fa fa-clone"></span>
                <h3>Categories: 004</h3>
              </div>
              <p>All Categories</p>
            </div>
            <div class="col-md-4 col-sm-2 box0">
              <div class="box1">
                <span class="text-warning fas fa-home"></span>
                <h3>Rooms: 017</h3>
              </div>
              <p>All Rooms</p>
            </div>
            <div class="col-md-3 col-sm-2 box0">
              <div class="box1">
                <span class="text-danger fas fa-archway"></span>
                <h3>Halls: 003</h3>
              </div>
              <p>All Halls</p>
            </div>
          </div><!-- /row mt -->

          <div class="">
            <h3><i class="fa fa-angle-right"></i> Categories</h3>
            <hr>
              <div class="row mt">
                <?php foreach ($admin->getCategory() as $key => $value): ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                  <div class="project-wrapper">
                      <div class="project">
                          <div class="photo-wrapper">
                              <div class="photo">
                                <a class="fancybox" href="assets/img/portfolio/port01.jpg"><img class="img-responsive" src="assets/img/portfolio/port01.jpg" alt=""></a>
                              </div>
                              <div class="overlay"></div>
                          </div>
                      </div>
                  </div>
                </div><!-- col-lg-4 -->  
                <?php endforeach ?>
              </div><!-- /row -->
          </div>

          <div class="row mtbox mb">
            <div class="col-sm-12" style="margin-bottom: 20px;">
              <button class="btn  pull-right btn-success" data-toggle="modal" data-target="#exampleModal">Add Category</button>
            </div>
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Rooms List List</h4>
                <hr>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Room Number</th>
                      <th colspan="3">Category</th>
                      <th>...</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($admin->getRooms() as $key => $room): 
                      $r = new Room($room->id);
                      ?>
                      <tr>
                        <td><?php echo $room->id; ?></td>
                        <td><?php echo $room->number; ?></td>
                        <td colspan="3"><?php echo $r->getCategory(); ?></td>
                        <td>
                          <button class="btn btn-sm btn-danger" data-target="#deleteModal" data-toggle="modal" title="Click to remove room"><span class="fa fa-trash"></span></button>
                        </td>

                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>        
                      
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
                                  
                                  
        <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->
        
        <!-- CALENDAR-->
        <!-- <div class="col-lg-3 ds">
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
        </div> -->
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
        <h5 class="modal-title" id="exampleModalLabel"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form class="container-fluid" method="post" action="/controller/">
        <div class="modal-body">
          <div class="form-group">
            <label for="cat_name">Category Name</label>
            <input type="text" required class="form-control" name="name" id="cat_name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="cat_price">Price per Night</label>
            <input type="text" required class="form-control" name="price" id="cat_price" placeholder="Enter Price per Night USD">
          </div>
          <div class="form-group">
            <label for="cat_description">Description</label>
            <textarea type="text" required rows="5" class="form-control" name="name" id="cat_description" placeholder="Enter Category's Description"></textarea>
          </div>
          <div class="form-group">
            <label for="img-btn" class="btn btn-primary">Add Image(s)</label>
            <input type="file" id="img-btn" accept="image/*" name="image[]" style="display: none;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="text" hidden name="_method" value="new_room">
          <button type="submit" class="btn btn-theme">Add Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form class="container-fluid" method="post" action="/controller/">
        <div class="modal-body">
          <B>Are you sure you want to delete the selected item?</B>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="text" hidden name="_method" value="delete_room">
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="cat-img-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" class="img-responsive cat-img">
      </div>
    </div>
  </div>
</div>

<?php require_once('includes/includes.footer.php'); ?>