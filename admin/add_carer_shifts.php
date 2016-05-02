<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentallela Alela! | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    <li><a href="index2.html">Dashboard2</a>
                    </li>
                    <li><a href="index3.html">Dashboard3</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Carers <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="manage_carer.php">Manage Carer</a>
                    </li>
                    
                    <li><a href="form_buttons.html">Form Buttons</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Clients <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="client_list.php">Manage Clients List</a>
                    </li>
                    <li><a href="add_newclients.html">Add New Clients</a>
                    </li>
                    
                  </ul>
                </li>
                
                  
               
                <li><a><i class="fa fa-bar-chart-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="chartjs.html">Chart JS</a>
                    </li>
                    <li><a href="chartjs2.html">Chart JS2</a>
                    </li>
                    <li><a href="morisjs.html">Moris JS</a>
                    </li>
                    <li><a href="echarts.html">ECharts </a>
                    </li>
                    <li><a href="other_charts.html">Other Charts </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              
              <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Assign Shifts to Carer <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="schedule_list.php">Schedule List </a>
                    </li>
                    <li><a href="add_carer_shifts.php">Assign Carer to client </a>
                    </li>
                   
                  </ul>
                </li>
                
               
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Manage Schedule </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">


                  



                  <!-- Tabs -->
                  <div id="wizard_verticle" class="form_wizard wizard_verticle">
                    <ul class="list-unstyled wizard_steps">
                      <li>
                        <a href="#step-11">
                          <span class="step_no">1</span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-22">
                          <span class="step_no">2</span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-33">
                          <span class="step_no">3</span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-44">
                          <span class="step_no">4</span>
                        </a>
                      </li>
                    </ul>

                    <div id="step-11">
                      <h2 class="StepTitle">Step 1 Content</h2>
                      <form class="form-horizontal form-label-left">

                        <span class="section">Assign Shift</span>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3" for="first-name">Date/Time Fr (yyyy-mm-dd hh:mm:ss) <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6">
                             <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3" for="last-name">Date/Time To (yyyy-mm-dd hh:mm:ss) <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6">
                             <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3">Client ID</label>
                          <div class="col-md-6 col-sm-6">
                            <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3">Carer ID</label>
                          <div class="col-md-6 col-sm-6">
                            <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3">Clients Gender</label>
                          <div class="col-md-6 col-sm-6">
                            <div id="gender2" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                              </label>
                              <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="female" checked=""> Female
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3">No Of Hours <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6">
                            <input id="noofhours"  required="required" type="text">
                          </div>
                        </div>
                         <input type="submit" name="submit" value="Add New Schedule" />

                      </form>
                    </div>
                    <div id="step-22">
                      <h2 class="StepTitle">Service User Details</h2>
					  
					  <h4> Tosin Jimoh</h4>
					 <u> <p>Comments</p></u>
                      <p>Osteoarthritis/ HTN / Anaemia - HOIST CASE TWO CARERS AT ALL TIMES. client has bad bed soures and does need to be transfered to the chair during the day (12/10/14)  
					  Morning visit assist with personal hygiene and hoist from bed. lunch visit to assist with personal hygiene and back into bed Private carers will assist Maura out of bed Night Visit to assist with personal care and hoist back into bed
                      
                      </p>
					  <h4>Eilleen Fin</h4>
					  <u><p>Comments</p></u>
					  
                      <p>
                        fracture to left arm very weak, has had mini strokes in the past and is a falls risk Morning visit - to assist with personal hygeine, dressing, breakfast and med prompt.Bladder/Bowel ELIMINATION-Bladder/Bowel Requires Assistance with toileting, walks with aid of  2 carer to bathroom at EACH  visit to use toilet Wears a pad day and night ensure same is checked  at each shift changed appropriately and perinum wash between each change enquire about bowels daily record and report any change
                        MOBILITY-REDUCED REQUIRES ASSISSTANCE ODF 2 CARERS WITH ALL TRANSFERS Ensure all transfers are carried out as per correct manual handling.
                       

                      </p>
                      <p>
					  <h4>Mary Adele</h4>
					  <u><p>Comments</p></u>
					   Mary is to be assisted in meal preparation, she does not usually get up out of bed until around 1pm. " please ensure she is dressed appropriately and ensure she takes her medication.PERSONAL CARE Brigid likes to wash with basin in bathroom  or while sitting in her chair in sitting room full assistance required Asssistance with lower extremities back an bottom Encourage brigid to wash what she can Wash required between each pad change
                       GROOMING Requires asssistance DO NOT CUT TOE OR FINGER NAILS
                         ORAL HYGIENE Requires prompt and set up
                      </p>
					  
					  <h4>Maura Fin</h4>
					  <u><p>Comments</p></u>
					  
                      <p>
                        PLEASE USE 142 WHEN LOGGING IN THIS HOUSE, DO NOT PRESS REDIAL AT ANYTIME, TYPE THE NUMBER IN AT ALL TIMES When logging in and out of Brigid Purcells house please ONLY USE the phone by the FRONT DOOR ONLY. This is hugely important She is a lady with a history of a fall she has a skint area in he left shin same being dressed by PHN  She is assisstance x2 at all times Full Cognitive ability 
                         Meals on wheels delivered mon to friday with weekend meals included Has a private carer who looks in on her Collette Has home help Brenda mon to fri
                         fully continent Lives down stairs with bedroom to front of house has bathroom downstairs
                      </p>
					 <h4>Butt Ali</h4>
					  <u><p>Comments</p></u>
                      <p>
                        Dementia/Renal Failure/Glaucoma Do not bring Mr Butt for a walk in the evenings unless a family member is with you Personal Care " Full assistance  with shower daily, ensure Clients dignity at all times. " Full assistance with drying " Please apply oil to Ali's legs " Full assistance with shaving. " Ensure skin nails (do not trim nails) and hair are kept in good condition, report any changes to office " Dentures are kept in glass overnight
                        Grooming/Dressing " Full assistance required in all aspects of dressing Mobility/Transfers " Transfers are independent allow Ali time to stand and gain her balance
                         Continence/ incontinence " Ali is doubly incontinent. Check skin area completely and each shift " Ensure Ali has clean incontinence pad.  Dispose and discard used pad in an appropriate way.
                      </p>
                    </div>
                    <div id="step-33">
                      <h2 class="StepTitle">Step 3 Content</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                    </div>
                    <div id="step-44">
                      <h2 class="StepTitle">Step 4 Content</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                    </div>
                  </div>

                  <!-- End SmartWizard Content -->


                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
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
  <!-- form wizard -->
  <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      // Smart Wizard
      $('#wizard').smartWizard();

      function onFinishCallback() {
        $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        //alert('Finish Clicked');
      }
    });

    $(document).ready(function() {
      // Smart Wizard
      $('#wizard_verticle').smartWizard({
        transitionEffect: 'slide'
      });

    });
  </script>

</body>

</html>
