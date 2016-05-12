<?php //error_reporting(0);
require_once('CommonClass/common.php');
require_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();

if(!isset($_SESSION['AdminID'])){
    header("location:login.php?r=".base64_encode('uas'));
}

if(isset($_POST['sendMailToAskForCover']))
{
    $msg = $adm->sendMailToAskForCover();
}
?>


<!DOCTYPE html>
<html lang="en">





<?php require_once('head.php');?>

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
              <h3>Edit Carer</h3>
            </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">

                <div class="x_content">
   <br />

                    <?php if(isset($msg)) echo $msg; ?>
                  <form id="demo-form2" name="rostering" data-parsley-validate class="form-horizontal form-label-left" method="post">

                     <!-- <input type="hidden" id="patientid" name="patientid" value="<?php /*echo $patientid */?>" maxlength="50" />-->
                      <div class="form-group ">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Schedule<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<div class="col-md-6 col-xs-11">-->

                              <select name="CarerRosterID" id="CarerRosterID" class="form-control m-bot15" onchange="getroster();">
                                  <!-- <select class="form-control" name="active" id="active">-->
                                  <option value="">-- Select --</option>
                                  <?php
                                  $query = "SELECT cr.CarerRosterID CarerRosterID, c.CarerID carerid, concat(c.firstname,' ', c.lastname) as carername, concat(pt.FirstName, ' ', pt.LastName) as patientname,
cr.DateFrom DateFrom, cr.DateTo DateTo FROM tblcarer c, tblpatient pt, tblcarerroster cr where c.CarerID= cr.CarerID and cr.PatientID=pt.PatientID and
Cancelled=0 and SubmittedOn is null";
                                  $conn=$db->getConnection();
                                  $result = mysqli_query($conn, $query);
                                  while($row=mysqli_fetch_assoc($result))

                                  {
                                      if($row['CarerRosterID']==@CarerRosterID){echo "<option selected value='$row[CarerRosterID]'>[ $row[carername]] Assigned to  [ $row[patientname] ] between [ $row[DateFrom] ] and  [ $row[DateTo] ] </option>"."<BR>";}
                                      else{echo  "<option selected value='$row[CarerRosterID]'>[ $row[carername] ] Assigned to  [ $row[patientname] ] between [ $row[DateFrom] ] and [ $row[DateTo] ] </option>";}

                                      //echo "<option value='".$row['role_id']."'>".$row['name']."</option>";
                                  }

                                  ?>
                              </select>
                          </div>

                      </div>

                   <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Message <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!-- <input onclick="getroster();" type="text" id="comments" class="form-control" name="comments" required />-->
                              <textarea readonly  id="message" required="required" rows="6" class="form-control" name="message" text-align="left"></textarea>
                          </div>
                      </div>





                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" name="sendMailToAskForCover" class="btn btn-success">Send mail to ask for cover</button>

                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#birthday').daterangepicker({
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
  <script type="text/javascript">
      function getroster(){
         var txtResult="";
         var roster = document.getElementById("CarerRosterID");
         var rosterValue = roster.options[roster.selectedIndex].text;
         txtResult = txtResult.concat("We are looking for Cover for ", rosterValue.toString(), ", Please logon to your profile and show interest only if you are not occupied " +
         " at this time. We will assign to the first person that replies. Thanks.");
             //document.rostering.comments.value = txtResult;
          document.getElementById("message").value =txtResult;
          return false;

      }
      </script>
  <!-- /editor -->
</body>

</html>
