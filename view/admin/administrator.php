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
                <?php 
                $cats = $admin->getCategory();
                foreach ($cats as $key => $value): ?>
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
            <div class="col-sm-12 text-right" style="margin-bottom: 20px;">
              <button class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#add-room-modal">Add Room</button>
              <button class="btn btn-success" style="margin-right: 10px;" data-toggle="modal" data-target="#exampleModal">Add Category</button>
              <button class="btn  pull-right btn-success" data-toggle="modal" data-target="#add-amenity-modal">Add Amenity</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form class="container-fluid" method="post" action="/controller/" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="cat_name">Category Name</label>
            <input type="text" required class="form-control" name="name" id="cat_name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="cat_price">Price per Night (USD)</label>
                <input type="text" required class="form-control" name="price" id="cat_price" placeholder="Enter Price per Night USD">
              </div>
              <div class="col-md-8">
                <label>Occupancy</label>
                <div class="row">
                  <div class="col-md-6">
                    <input type="number" required class="form-control" name="adult" min="0" placeholder="Adults">
                  </div>
                  <div class="col-md-6">
                    <input type="number" required class="form-control" name="child" min="0" placeholder="Children">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Amenities</label>
            <div class="container-fluid" style="height: auto; overflow: auto; max-height: 100px;">
              <table class="table table-responsive">
                <tbody>
                  <?php foreach ($admin->getAmenity() as $key => $amenity): ?>
                    <tr>
                      <div class="checkbox" style="margin: 0px;">
                        <label>
                          <td><input type="checkbox" name="amenities[]" value="<?php echo $amenity->id; ?>"></td>
                          <td><?php echo $amenity->name; ?></td>
                        </label>
                      </div>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label for="cat_description">Description</label>
            <textarea type="text" required rows="5" class="form-control" name="description" id="cat_description" placeholder="Enter Category's Description"></textarea>
          </div>
          <div class="form-group">
            <label for="img-btn" class="btn btn-primary btn-block">Add Image(s)</label>
            <input type="file" multiple id="img-btn" accept="image/*" name="image[]" style="display: none;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="text" hidden name="_method" value="new_category">
          <button type="submit" class="btn btn-theme">Add Category</button>
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

<div class="modal fade" id="add-amenity-modal" tabindex="-1" role="dialog" aria-labelledby="amenityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header"><h3>Add Amenity / Tag</h3></div>
      <form method="post" action="/controller/">
        <div class="modal-body">
          <div class="form-group">
            <label for="amenity-name">Tag Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Bed">
            <input type="text" name="_method" value="add_amenity" hidden>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-theme btn-block" style="border-radius: 0px;">Add</button>
        </div>
      </form>
        
    </div>
  </div>
</div>

<div class="modal fade" id="add-room-modal" tabindex="-1" role="dialog" aria-labelledby="amenityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header"><h3>Add Room</h3></div>
      <form method="post" action="/controller/">
        <div class="modal-body">
          <div class="form-group">
            <label for="amenity-name">Room Number</label>
            <input type="text" name="number" class="form-control" required placeholder="e.g. 219">
            <input type="text" name="_method" value="add_room" hidden>
          </div>
          <div class="form-group">
            <label for="amenity-name">Select Category</label>
            <select class="form-control" name="category_id">
              <?php foreach ($cats as $key => $value): ?>
                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-theme btn-block" style="border-radius: 0px;">Add Room</button>
        </div>
      </form>
        
    </div>
  </div>
</div>
<?php require_once('includes/includes.footer.php'); ?>