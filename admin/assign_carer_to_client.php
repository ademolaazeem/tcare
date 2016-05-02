<?php //error_reporting(0);
require_once('CommonClass/common.php');
require_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();

if(isset($_POST['assignShift']))
{
    $msg = $adm->assignShift();
}
?>
<?php

// First we execute our CommonClass code to connection to the database and start the session


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <title>TCare Plus HomeCare | Dublin </title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">


    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/editor/index.css" rel="stylesheet">

    <!-- select2 -->
    <link href="css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="css/switchery/switchery.min.css" />

    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!--time from new bootstrap-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
    <link rel="stylesheet" href="bootstrap-material/css/bootstrap-material-datetimepicker.css" />
    <!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>-->
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="bootstrap-material/js/bootstrap-material-datetimepicker.js"></script>
    <!--end time from new bootstrap-->



</head>






<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <?php require_once('nav_title.php') ?>

            <!-- menu prile quick info -->
            <?php require_once('menu_prile.php') ?>
            <!-- /menu prile quick info -->

          <br />

            <!-- sidebar menu -->
            <?php require_once('sidebar_menu.php') ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php require_once('footer_buttons.php'); ?>
            <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require_once('top_nav.php'); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Assign Shift</h3>
            </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
               <!-- <div class="x_title">
                  <h2>Form Design <small>different form elements</small></h2>
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
                </div>-->
                <div class="x_content">












                    <br />

                    <?php if(isset($msg)) echo $msg; ?>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                     <!-- <input type="hidden" id="carerid" name="carerid"  maxlength="50" />
                      </p>-->

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift Date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="shiftDate" name="shiftDate" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">From time <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="fromtime" name="fromtime"  class="date-picker form-control col-md-7 col-xs-12" required="required" placeholder="">
                             <!-- class="form-control floating-label" <input id="birthday" name="birthday" value="<?php /*echo $dateofbirth */?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">placeholder="Time"-->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">To time <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="totime" name="totime"  class="date-picker form-control col-md-7 col-xs-12" required="required" placeholder="">
                              <!-- class="form-control floating-label" <input id="birthday" name="birthday" value="<?php /*echo $dateofbirth */?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">placeholder="Time"-->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Hours <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="NoOfHours" onfocus="shiftDateDiff()" name="NoOfHours" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                          </div>
                      </div>


                      <div class="form-group ">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Client <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<div class="col-md-6 col-xs-11">-->

                              <select name="PatientID" id="PatientID" class="form-control m-bot15" onchange="reload(this.form)">
                                 <!-- <select class="form-control" name="active" id="active">-->
                                  <option value="">-- Select --</option>

                                  <?php

                                  $query = "SELECT PatientID, FirstName, LastName FROM `tblpatient`";
                                  $conn=$db->getConnection();
                                  //$this->db->getConnection();
                                  $result = mysqli_query($conn, $query);
                                  //, MYSQL_ASSOC
                                  //_fetch_array($result,MYSQL_BOTH))
                                  while($row=mysqli_fetch_assoc($result))

                                  {
                                      if($row['PatientID']==@$PatientID){echo "<option selected value='$row[PatientID]'>$row[FirstName]. ' '.$row[LastName] </option>"."<BR>";}
                                      else{echo  "<option value='$row[PatientID]'>$row[FirstName]  $row[LastName]</option>";}

                                      //echo "<option value='".$row['role_id']."'>".$row['name']."</option>";
                                  }

                                  ?>
                         </select>
                          </div>

                      </div>


                      <div class="form-group ">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Carer <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<div class="col-md-6 col-xs-11">-->

                              <select name="CarerID" id="CarerID" class="form-control m-bot15" onchange="reload(this.form)">
                                  <!-- <select class="form-control" name="active" id="active">-->
                                  <option value="">-- Select --</option>

                                  <?php

                                  $query = "SELECT CarerID, FirstName, LastName FROM `tblcarer`";
                                  $conn=$db->getConnection();
                                  $result = mysqli_query($conn, $query);
                                  while($row=mysqli_fetch_assoc($result))

                                  {
                                      if($row['CarerID']==@$CarerID){echo "<option selected value='$row[CarerID]'>$row[FirstName]  $row[LastName] </option>"."<BR>";}
                                      else{echo  "<option value='$row[CarerID]'>$row[FirstName]  $row[LastName]</option>";}

                                      //echo "<option value='".$row['role_id']."'>".$row['name']."</option>";
                                  }

                                  ?>
                              </select>
                          </div>

                      </div>





                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" name="assignShift" class="btn btn-success">Assign Shift</button>

                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#shiftDate').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
              }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
              });
            });
          </script>






        </div>
        <!-- /page content -->

        <!-- footer content -->
      <?php require_once('footer.php'); ?>
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

<!--Wickedpicker-->
  <!-- jquery-1.11.3.min.js-->



  <script type="text/javascript">
      $(document).ready(function()
      {
          $('#date').bootstrapMaterialDatePicker
          ({
              time: false,
              clearButton: true
          });

          $('#fromtime').bootstrapMaterialDatePicker
          ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
          });

          $('#totime').bootstrapMaterialDatePicker
          ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
          });

          $('#date-format').bootstrapMaterialDatePicker
          ({
              format: 'dddd DD MMMM YYYY - HH:mm'
          });
          $('#date-fr').bootstrapMaterialDatePicker
          ({
              format: 'DD/MM/YYYY HH:mm',
              lang: 'fr',
              weekStart: 1,
              cancelText : 'ANNULER',
              nowButton : true,
              switchOnClick : true
          });

          $('#date-end').bootstrapMaterialDatePicker
          ({
              weekStart: 0, format: 'DD/MM/YYYY HH:mm'
          });
          $('#date-start').bootstrapMaterialDatePicker
          ({
              weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
          }).on('change', function(e, date)
          {
              $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
          });

          $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

          $.material.init()
      });
  </script>
<!--Wickedpicker-->
<script type="application/javascript">
   function shiftDateDiff(){
       var shiftD = document.getElementById("shiftDate").value;
       var ftime = document.getElementById("fromtime").value;
       var ttime = document.getElementById("totime").value;
       var dFromTime = new Date(shiftDate + " " + ftime);
       var dToTime =  new Date(shiftDate + " " + ttime);
       var fHours = dFromTime.getHours();
       var tHours = dToTime.getHours();
       var hours = Math.abs(fHours - tHours) / 36e5;
       document.alert(dFromTime);
       document.getElementById("NoOfHours").value = hours

   }
</script>

</body>

</html>
