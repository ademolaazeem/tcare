<?php
include_once('CommonClass/common.php');
include_once('CommonClass/ClassManager.php');
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

</head>

<?php include_once('head.php');?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

         <?php
         include_once('carer_nav_title.php');

         ?>


          <!-- menu prile quick info -->
      
            <?php include_once('menu_prile.php') ?>
          <!-- /menu prile quick info -->


          <br />

          <!-- sidebar menu -->
            <?php include_once('carer_side_menu.php'); ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
      
            <?php include_once('footer_buttons.php'); ?>

          <!-- /menu footer buttons -->
        </div>
      </div>

      
      <?php include_once('top_nav.php'); ?>
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
                        <textarea id="message" included="included" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
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
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['userid']." ORDER BY FIRSTNAME";
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
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['userid']." ORDER BY FIRSTNAME";
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
                                $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['userid']." ORDER BY FIRSTNAME";
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

                                 $query = "SELECT DISTINCT a.firstname FirstName, a.lastname LastName, a.patientid PatientID from `tblpatient` a, `tblcarer` b, `tblcarerroster` c where a.patientid = c.patientid and b.carerid  = c.carerid AND C.CARERID = ".$_SESSION['userid']." ORDER BY FIRSTNAME";
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
