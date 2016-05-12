<?php
require_once('CommonClass/common.php');
require_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();
$carerID = $_SESSION['userid'];
$query = "
        SELECT c.CarerID carerid, ch.DateFrom DateFrom, ch.DateTo DateTo, ch.NoOfDays NoOfDays, ch.status status, ch.reason reason, ch.ApprovedOn,
        concat(ad.firstname,' ', ad.lastname) as approvedby FROM tblcarer c,
         tblcarerholiday ch, tbladmin ad where ch.ApprovedByAdminID = ad.AdminID
                                            and c.CarerID=ch.CarerID and c.CarerID='$carerID'
                                            and ch.status='Pending'";

$res=mysqli_query($db->getConnection(), $query) or die(mysql_error());

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
            <?php require_once('carer_side_menu.php') ?>
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
      <!-- page content -->
      <div class="right_col" role="main">
      <div class="">
      <div class="page-title">
          <div class="title_left">
              <h3>
                  Manager
                  <small>
                      List of Approved Holidays
                  </small>
              </h3>
          </div>

          <!--<div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                  </div>
              </div>
          </div>-->
      </div>
      <div class="clearfix"></div>

      <div class="row">


      <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
          <h2>Administrator's <small>management page</small></h2>
          <ul class="nav navbar-right panel_toolbox">
              <li><a href="#"><i class="fa fa-chevron-up"></i></a>
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
              <li><a href="#"><i class="fa fa-close"></i></a>
              </li>
          </ul>
          <div class="clearfix"></div>
      </div>


          <div class="x_content">
         <table id="example" class="table table-striped responsive-utilities jambo_table">
      <thead><!-- table table-striped responsive-utilities jambo_table -->
      <tr class="headings">
          <th>
              <input type="checkbox" class="tableflat">
          </th>

          <th>Date From </th>
          <th>Date To </th>
          <th>No Of Days</th>
          <th>Status</th>
          <th>Reason</th>
          <th>Pended by </th>
          <!--<th class=" no-link last"><span class="nobr">Action</span>-->
          </th>
      </tr>
      </thead>

      <tbody>
    <?php $count = 1;?>
      <?php
      $resultCount = mysqli_num_rows($res);
      if($resultCount > 0) {
          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
              if ($count % 2 == 0) {
                  ?>


                  <tr class="even pointer">
                      <td class="a-center "><input type="checkbox" class="tableflat"></td>
                      <td class=" "><?php echo htmlentities($row['DateFrom'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['DateTo'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['NoOfDays'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['reason'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['approvedby'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <!--<td><a href=manage_existing_roster.php?CarerRosterID=<?php /*echo $row['CarerRosterID']; */ ?>> Edit</a></td>-->
                  </tr>
              <?php
              } else {
                  ?>
                  <tr class="odd pointer">
                      <td class="a-center "><input type="checkbox" class="tableflat"></td>
                      <td class=" "><?php echo htmlentities($row['DateFrom'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['DateTo'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['NoOfDays'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['reason'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <td class=" "><?php echo htmlentities($row['approvedby'], ENT_QUOTES, 'UTF-8'); ?></td>
                      <!--<td><a href=manage_existing_roster.php?CarerRosterID=<?php /*echo $row['CarerRosterID']; */ ?>> Edit</a></td>-->
                  </tr>
              <?php

              }
              $count++;
          }
      }
      else
      {
          ?>
          <tr class="odd pointer">
              <td align="center" colspan="7" class=" "><?php echo "Sorry! no data found!"; ?></td>
          </tr>
      <?php
      }
      ?>

    </tbody>

      </table>
      </div>
      </div>
      </div>

      <br />
      <br />
      <br />

      </div>
      </div>
      <!-- footer content -->
       <?php require_once('footer.php'); ?>
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
