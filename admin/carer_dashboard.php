<?php
require_once('CommonClass/Common.php');
require_once('CommonClass/ClassManager.php');
$db = new DBConnections();
?>



<!DOCTYPE html>
<html lang="en">

<?php

require_once('head.php');?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <?php require_once('nav_title.php'); ?>

          <!-- menu prile quick info -->
            <?php require_once('menu_prile.php'); ?>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
            <?php
                require_once('carer_side_menu.php');
            ?>
         <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
      <?php
      require_once('carer_menu_footer.php');
      ?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
     <?php
     require_once('top_nav.php');
     ?>
      <!-- /top navigation -->

      <!-- page content -->
      <?php
      require_once('carer_page_main.php');
      ?>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
</body>

</html>