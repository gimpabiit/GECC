<?php 
$admin = new Reception; 
$r = new Reservation();
$date = $r->getFloor();
?>
<?php require_once('includes/includes.header.php'); ?>
<section id="container" >
  <!-- **********************************************************************************************************************************************************
  TOP BAR CONTENT & NOTIFICATIONS
  *********************************************************************************************************************************************************** -->
  <!--header start-->
  <header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" id="menu-toggle-custom" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>GECC Reception</b></a>
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
        <h5 class="centered">Receptionist</h5>
        <li class="mt">
          <a class="active link" data-target="#home" href="#">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="">
          <a class="link" data-target="#current-guests" href="#">
            <i class="fa fa-users"></i>
            <span>Current Guest(s)</span>
          </a>
        </li>
      </ul>
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
        <div class="col-lg-12 main-chart page-blocks">
          
          <div class="row" id="home">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Bookings</h4>
                <!-- <hr> -->
                <table class="table table-bordered" style="overflow: auto;">
                  <thead>
                    <th></th>
                    <?php
                      while ($date <= $r->getCap()) {
                        # code...
                        ?><th><?php echo date('jS F Y',strtotime($date))."\n"; ?></th><?php
                        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                      }
                    ?>
                  </thead>
                  <tbody>
                    <?php foreach (Category::getAll() as $key => $cat_obj):
                      $cat = new Category($cat_obj->id);
                      ?>
                      <tr>
                        <td class="text-center" style="border: 0px;"><b><?php echo $cat->getName(); ?></b></td>
                        <?php
                        $date = $r->getFloor();
                          while ($date <= $r->getCap()) {
                            # code...
                            ?><td style="border: 0px;"></td><?php
                            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                          }
                        ?>
                      </tr>
                      <?php foreach ($cat->getRooms() as $key2 => $room): ?>
                        <tr>
                          <td class="text-center active"><?php echo $room->number; ?> <i class="fa fa-bed"></i></td>
                          <?php
                          $date = $r->getFloor();
                            while ($date <= $r->getCap()) {
                              # code...
                              ?><td style="color: <?php echo ($key2 == $r->isMade($date, $cat_obj->id) - 1) ? '#fff' : '#d2d2d2' ; ?>;" class="text-center text-bold <?php echo ($key2 == $r->isMade($date, $cat_obj->id) - 1) ? 'info' : '' ; ?>" data-container="body" <?php echo ($key2 == $r->isMade($date, $cat_obj->id) - 1) ? 'data-toggle="popover"  data-html="true"' : '' ; ?>  data-placement="bottom" title="Details"  data-content="Client Info: <?php echo ($key2 == $r->isMade($date, $cat_obj->id) - 1) ? $r->getClientInfo($date, $cat_obj->id) : '' ; ?><hr><button class='btn btn-success'>Check In</button> <button class='btn btn-danger'>Check Out</button>"><?php echo ($key2 == $r->isMade($date, $cat_obj->id) - 1) ? $r->getClientInfo($date, $cat_obj->id) : date("jS", strtotime($date)) ; ?>
                              </td><?php
                              $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                            }
                          ?>
                        </tr>
                      <?php endforeach ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 

          <div class="row hidden" id="current-guests">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Checked-In Clients</h4>
                <!-- <hr> -->
                <table class="table table-bordered" style="overflow: auto;">
                  <thead>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Check-In Date</th>
                    <th>Check Out</th>
                    <th colspan="2">Billing <br> (<span class="text-danger">total</span>, <span class="text-success">paid</span>, <span class="text-primary">owing</span>)</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php foreach ($admin->getCheckedIns() as $key => $value): ?>
                      <?php $c = $admin->getClientInfo($value->client_id); ?>
                      <tr data-receipt='<?php echo $admin->getReservationInvoice($value->id);?>'>
                        <td class="reserve_id"><?php echo $value->id; ?></td>
                        <td><?php echo $c[0]->fullname; ?></td>
                        <td><?php echo date('jS F Y',strtotime($value->check_in_date))."\n"; ?></td>
                        <td><?php echo date('jS F Y',strtotime($value->to_date))."\n"; ?></td>
                        <td colspan="2"><span class="text-danger">$<?php echo Utility::moneyFormat($r->getPrice($value->id)); ?></span>, <span class="text-success">$<?php echo Utility::moneyFormat($admin->getCheckInPay($value->id)); ?></span>, <span class="text-primary">$<?php echo Utility::moneyFormat($r->getPrice($value->id) - $admin->getCheckInPay($value->id)); ?></span></td>
                        <td>
                          <button data-toggle="modal" data-target="#exampleModal2" title="Get Invoice Details" class="btn-action btn btn-info get-info"><i class="fa fa-info"></i></button> 
                          <button data-toggle="modal" data-target="#exampleModal" title="Add Bill" class="btn-action btn btn-primary"><i class="fa fa-plus"></i> <i class="fa fa-comment-dollar"></i></button> 
                          <button data-toggle="modal" data-target="#exampleModal1" title="Get Client Payment" class="btn-action btn btn-primary"><i class="fa fa-minus"></i> <i class="fa fa-comment-dollar"></i></button></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </section>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 0px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Bill</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> </span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" action="/controller/" method="post">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" name="label" class="form-control" placeholder="Bill Label">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" name="amount" class="form-control" placeholder="Amount">
                </div>
              </div>
              <input type="text" hidden name="_method" value="add_bill">
              <input type="text" name="reservation" value="" hidden>
              <div class="col-md-2">
                <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Bill</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 0px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Client Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> </span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" action="/controller/" method="post">
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" name="amount" class="form-control" placeholder="Amount">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Payment</button>
                </div>
              </div>
              <input type="text" hidden name="reservation">
              <input type="text" hidden name="_method" value="add_payment">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 0px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span>Customer Invoice</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> </span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <h3>#Reservation ID</h3>
            <hr>
            <div class="invoice-body">
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Mail to Customer</button>
        </div> -->
      </div>
    </div>
  </div>

</section>
<?php require_once('includes/includes.footer.php'); ?>