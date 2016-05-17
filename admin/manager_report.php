<?php
include_once('CommonClass/common.php');
include_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();
//session_start();
if(!isset($_SESSION['AdminID'])){
    header("location:login.php?r=".base64_encode('uas'));
}

if(isset($_POST['report'])) {

    $search = htmlspecialchars(mysqli_real_escape_string($db->getConnection(), $_POST['search']));
    //$search = $_POST['search'];
    $query = "
        SELECT * from tbladmin where  firstname like '%$search%' or lastname like '%$search%' or
        Username like '%$search%' or DateOfBirth='$search' or emailAddress ='$search'";
}else
{
    //echo "Eles part";
    //$query = "SELECT FirstName, LastName, Address, County, Phone, PPSNumber, EmailAddress, DateOfBirth, Sex  from FROM tblcarer";
    $query = "SELECT * from tbladmin";
}
$res=mysqli_query($db->getConnection(), $query) or die(mysqli_error($db->getConnection()));
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once('head.php');
?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

            <?php include_once('nav_title.php'); ?>

          <!-- menu prile quick info -->
            <?php include_once('menu_prile.php'); ?>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
            <?php include_once('sidebar_menu.php'); ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
            <?php include_once('footer_buttons.php'); ?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php include_once('top_nav.php'); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Report
                    <small>
                        Manager report
                    </small>
                </h3>
            </div>

              <form action="" method="post">
                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                                    <button class="btn btn-default" name="report" type="submit">Go!</button>
                              <!--<button type="submit" name="assignShift" class="btn btn-success">Assign Shift</button>-->
                                </span>
                        </div>
                      </div>
                    </div>
              </form>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Manager Report <!--<small>Sample user invoice design</small>--></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                                        <i class="fa fa-globe"></i> TCare Plus.
                                        <small class="pull-right"><?php echo date('d/m/Y');?></small>
                                    </h1>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        From
                        <address>

                                    <strong>15 Lucan Avenue,</strong>
                                        <br>Lucan, Dublin 22
                                        <br>Ireland.
                                        <br>Phone: +353 1 839 8392
                                        <br>Email: support@tcareagency.ie
                                    </address>
                      </div>
                      <!-- /.col -->
                     <!-- <div class="col-sm-4 invoice-col">
                        To
                        <address>
                                        <strong>John Doe</strong>
                                        <br>795 Freedom Ave, Suite 600
                                        <br>New York, CA 94107
                                        <br>Phone: 1 (804) 123-9876
                                        <br>Email: jon@ironadmin.com
                                    </address>
                      </div>-->
                      <!-- /.col -->
                     <!-- <div class="col-sm-4 invoice-col">
                        <b>Invoice #007612</b>
                        <br>
                        <br>
                        <b>Order ID:</b> 4F3S8J
                        <br>
                        <b>Payment Due:</b> 2/22/2014
                        <br>
                        <b>Account:</b> 968-34567
                      </div>-->
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
                        <table class="table table-striped">
                          <thead>


                            <tr>
                              <th>Firstname</th>
                                <th>Lastname</th>
                               <th>Username</th>
                              <th>Email</th>
                              <th>Date of Birth</th>

                             </tr>
                          </thead>
                            <tbody>


                            <tbody>
                            <?php $count = 1;?>
                            <?php

                            while($row =mysqli_fetch_array($res, MYSQLI_ASSOC))
                            {
                                if($count%2 == 0)
                                {
                                    ?>
                                    <tr class="even pointer">
                                        <td class=" "><?php echo htmlentities($row['FirstName'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['LastName'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['Username'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['DateOfBirth'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['EmailAddress'], ENT_QUOTES, 'UTF-8'); ?></td>

                                   </tr>
                                <?php }
                                else{
                                    ?>
                                    <tr class="odd pointer">
                                        <td class=" "><?php echo htmlentities($row['FirstName'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['LastName'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['Username'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['DateOfBirth'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class=" "><?php echo htmlentities($row['EmailAddress'], ENT_QUOTES, 'UTF-8'); ?></td>

                                    </tr>
                                <?php

                                }
                                $count++;
                            }
                            //endforeach;
                            ?>
                            </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->






                    <!--<div class="row">-->
                      <!-- accepted payments column -->
                     <!-- <div class="col-xs-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="images/visa.png" alt="Visa">
                        <img src="images/mastercard.png" alt="Mastercard">
                        <img src="images/american-express.png" alt="American Express">
                        <img src="images/paypal2.png" alt="Paypal">
                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                      </div>-->
                      <!-- /.col -->
                     <!-- <div class="col-xs-6">
                        <p class="lead">Amount Due 2/22/2014</p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
                              </tr>
                              <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                              </tr>
                              <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>-->
                      <!-- /.col -->
                    <!--</div>-->
                    <!-- /.row -->









                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                        <!--<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>-->
                       <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>-->
                        <button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="window.print();"><i class="fa fa-print"></i> &nbsp; <i class="fa fa-download"></i> Generate PDF/ Print</button>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <?php include_once('footer.php'); ?>
        <!-- /footer content -->

      </div>
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
