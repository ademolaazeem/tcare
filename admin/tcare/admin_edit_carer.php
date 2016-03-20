	<!DOCTYPE html>
<html>
 <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/respect.css" />
<head>

<title>T-Care Homecare Dublin</title>
<div id ="header"style="height: 155px;
 padding: 0; text-align: center;
background:green; margin-left:30px;color: #D4E6F4; clear :both; height: margin-right:30px; padding: 1em; font-size:bold ; width:1200px"}/>

<nav class="top-bar"style="background:#D4E6F4;">
<h4 style="color: white;"></h4>

<ul class="title_area">
<li class="name"style="background: #D4E6F4;"><h5><a href="#"style="color:black; background:font-style:italic;font-size:20px;font-weight:bold">T-Care Homecare Dublin</a></h5></li>
<h6 style="color:black;text-align:center;font size:15px;font-style:italic;"></h6>
 
<li class="toggle-topbar menu icon"><a href="#"><span>menu</span></a></li>
</ul>
<section class="top-bar-section"style="margin-left:70px;margin-right:70px;">
<ul class="left">
<li class="divider"></li>
<li class="active"><a href="edit_admin_account.php"style="color:green;background:white;">Edit My Account</a></li>
<li class="divider"></li>
<li class="active"><a href="admin_manage_patients.php"style="color:green;background:white;">Manage Patients</a></li>
<li class="divider"></li>
<li class="active"><a href="admin_manage_carers.php"style="color:green;background:white;">Manage Carers</a></li>
<li class="divider"></li>
<li class="active"><a href="admin_manage_schedule.php"style="color:green;background:white;">Manage Schedule</a></li>
<li class="divider"></li>
<li class="active"><a href="manage_admin_users.php"style="color:green;background:white;">Manage Admin Users</a></li>
<li class="divider"></li>
<li class="active"><a href="admin_reports.php"style="color:green;background:white;">Admin Reports</a></li>
<li class="divider"></li>
<li class="active"><a href="admin_logout.php"style="color:green;background:white;">Log Out</a></li>
<li class="divider"></li>
</ul>
</section>
</nav>
  
 </head>  
  <body style="background:white;">
<h5  style="background:black;color:white;font-style:italic;margin-top:80px"></h5>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="foundation.css" />
 
    
  </body>
</html><br />
<body style="background:#FFFAF0;">

       <div class="admin" style="text-align:center; margin-top:25px;margin-left:400px;margin-right:400px">



<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login1_homecare.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login1_homecare.php"); 
    } 
     
    // This if statement checks to determine whether the edit form has been submitted 
    // If it has, then the account updating code is run, otherwise the form is displayed 
    if(!empty($_GET)) 
    { 
       //$carerid = $_GET["carerid"];
        { 
            // Define our SQL query 
            $query = " 
                SELECT 
                    carerid, firstname,lastname,sex,
		    address,emailaddress,county,phone,ppsnumber,
			dateofbirth,adminnote, active FROM tblcarer
            ";

   	 	$query .= " WHERE carerid = :carerid"; 
	
		 $query_params = array(  
            	':carerid' =>  $_GET["carerid"]);
             
            try 
            { 
                // Execute the query 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) 
            { 
                // Note: On a production website, you should not output $ex->getMessage(). 
                // It may provide an attacker with helpful information about your code.  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
             
            // Retrieve results (if any) 
            $row = $stmt->fetch(); 
            if($row) 
            { 
		$carerid = $row["carerid"];
                $firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$sex = $row["sex"];
                $address = $row["address"];
		$emailaddress = $row["emailaddress"];
		$county = $row["county"];
 		$phone = $row["phone"];
		$dateofbirth = $row["dateofbirth"];
		$ppsnumber = $row["ppsnumber"];
		$active = $row["active"];
		$adminnote = $row["adminnote"];
            } 
        } 
    }
?> 

<h1>Edit Carer</h1> 

<form action="admin_update_carer.php" method="post" enctype="multipart/form-data"><br />
<input type="hidden" id="carerid" name="carerid" value="<?php echo $carerid ?>" maxlength="50" />
</p>

<p>
<label for="firstname"style="color:black;font-weight:bold;texshadow: 2px 2px white;">First Name
</label>
<input type="text" id="firstname" name="firstname" value="<?php echo $firstname ?>" maxlength="50" required="required"/>
</p>
<p>
<label for="lastname"style="color:black;font-weight:bold;texshadow: 2px 2px white;">Last Name
</label>
<input type="text" id="lastname" name="lastname" value="<?php echo $lastname ?>" maxlength="50" />
</p>
<p>
<label for="sex" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Sex
		<select name="sex" id="sex" >
       			<option <?php if($sex == 'Male'){echo("selected");}?>>Male</option>
        		<option <?php if($sex == 'Female'){echo("selected");}?>>Female</option>
		</select></label>
</p>

<p>
<label for="active" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Active Carer
		<select name="active" id="active" >
       			<option <?php if($active =='Yes'){echo("selected");}?>>Yes</option>
        		<option <?php if($active =='No'){echo("selected");}?>>No</option>
		</select></label>
</p>
<p>
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">E-Mail Address
</label>
<input type="text" id="emailaddress" name="emailaddress" value="<?php echo $emailaddress ?>" maxlength="50" />
</p>

<label for="address" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Address:
	   <input type="text" name="address" id="content" value="<?php echo $address ?>" maxlength="40" required="required"/>
	   </label>
<p>
<label for="county"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">County
</label>
<input type="text" id="county" name="county" value="<?php echo $county ?>" maxlength="20"  required="required" />
</p>
<p>
<label for="phone"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Phone
</label>
<input type="text" id="phone" name="phone" value="<?php echo $phone ?>" maxlength="20"  required="required" />
</p>
<p>
<label for="ppsnumber"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">PPS Number
</label>
<input type="text" id="phone" name="ppsnumber" value="<?php echo $ppsnumber ?>" maxlength="20"  required="required" />
</p>
<p>
<label for="dateOfBirth"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Date Of Birth </label>
<input type="text" id="dateofbirth" name="dateofbirth" value="<?php echo $dateofbirth ?>" maxlength="8"  required="required" />
</p>
<p>
<label for="adminnote"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Admin Note </label>
<textarea id="adminnote" name="adminnote"  cols="40" 
       rows="5" maxlength="255"  required="required"><?php echo $adminnote ?></textarea>
</p>
<input type="submit" name="submit" value="Update Carer Details" />
</form>