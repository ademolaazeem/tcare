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

<h2 style="color:red;font-weight:bold;text-align:center;">My Past Holidays</h2>
<p>

<a href="book_holiday_carer.php"style="color:green;background:white;">Book My Holidays</a> |
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
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        	select H.carerid,H.datefrom,H.dateto,H.noofdays,
			H.approvedon,A.username from tblcarerholiday H left outer join
			tbladmin A on H.ApprovedByAdminID = A.AdminID
			where carerid = :carerid and dateto< CURDATE()
		order by datefrom
  	";

	$query_params = array( 
              	':carerid' => $_SESSION['user']['carerid']
        ); 
     
    try 
    { 
        // These two statements run the query against your database table. 

   		$stmt = $db->prepare($query); 
            $stmt->execute($query_params);  
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 

	$i = 0 ;
?> 
</head>
<h2>My Past Holidays</h2> 
<table> 
    <tr> 
        <th>No</th> 
        <th>Date From</th> 
	<th>Date To</th> 
	<th>No of Days</th>
	<th>Approved By</th> 
	<th>Approved On</th>
    </tr> 
    <?php foreach($rows as $row): $i= $i + 1?> 
        <tr> 
            <td><?php echo $i; ?></td>
            <td><?php echo htmlentities($row['datefrom'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><?php echo htmlentities($row['dateto'], ENT_QUOTES, 'UTF-8'); ?></td> 
	    <td><?php echo htmlentities($row['noofdays'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
	    <td><?php echo htmlentities($row['approvedon'], ENT_QUOTES, 'UTF-8'); ?></td>
     	
        </tr> 
    <?php endforeach; ?> 
</table>

</span></p>
</div>
</div>
