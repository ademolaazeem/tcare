<?php
//error_reporting(0);
require_once("CommonClass/Common.php");
require_once("CommonClass/ClassManager.php");

$db = new Connection();
$adm = new AdminClassController();

if(isset($_POST['btnSignIn']))
{
    $msg = $adm->adminLogin();
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
              <input type="text" class="form-control" placeholder="Username" id="userId"  name="userId" autofocus required />
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
          <form id="signupForm" method="POST" action="">
            <h1>Create Account</h1>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="firstname">Firstname <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="firstname" name="firstname" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Firstname" required="required" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="lastname">Lastname <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="lastname" name="lastname" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Firstname" required="required" type="text">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="username" name="username" class="form-control col-md-8 col-xs-12" data-validate-length-range="6"
                             data-validate-words="2" placeholder="Username" required="required" type="text">
                  </div>
              </div>
             <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="email" id="email" name="email" placeholder="Email"  required="required" class="form-control col-md-8 col-xs-12">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="email2">Confirm Email <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="email" id="email2" name="confirm_email" data-validate-linked="email"  placeholder="Confirm Email" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="password">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-8 col-xs-12"
                             placeholder="Password"  required="required">
                  </div>
              </div>

              <div class="item form-group">
                  <label for="password2" class="control-label col-md-4 col-sm-4 col-xs-12">Confirm Password<span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="password2" type="password" name="password2" placeholder="Confirm Password"
                             data-validate-linked="password" class="form-control col-md-8 col-xs-12" required="required">
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Gender<span class="required">*</span></label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <select class="form-control">
                          <option>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="address">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <textarea id="address" required="required" name="address" placeholder="Address" class="form-control col-md-8 col-xs-12"></textarea>
                  </div>
              </div>


              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="phone">Phone Number <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="phone" name="phone" class="form-control col-md-8 col-xs-12" data-validate-length-range="15" data-validate-words="2" placeholder="Phone Number" required="required" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Date Of Birth <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="birthday" class="date-picker form-control col-md-8 col-xs-12" required="required" type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="pps">PPS Number <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <input id="pps" name="pps" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="PPS Number" required="required" type="text">
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

</body>

</html>
