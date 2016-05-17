<?php
//error_reporting(0);
include_once("CommonClass/Common.php");
include_once("CommonClass/ClassManager.php");

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
    $msg = '<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
		 <strong>Oops!</strong> Please enter your login details!
		</div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="logout")
{
    $msg = '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Gracias!</strong> You have successfully logged out, see you soon!</div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="uas")
{
    $msg ='<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Oh Oh!</strong> Unauthorized access, Please log in
		</div>';
}elseif(isset($_GET['r']) && base64_decode($_GET['r'])=="inactiveuser")
{
    $msg = '<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Sorry!</strong> Your account has not been activated!
		</div>';
}




?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('head.php'); ?>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
                    TCare Plus HomeCare Dublin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="../frontend/index.php">
							Home
						</a></li>

						

						<li><a href="carer_registration.php">
                                Sign in
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" id="login-form" method="post" action="" autocomplete="off">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<div class="module-body">
                            <?php if(isset($msg)) echo $msg; ?>
                            <div class="control-group">
                                  <div class="controls">
                                    <select id="userType" name="userType"  data-placeholder="User Type.." class="span3">
                                        <option value="">User Type...</option>
                                        <option value="admin">Admin</option>
                                        <option value="carer">Carer</option>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                            <div class="controls row-fluid">
									<input class="span12" type="text" id="userId"  name="userId" placeholder="Username" autofocus>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" name="btnSignIn" class="btn btn-primary pull-right">Login</button>
									<label class="checkbox">
										<input type="checkbox"> Remember me
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

    <!--<div class="row">
        <div class="col-md-12">
            <div class="copy-right-text text-center"> &nbsp;&nbsp;&nbsp;
                &copy; Copyright <?php /*echo date('Y'); */?>, T-Care Plus HomeCare Dublin. All rights reserved.
            </div>
        </div>
    </div>-->
<?php include_once('footer.php'); ?>
</body>