<?php //error_reporting(0);
include_once('CommonClass/common.php');
include_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();

if(!isset($_SESSION['AdminID'])){
    header("location:login.php?r=".base64_encode('uas'));
}

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


<?php
include_once('head.php');
?>






<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <?php include_once('nav_title.php') ?>

            <!-- menu prile quick info -->
            <?php include_once('menu_prile.php') ?>
            <!-- /menu prile quick info -->

          <br />

            <!-- sidebar menu -->
            <?php include_once('sidebar_menu.php') ?>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift Date <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="shiftDate" name="shiftDate" class="date-picker form-control col-md-7 col-xs-12" included="included" type="text">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">From time <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="fromtime" name="fromtime"  class="date-picker form-control col-md-7 col-xs-12" included="included" placeholder="">
                             <!-- class="form-control floating-label" <input id="birthday" name="birthday" value="<?php /*echo $dateofbirth */?>" class="date-picker form-control col-md-7 col-xs-12" included="included" type="text">placeholder="Time"-->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">To time <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input onchange="shiftDateDiff();" type="text" id="totime" name="totime"  class="date-picker form-control col-md-7 col-xs-12" included="included" placeholder="">
                              <!-- class="form-control floating-label" <input id="birthday" name="birthday" value="<?php /*echo $dateofbirth */?>" class="date-picker form-control col-md-7 col-xs-12" included="included" type="text">placeholder="Time"-->
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Hours <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input readonly id="NoOfHours"  name="NoOfHours" class="date-picker form-control col-md-7 col-xs-12" included="included" type="text">
                          </div>
                      </div>


                      <div class="form-group ">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Client <span class="included">*</span></label>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Carer <span class="included">*</span></label>
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
      <?php include_once('footer.php'); ?>
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
//date-format
          $('#date-format').bootstrapMaterialDatePicker
          ({
              format: 'dddd DD MMMM YYYY - HH:mm'
          });
          $('#date-format1').bootstrapMaterialDatePicker
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
       var tFTime = shiftD.concat(" ", ftime);
       var tTTime = shiftD.concat(" ", ttime);
       //tFTime = shiftD + " " + ftime;
       //tTTime = shiftDate + " " + ttime;
       var dFromTime = new Date(tFTime);
       var dToTime =  new Date(tTTime);
       var fHours = dFromTime.getHours();
       var fMinutes = dFromTime.getMinutes();
       var tHours = dToTime.getHours();
       var tMinutes = dToTime.getMinutes();

       var convFHourToMin = fHours*60;
       var convTHourToMin = tHours*60;

       var fromHourAndFromMin = convFHourToMin+fMinutes;
       var toHourAndToMin = convTHourToMin+tMinutes;
       var allMinutes = Math.abs(fromHourAndFromMin - toHourAndToMin);

       var finalHour = Math.floor(allMinutes/60);
       var  finalMinutes = allMinutes%60;
      var finalTime = finalHour.toString().concat(".",finalMinutes.toString());



       //var oneHour = 1000*60*60;
       //var vhours = Math.abs(fHours - tHours);
   // oneHour;
       //document.alert(dFromTime);
       document.getElementById("NoOfHours").value = finalTime;
        return false;
   }
</script>

</body>

</html>
