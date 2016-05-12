﻿<?php
require_once('CommonClass/common.php');
require_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();


//echo "My page name is:".$_SERVER['PHP_SELF'];


//$featurename =mysqli_real_escape_string($_POST['featurename']);
//$featurdescription = mysql_real_escape_string($_POST['featurdescription']);


if(isset($_POST['cancelShift']))
  {
    $msgC = $adm->cancelShift();
  }

?>

<!DOCTYPE html>
<html lang="en">

<!--<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentellela Alela! | </title>



  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">


  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="css/editor/index.css" rel="stylesheet">

  <link href="css/select/select2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/switchery/switchery.min.css" />

  <script src="js/jquery.min.js"></script>


        <script src="../assets/js/ie8-responsive-file-warning.js"></script>



          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        -->

</head>

<?php require_once('head.php');?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

         <?php
         require_once('carer_nav_title.php');

         ?>


          <!-- menu prile quick info -->
         <!-- <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>-->

            <?php require_once('menu_prile.php') ?>
          <!-- /menu prile quick info -->


          <br />

          <!-- sidebar menu -->
          <!--<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php">Dashboard</a>
                    </li>
                    <li><a href="index2.html">Dashboard2</a>
                    </li>
                    <li><a href="index3.html">Dashboard3</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Roster <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="view_roster.php">View My Schedule</a>
                    </li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Book Holiday <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                                        
                    <li><a href="past_holiday.php">Past Holiday</a>
                    </li>
                     <li><a href="current_holiday.php">Current Holiday</a>
                    </li>
					<li><a href="future_holiday.php">Future Holiday</a>
                    </li>
					<li><a href="book_holiday.php">Book Holiday</a>
                  </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Time-sheet <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                   <li><a href="upload_timesheet.php">Upload Time sheet  </a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> Cancel Shifts <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    
                    <li><a href="other_charts.html">Other Charts </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            
          </div>-->
            <?php require_once('carer_side_menu.php'); ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
         <!-- <div class="sidebar-footer hidden-small">
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
          </div>-->

            <?php require_once('footer_buttons.php'); ?>

          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <!--<div class="top_nav">

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

      </div>-->

      <?php require_once('top_nav.php'); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

         
          <div class="clearfix"></div>
          

          

          <div class="row">
           

            <div class="col-md-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Cancellation of Shift <small>Choose client to cancel </small></h2>
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
                  <br />
                   <?php if(isset($msgC)) echo $msgC; ?>
               <form id="demo-form" data-parsley-validate method="POST" autocomplete="on">
                    <label for="fullname">Full Name * :</label>
                    <input type="text" id="fullname" class="form-control" name="fullname" required />

                    <label for="email">Email * :</label>
                    <input type="email" id="email" class="form-control" name="email"  data-parsley-trigger="change" required />

                    <label>Gender *:</label>
                    <p>
                      M:
                      <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                      <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                    </p>

                    
                    
                    
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="reason" id="reason" value ="<?php if(isset($reason)) echo $reason;?>">
                          <option value = "">Choose option</option>
                          <option value="Busy">Busy</option>
                          <option value="The place is far">The place is far</option>
                          <option value="Need another Carer">Need another Carer</option>
                          <option value="The client doesnt want me">The client doesnt want me</option>
                        </select>
                      </div>
                    </div>
					 <label for="message">Other (20 chars min, 100 max) :</label>
                        <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                          data-parsley-validation-threshold="10">
                         
                          </textarea>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cancel Client </label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                        
                        <select name="patientId0" id="patientId0" class="select2_group form-control"
                        value ="<?php if(isset($patientId0)) echo $patientId0;?>"
                        >
                       <option value="">--- Select ---</option>

                               <?php
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['CarerID']." ORDER BY FIRSTNAME";
                               // and c.carerid=$carerid
                               $conn=$db->getConnection();
                               //$this->db->getConnection();
                               $result = mysqli_query($conn, $query);


                                while($row=mysqli_fetch_assoc($result))
                                {
                                   echo "<option value='".$row['PatientID']."'>".$row['FirstName']." ".$row['LastName']."</option>";
                                }
                               ?>
                         </select>
                        </div>
                      </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cancel Client </label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                        
                        <select name="patientId1" id="patientId1" class="select2_group form-control"
                         value ="<?php if(isset($patientId1)) echo $patientId1;?>">
                       <option value="">--- Select ---</option>

                               <?php
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['CarerID']." ORDER BY FIRSTNAME";
                               // and c.carerid=$carerid
                               $conn=$db->getConnection();
                               //$this->db->getConnection();
                               $result = mysqli_query($conn, $query);

                               while($row=mysqli_fetch_assoc($result))
                                {
                                   echo "<option value='".$row['PatientID']."'>".$row['FirstName']." ".$row['LastName']."</option>";
                                }
                               ?>
                         </select>
                        </div>
                      </div>
                 <!--  </div>  -->


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cancel Client </label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                        
                        <select name="patientId2" id="patientId2" class="select2_group form-control"
                         value ="<?php if(isset($patientId2)) echo $patientId2;?>">
                       <option value="">--- Select ---</option>
                               <?php
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['CarerID']." ORDER BY FIRSTNAME";
                               // and c.carerid=$carerid
                               $conn=$db->getConnection();
                               //$this->db->getConnection();
                               $result = mysqli_query($conn, $query);

                               while($row=mysqli_fetch_assoc($result))
                                {
                                   echo "<option value='".$row['PatientID']."'>".$row['FirstName']." ".$row['LastName']."</option>";
                                }
                               ?>
                              
                              
                         </select>
                        </div>
                      </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cancel Client </label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                        
                        <select name="patientId3" id="patientId3" class="select2_group form-control"
                        value ="<?php if(isset($patientId3)) echo $patientId3;?>">>
                       <option value="">--- Select ---</option>

                               <?php

                                 $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['CarerID']." ORDER BY FIRSTNAME";
                               // and c.carerid=$carerid
                               $conn=$db->getConnection();
                               //$this->db->getConnection();
                               $result = mysqli_query($conn, $query);
                               $result = mysqli_query($conn, $query);
                               //, MYSQL_ASSOC
                               //_fetch_array($result,MYSQL_BOTH))
                               while($row=mysqli_fetch_assoc($result))
                                {
                                   echo "<option value='".$row['PatientID']."'>".$row['FirstName']." ".$row['LastName']."</option>";
                                }
                               ?>
                         </select>
                        </div>
                      </div>
                    















                     <br/>
                      <button type="submit" name="cancelShift" id="cancelShift" class="btn btn-success">Cancel Shift</button>
                        <!-- <span class="btn btn-primary">Cancel Shift</span> -->



                    <div class="ln_solid"></div>
                   

                  </form>
                </div>
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
  <!-- tags -->
  <script src="js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="js/editor/bootstrap-wysiwyg.js"></script>
  <script src="js/editor/external/jquery.hotkeys.js"></script>
  <script src="js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  <script src="js/custom.js"></script>


  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->
  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
  <!-- editor -->
  <script>
    $(document).ready(function() {
      $('.xcxc').click(function() {
        $('#descr').val($('#editor').html());
      });
    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });
  </script>
  <!-- /editor -->
</body>

</html>