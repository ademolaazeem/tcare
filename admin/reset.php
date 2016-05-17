<?php //error_reporting(0);
include_once('CommonClass/common.php');
include_once('CommonClass/ClassManager.php');
$db = new DBConnections();
$adm = new AdminClassController();
$conn= $db->getConnection();
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

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Reset Password</h3>
            </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                    <br />

                    <?php if(isset($msg)) echo $msg; ?>
                                       
                      <?php
                      //file reset.php
                      //title:Build your own Forgot Password PHP Script
                      //session_start();
                      $token=$_GET['token'];
					  $userType=$_GET['type'];

                     // if(!isset($_POST['password'])){
                          $q="select email from tokens where token='".$token."' and used=0";

                          $r=mysqli_query($conn, $q);
                          while($row=mysqli_fetch_assoc($r))
                          {
                              $email=$row['email'];
                          }
                          If ($email!=''){
                              $_SESSION['email']=$email;

                          //added this
                             // mysql_real_escape_string($_POST['password'])
                              $pass=mysqli_real_escape_string($conn, $_POST['password']);
                              $cpass=mysqli_real_escape_string($conn, $_POST['cpassword']);
                              //$cpass=mysql_real_escape_string($_POST['cpassword']);
                              //$pass=$_POST['password'];
                              $email=$_SESSION['email'];
                              //if(!isset($pass)){
                              echo '<form name="frmReset" method="post" action="" autocomplete="off">
                          <fieldset>
                              <br /><br />
                              <legend style="color: #00A800">Provide your password</legend>


                                  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password: <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" id="login" name="password" class="date-picker form-control col-md-7 col-xs-12">
                          </div>
                      </div>
						<BR/>
						<BR/>
                       <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password: <span class="included">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" id="login" name="cpassword" class="date-picker form-control col-md-7 col-xs-12">
                          </div>
                      </div>
						
						<BR/>
						<BR/>
                       <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-primary"><a href="login.php">Cancel</a></button>
                        <button type="submit" name="btnResetPassword" class="btn btn-success">Reset My Password</button>

                      </div>
                    </div>



                          </fieldset>
                      </form>';
                              //}

                              if(isset($_POST['password'])&& isset($_SESSION['email']))
                              {

                                  if( strlen($_POST['password']) < 8 ) {

                                      echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Password too short!
             </div>'; 

                                  }

                                  else if( strlen($_POST['password']) > 20 ) {

                                      echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Password too long!
             </div>'; 
                                      //echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Password too long!</div></strong>';
                                  }

                                  else if( !preg_match("#[0-9]+#", $_POST['password']) ) {
									  echo'<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Password must include at least one number!
             </div>'; 
                       
                                      //echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Password must include at least one number!</div></strong>';

                                  }


                                  else if( !preg_match("#[a-z]+#", $_POST['password']) ) {
									  echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Password must include at least one letter!
             </div>';
                                      //echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Password must include at least one letter!</div></strong>';
                                  }


                                  else if( !preg_match("#[A-Z]+#", $_POST['password']) ) {
									  echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Password must include at least one CAPS!
             </div>';
                                     // echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Password must include at least one CAPS!</div></strong>';
                                  }
                                  /** if( !preg_match("#\W+#", $password) ) {
                                  $error .= "Password must include at least one symbol!";
                                  }*/
                                  //
                                  else if($_POST['password'] != $_POST['cpassword']){

                                     echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure your password are match!
             </div>';
			 //echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Please make sure your password are match!</div></strong>';
                                  }
                                  else{

									if($userType=="admin"){
                                  $q="update tbladmin set Password='".sha1($pass)."' where EmailAddress='".$email."'";
								  }
								  elseif($userType=="carer"){
									$q="update tblcarer set Password='".sha1($pass)."' where EmailAddress='".$email."'";  
									  }
                                  $r=mysqli_query($conn, $q);
                                  if($r){
									  mysqli_query($conn, "update tokens set used=1 where token='".$token."'");
								   echo '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>Your password is changed successfully!</p>
                              </div>';
                                  //echo '<strong><div style= "font-size: medium; color:green; align-content:center";>Your password is changed successfully!</div></strong>';
								}
                                 elseif(!$r)
									  echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> An error occurred from database!
             </div>';
                                      //echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">An error occurred from database!</div></strong>';
                                  }

                              }

                              //end added this





                          }
                          else
							   echo '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid link or Password already changed!
             </div>';
                             // echo '<strong><div style= "font-size: medium; color:orangered; align-content:center">Invalid link or Password already changed!</div></strong>';

                     // }


                      ?>



				 </div>
              </div>
            </div>
          </div>






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


</body>

</html>
