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
<li class="active"><a href="edit_carer_account.php"style="color:green;background:white;">Edit My Account</a></li>
<li class="divider"></li>
<li class="active"><a href="view_carer_schedule.php"style="color:green;background:white;">View My Schedule</a></li>
<li class="divider"></li>
<li class="active"><a href="book_holiday_carer.php"style="color:green;background:white;">Book Holidays</a></li>
<li class="divider"></li>
<li class="active"><a href="submit_timesheet.php"style="color:green;background:white;">Submit Timesheet</a></li>
<li class="divider"></li>
<li class="active"><a href="cancel_shift_carer.php"style="color:green;background:white;">Cancel Shift</a></li>
<li class="divider"></li>
<li class="active"><a href="carer_logout.php"style="color:green;background:white;">Log Out</a></li>
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

<h2 style="color:red;font-weight:bold;text-align:center;">Book Holiday</h2>
<p>

<a href="carer_my_past_holidays.php"style="color:green;background:white;">My Past Holidays</a> |
<a href="carer_my_current_holidays.php"style="color:green;background:white;">My Current Holidays</a> <br>|
<a href="carer_my_future_holidays.php"style="color:green;background:white;">My Future Holidays</a> |

<div class="panel">
<p style="background:white;color:black;">


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
     
    // Everything below this point in the file is secured by the login system 

    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
             
        // Now we perform the same type of check for the dates entered, in order 
        // to ensure that both are beyond the current date
        $query = " 
            SELECT DATEDIFF(:datefrom,curdate()) AS diffinfromdate, DATEDIFF(:dateto,curdate()) AS diffintodate,
		datediff(:dateto,:datefrom) + 1 AS noofdays
        "; 
         
        $query_params = array( 
            	':datefrom' => $_POST['datefrom'],
		':dateto' => $_POST['dateto'] 
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
         
        if($row['diffinfromdate'] <=0 ) 
        { 
            die("The Date From must be beyond the current date"); 
        } 

	if($row['diffintodate'] <=0 ) 
        { 
            die("The Date To must be beyond the current date"); 
        } 
         
	$noofdays = $row['noofdays'];
	
	// checks to see if someone else has booked these date range.

	$query = " 
	select datefrom,dateto from tblcarerholiday where :datefrom between datefrom and dateto
			or :dateto between datefrom and dateto
	"; 
	
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
		echo "You selected ". $_POST['datefrom'] ." to ". $_POST['dateto']. "<br><br>";
		echo "Unfortunately, someone has booked <br>". $row['datefrom'] ." to ". $row['dateto']. "<br>";
            	die("<br><br>Please review your selection and try again."); 
        }

	

        // An INSERT query is used to add new rows to a database table. 
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = "INSERT INTO tblcarerholiday(carerid,datefrom,dateto,noofdays)
            VALUES (:carerid,:datefrom,:dateto,:noofdays)"; 

        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
              	':datefrom' => $_POST['datefrom'],
		':dateto' => $_POST['dateto'], 
		':carerid' => $_POST['carerid'],
		':noofdays' => $noofdays
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
         
        // This redirects the user back to the future holidays page after they have booked their holidays
        header("Location: carer_my_future_holidays.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to carer_my_future_holidays.php"); 
    } 
     
?> 

  <link rel="stylesheet" href="/css/jquery-ui.css">
  <script src="/js/jquery-1.10.2.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  <script>
  $(function() {
    $( "#datefrom" ).datepicker();
  });

  $(function() {
    $( "#dateto" ).datepicker();
  });


ready(function(){
    var $datefrom =  $( "#datefrom" );
    var $dateto =  $( "#dateto" );
    $datefrom.datepicker();
    $dateto.datepicker({
         onClose: function() {
            var fromDate = $datefrom.datepicker('getDate');
            var toDate = $dateto.datepicker('getDate');
            // date difference in millisec
            var diff = new Date(toDate - fromDate);
            // date difference in days
            var days = diff/1000/60/60/24;
 
            alert(days);
        }
    });
});
  </script>



</head>

<form action="book_holiday_carer.php" method="post" enctype="multipart/form-data"><br />
<p>
<label for="datefrom"style="color:black;font-weight:bold;texshadow: 2px 2px white;">From Date (yyyy-mm-dd)
</label>
<input type="text" id="datefrom" name="datefrom" value="" maxlength="50" readonly required="required" />
</p>
<p>
<label for="dateto"style="color:black;font-weight:bold;texshadow: 2px 2px white;">To Date (yyyy-mm-dd)
</label>
<input type="text" id="dateto" name="dateto" value="" maxlength="50" readonly required="required"/>
</p>
<p>
<input type="hidden" id="carerid" name="carerid" value="<?php echo $_SESSION['user']['carerid'] ?>" maxlength="5" />
</p>
<input type="submit" name="submit" value="Submit Request - subject to approval" />
</form>

</span></p>
</div>
</div>
