<?php $admin = new Reception; 
// echo "<pre>";
// print_r(Category::getAll());
// die;
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
          <a class="active" href="index.html">
            <i class="fa fa-ellipsis-v"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="mt">
          <a class="" href="index.html">
            <i class="fa fa-door-open"></i>
            <span>check in</span>
          </a>
        </li>
        <li class="mt">
          <a class="" href="index.html">
            <i class="fa fa-door-closed"></i>
            <span>check out</span>
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
          
          <div class="row mtbox mb">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Rooms List</h4>
                <hr>
                <table class="table table-striped">
                  <tbody>
                    <?php foreach (Category::getAll() as $key => $cat_obj):
                      $cat = new Category($cat_obj->id);
                    ?>
                      <tr><td><?php echo $cat->getName(); ?></td></tr>
                      <?php foreach ($cat->getRooms() as $key => $room): ?>
                        <tr>
                          <td><?php echo $room->number; ?></td>
                        </tr>
                      <?php endforeach ?>
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
  <!--main content end-->
  <!--footer start-->
 <!--  <footer class="site-footer">
    <div class="text-center">
      2018 - GIMPA Incubation
      <a href="index.html#" class="go-top">
        <i class="fa fa-angle-up"></i>
      </a>
    </div>
  </footer> -->
  <!--footer end-->
</section>
<?php require_once('includes/includes.footer.php'); ?>
<script>
  $().ready(function() {
    // alert();
    // $('#menu-toggle-custom').click();
  });
</script>