<?php
//error_reporting(0);
require_once("CommonClass/Common.php");
require_once("CommonClass/ClassManager.php");

$db = new DBConnections();
$adm = new AdminClassController();

if(isset($_POST['btnSignIn']))
{
    $msg = $adm->adminLogin();
}
else if(isset($_POST['btnRegister'])){
    $msgC = $adm->addCarer();
}

if(isset($_GET['r']) && base64_decode($_GET['r'])=="failed")
{
    $msg =  '<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> Invalid Username or Password!
									</div>';
}
elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="empty")
{
    $msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                 <strong>Oops!</strong> Please enter your login details!
                </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="logout")
{
    $msg = '<div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Gracias!</strong> You have successfully logged out, see you soon!
                  </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="uas")
{
    $msg ='<div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Oh Oh!</strong> Unauthorized access, Please log in
                </div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="inactiveuser")
{
    $msg = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Sorry!</strong> Your account has not been activated!
                </div>';
}






?>
<!DOCTYPE html>
<html lang="en">

<?php require_once('head.php'); ?>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form id="login-form" method="post" action="" autocomplete="off">
            <h1>Login Form</h1>

              <?php if(isset($msg)) echo $msg; ?>


              <div>
              <input  type="text" class="form-control" placeholder="Username" id="userId"  name="userId" autofocus required />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" />
            </div>
              <div><select id="userType" name="userType" data-placeholder="User Type..." class="form-control" required>
                      <option value="">User Type...</option>
                      <option value="admin">Admin</option>
                      <option value="carer">Carer</option>
                  </select>
              </div>
            <div>
                <br/>
             <!-- <a class="btn btn-default submit" href="index.html">Log in</a>-->
                <button type="submit" name="btnSignIn" class="btn btn-default submit">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">A New Carer?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
              <p>&copy; <?php echo date('Y');?> T-Care Plus HomeCare Dublin. </b> All rights reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>



        <div id="register" class="animate form">
        <section class="login_content">
          <form id="signupForm" method="POST" action="" autocomplete="on">
            <h1>Create Account</h1>
              <?php if(isset($msgC)) echo $msgC; ?>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="firstname">Firstname <span class="required">*</span>
                  </label>

                  <!--value = "--><?php /*if(isset($username)) echo $username; */?>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="firstname" name="firstname" class="form-control col-md-8 col-xs-12"  placeholder="Firstname"  type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="lastname">Lastname <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="lastname" name="lastname" class="form-control col-md-8 col-xs-12"  placeholder="Firstname"  type="text">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="username" name="username" class="form-control col-md-8 col-xs-12"
                              placeholder="Username"  type="text">
                  </div>
              </div>
             <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="email" id="email" name="email" placeholder="Email"  class="form-control col-md-8 col-xs-12">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="email2">Confirm Email <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="email" id="email2" name="email2"   placeholder="Confirm Email"  class="form-control col-md-7 col-xs-12">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="password">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="password" type="password" name="password"  class="form-control col-md-8 col-xs-12"
                             placeholder="Password">
                  </div>
              </div>

              <div class="item form-group">
                  <label for="password2" class="control-label col-md-4 col-sm-4 col-xs-12">Confirm Password<span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="password2" type="password" name="password2" placeholder="Confirm Password"
                             data-validate-linked="password" class="form-control col-md-8 col-xs-12">
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Gender<span class="required">*</span></label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <select class="form-control" id = "sex" name = "sex">
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                  </div>
              </div>

                  &nbsp;
                  &nbsp;


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="address">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <textarea id="address" name="address" placeholder="Address" class="form-control col-md-8 col-xs-12"></textarea>
                  </div>
              </div>

              &nbsp;
              &nbsp;


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="phone">Phone Number <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="phone" name="phone" class="form-control col-md-8 col-xs-12" data-validate-length-range="15"  placeholder="Phone Number" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="phone">County <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="county" name="county" class="form-control col-md-8 col-xs-12"  placeholder="County" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Date Of Birth <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="birthday" name="birthday" class="date-picker form-control col-md-8 col-xs-12" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="pps">PPS Number <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="pps" name="pps" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" placeholder="PPS Number"  type="text">
                  </div>
              </div>


            <div class="col-md-6 col-md-offset-3">
              <!--<a class="btn btn-default submit" href="index.html">Submit</a>-->

                <button type="submit" name="btnRegister" class="btn btn-default submit">Register</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                 <p>&copy; <?php echo date('Y');?> T-Care Plus HomeCare Dublin. </b> All rights reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>






  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- form validation -->
  <script src="js/validator/validator.js"></script>
  <script>




      // initialize the validator function
      validator.message['date'] = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
          .on('blur', 'input[required], input.optional, select.required', validator.checkField)
          .on('change', 'select.required', validator.checkField)
          .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required')
          .on('keyup blur', 'input', function() {
              validator.checkField.apply($(this).siblings().last()[0]);
          });

      // bind the validation to the form submit event
      //$('#send').click('submit');//.prop('disabled', true);

      $('form').submit(function(e) {
          e.preventDefault();
          var submit = true;
          // evaluate the form using generic validaing
          if (!validator.checkAll($(this))) {
              submit = false;
          }

          if (submit)
              this.submit();
          return false;
      });

      /* FOR DEMO ONLY */
      $('#vfields').change(function() {
          $('form').toggleClass('mode2');
      }).prop('checked', false);

      $('#alerts').change(function() {
          validator.defaults.alerts = (this.checked) ? false : true;
          if (this.checked)
              $('form .alert').remove();
      }).prop('checked', false);
  </script>






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

</body>

</html>
