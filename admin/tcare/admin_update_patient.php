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
     
         
     if(!empty($_POST))
	{
 		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$sex = $_POST["sex"];
                $address = $_POST["address"];
		$emailaddress = $_POST["emailaddress"];
		$county = $_POST["county"];
 		$phone = $_POST["phone"];
		$dateofbirth = $_POST["dateofbirth"];
		$comments = $_POST["comments"];
	
        // Initial query parameter values 
        $query_params = array(  
            	':patientid' =>  $_POST["patientid"],
            	':firstname' =>  $_POST["firstname"],
		':lastname' => $_POST['lastname'],
		':sex' =>  $_POST["sex"],
		':address' => $_POST['address'],
		':emailaddress' => $_POST['emailaddress'],
		':county' =>  $_POST["county"],
		':phone' => $_POST['phone'],
		':dateofbirth' =>  $_POST["dateofbirth"],
		':comments' => $_POST['comments'],
        ); 
         
         
        // Note how this is only first half of the necessary update query.  We will dynamically 
        // construct the rest of it depending on whether or not the user is changing 
        // their password. 
        $query = " 
            UPDATE tblpatient 
            SET  firstname = :firstname 
                , lastname = :lastname 
                , sex = :sex 
                , address = :address
                , emailaddress = :emailaddress 
                , county = :county 
                , phone = :phone
                , dateofbirth = :dateofbirth 
                , comments = :comments  
        "; 
         
        // Finally we finish the update query by specifying that we only wish 
        // to update the one record with for the current user. 
        $query .= " 
            WHERE 
                patientid = :patientid 
        "; 
   
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
         

        // This redirects the user back to the members-only page after they register 
        header("Location: admin_manage_patients.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to admin_manage_patients.php"); 
	//}
    } 
     
?> 


  <body style="background:white;">
<h5  style="background:black;color:white;font-style:italic;margin-top:80px"></h5>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="foundation.css" />
 
    
  </body>
</html><br />
<body style="background:#FFFAF0;">

       <div class="admin" style="text-align:center; margin-top:25px;margin-left:400px;margin-right:400px">
