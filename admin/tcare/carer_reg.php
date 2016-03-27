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
<li class="active"><a href="index.php"style="color:green;background:white;">Home</a></li>
<li class="divider"></li>
<li class="active"><a href="login1_homecare.php"style="color:green;background:white;">Login as a carer</a></li>
<li class="divider"></li>
<li class="active"><a href="home4_care.php"style="color:green;background:white;">Login as admin</a></li>
<li class="divider"></li>
<li class="active"><a href="carer_reg.php"style="color:green;background:white;">Sign Up</a></li>
<li class="divider"></li>
<li class="divider"></li>
<li class="active"><a href="contact_form22.php"style="color:green;background:white;">Contact Us</a></li>
<li class="divider"></li>
<li class="active"><a href="about.php"style="color:green;background:white;">About Us</a></li>
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

<h2 style="color:red;font-weight:bold;text-align:center;">Sign Up - Carer</h2>


<div class="panel">
<p style="background:white;color:black;">

<?php 

    // First we execute our CommonClass code to connection to the database and start the session
    require("common.php"); 
     
    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // Ensure that the user has entered a non-empty username 
        if(empty($_POST['username'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors 
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a username."); 
        } 
         
        // Ensure that the user has entered a non-empty password 
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        // Make sure the user entered a valid E-Mail address 
        // filter_var is a useful PHP function for validating form input, see: 
        // http://us.php.net/manual/en/function.filter-var.php 
        // http://us.php.net/manual/en/filter.filters.php 
        if(!filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        // We will use this SQL query to see whether the username entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :username is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM tblCarer
            WHERE 
                username = :username 
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :username.  It is possible to insert $_POST['username'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = " 
            SELECT 
                1 
            FROM tblcarer 
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
        $query = "INSERT INTO tblcarer(username, password, salt,emailaddress,firstname,
		lastname, sex, address, county, ppsnumber, dateofbirth, authid, phone)
		VALUES (:username, :password, :salt, :emailaddress,:firstname,
		:lastname, :sex,:address,:county, :ppsnumber,:dateofbirth, :authid,:phone)";
         
        // A salt is randomly generated here to protect again brute force attacks 
        // and rainbow table attacks.  The following statement generates a hex 
        // representation of an 8 byte salt.  Representing this in hex provides 
        // no additional security, but makes it easier for humans to read. 
        // For more information: 
        // http://en.wikipedia.org/wiki/Salt_%28cryptography%29 
        // http://en.wikipedia.org/wiki/Brute-force_attack
        // http://en.wikipedia.org/wiki/Rainbow_table 
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // This hashes the password with the salt so that it can be stored securely 
        // in your database.  The output of this next statement is a 64 byte hex 
        // string representing the 32 byte sha256 hash of the password.  The original 
        // password cannot be recovered from the hash.  For more information: 
        // http://en.wikipedia.org/wiki/Cryptographic_hash_function 
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        // Next we hash the hash value 65536 more times.  The purpose of this is to 
        // protect against brute force attacks.  Now an attacker must compute the hash 65537 
        // times for each guess they make against a password, whereas if the password 
        // were hashed only once the attacker would have been able to make 65537 different  
        // guesses in the same amount of time instead of only one. 
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt);
        } 
         
        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
            	':username' => $_POST['username'], 
            	':password' => $password, 
            	':salt' => $salt, 
            	':emailaddress' => $_POST['emailaddress'], 
		':firstname' => $_POST['firstname'],
		':lastname' => $_POST['lastname'], 
		':sex' => $_POST['sex'], 
		':address' => $_POST['address'], 
		':county' => $_POST['county'], 
		':ppsnumber' => $_POST['ppsnumber'],
		':dateofbirth' => $_POST['dateofbirth'],
		':authid' => $_POST['authid'],
		':phone' => $_POST['phone']
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
        header("Location: login1_homecare.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to login1_homecare.php"); 
    } 
     
?> 


<form action="carer_reg.php" method="post" enctype="multipart/form-data"><br />
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
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">Identification Number
</label>
<input type="text" id="authid" name="authid" value="" maxlength="5" />
</p>
<p>
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">E-Mail Address
</label>
<input type="text" id="emailaddress" name="emailaddress" value="" maxlength="50" />
</p>
<p>
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">Username
</label>
<input type="text" id="username" name="username" value="" maxlength="50" />
</p>
<p>
<label for="id"style="color:black;font-weight:bold;texshadow: 2px 2px white;">Password
</label>
<input type="password" id="password" name="password" value="" maxlength="50" />
</p>

<p>
<label for="sex" style="color:black;font-weight:bold;texshadow: 2px 2px white;">Sex
		<select name="sex" id="value" value="content" >
        <option value="Male">Male</option>
        <option value="Female">Female</option>
		</select></label>
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
<label for="ppsnumber"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">PPS Number
</label>
<input type="text" id="ppsnumber" name="ppsnumber" value="" maxlength="20"  required="required" />
</p>
<p>
<label for="dateOfBirth"style="color:black;font-weight:bold;texshadow: 2px 2px white; ">Date Of Birth </label>
<input type="text" id="dateofbirth" name="dateofbirth" value="DD/MM/YY" maxlength="20"  required="required" />
</p>
<input type="submit" name="submit" value="Submit Application" />
</form>

</span></p>
</div>
</div>
