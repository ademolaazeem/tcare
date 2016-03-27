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

<h1>Add New Patient</h1> 

<?php 

    // First we execute our CommonClass code to connection to the database and start the session
    require("common.php"); 
     
    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
       
         
        // Make sure the user entered a valid E-Mail address 
        // filter_var is a useful PHP function for validating form input, see: 
        // http://us.php.net/manual/en/function.filter-var.php 
        // http://us.php.net/manual/en/filter.filters.php 
        if(!filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
         
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = " 
            SELECT 
                1 
            FROM tblpatient 
            WHERE 
                emailaddress = :emailaddress 
        "; 
         
        $query_params = array( 
            ':emailaddress' => $_POST['emailaddress'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        // An INSERT query is used to add new rows to a database table. 
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = "INSERT INTO tblpatient(firstname,lastname,sex,address,emailaddress,
			county,dateofbirth, phone,comments)
            VALUES (:firstname,:lastname,:sex,:address, 
		:emailaddress,:county,:dateofbirth,:phone,:comments)"; 

        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
              	':firstname' => $_POST['firstname'],
		':lastname' => $_POST['lastname'], 
		':sex' => $_POST['sex'], 
		':address' => $_POST['address'], 
		':emailaddress' => $_POST['emailaddress'], 
		':county' => $_POST['county'], 
		':dateofbirth' => $_POST['dateofbirth'],
		':phone' => $_POST['phone'],
		':comments' => $_POST['comments']
        ); 

        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code. 
		// echo "Query: " . $query;
 		//echo "Query Params: " . serialize($query_params);
 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This redirects the user back to the login page after they register 
        header("Location: admin_manage_patients.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to admin_manage_patients.php"); 
    } 
     
?> 


<form action="admin_addNew_patients.php" method="post" enctype="multipart/form-data"><br />
<p>
<label for="firstname"style="color:black;font-weight:bold;texshadow: 2px 2px white;">First Name
</label>
<input type="text" id="firstname" name="firstname" value="" maxlength="50" required="required"/>
</p>
<p>
<label for="middlename"style="color:black;font-weight:bold;texshadow: 2px 2px white;">Last Name
</label>
<input type="text" id="lastname" name="lastname" value="" maxlength="50" />
</p>
<p>
<label for="sex" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Sex
		<select name="sex" id="value" value="content" >
       			<option value="Male">Male</option>
        		<option value="Female">Female</option>
		</select></label>
</p>
<p>
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">E-Mail Address
</label>
<input type="text" id="emailaddress" name="emailaddress" value="" maxlength="50" />
</p>

<label for="address" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Address:
	   <input type="text" name="address" id="content" value="" maxlength="40" required="required"/>
	   </label>
<p>
<label for="county"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">County
</label>
<input type="text" id="county" name="county" value="" maxlength="20"  required="required" />
</p>
<p>
<label for="phone"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Phone
</label>
<input type="text" id="phone" name="phone" value="" maxlength="20"  required="required" />
</p>
<p>
<label for="dateOfBirth"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Date Of Birth </label>
<input type="text" id="dateofbirth" name="dateofbirth" value="DD/MM/YY" maxlength="8"  required="required" />
</p>
<p>
<label for="comments"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Comments </label>
<textarea id="comments" name="comments" cols="40" 
       rows="5" maxlength="255"  required="required">..add Medical history</textarea>
</p>
<input type="submit" name="submit" value="Add New Patient" />
</form>
