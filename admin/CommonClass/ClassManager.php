<?php
        //error_reporting(0);
		require_once("Common.php");
		require_once('audit.php');
		require_once('format.php');
		
class AdminClassController
{
	private $db, $audit,$fm;
	
	function __construct()
	{
		$this->db = new DBConnections();
		$this->audit = new AuditLog();
		$this->fm = new Format();
	}
	
	public function adminLogin()
	{
		$userType = $this->fm->processfield($_POST['userType']);
        $username = $this->fm->processfield($_POST['userId']);
		$password = $this->fm->processfield($_POST['password']);

		if(empty($username) || empty($password))
		{
			//return "<div class='errortitle'>Please enter your valid login details!</div>";
			header("location:login.php?r=".base64_encode("empty"));
		}
		else
		{
            if($userType=="admin"){

                $qry = "SELECT * FROM tbladmin WHERE trim(UserName) = '".trim($username)."' AND trim(Password) = '".trim(sha1($password))."'";

                //$res = $this->db->getNumOfRows($qry);
                //$fct = $this->db->fetchData($qry);
                $rowNumber = $this->db->getNumOfRows($qry);
                $getUserData = $this->db->fetchData($qry);

                if($rowNumber > 0)
                {
                    //found grant access
                    //create session here
                    $_SESSION['username'] = $username;
                    $_SESSION['adlogged'] = "true";
                    $_SESSION['usertype'] = "admin";
                    $_SESSION['AdminID'] = $getUserData['AdminID'];
                    $_SESSION['userfullname'] = $getUserData['FirstName']." ".$getUserData['LastName'];
                    $_SESSION['imagepath'] = $getUserData['imagepath'];

                    $this->audit->audit_log("Admin ".$_SESSION['username']." Successfully logged in");
                    //header("location:../admin/admin_content/index.php");

                    header("location:dashboard.php");
                }
                else
                {
                    header("location:login.php?r=".base64_encode('failed'));
                }
            }//
            else if($userType == "carer"){
                $qry = "SELECT * FROM tblcarer WHERE trim(UserName) = '".trim($username)."' AND trim(Password) = '".trim(sha1($password))."'";

                //$res = $this->db->getNumOfRows($qry);
                //$fct = $this->db->fetchData($qry);
                $rowNumber = $this->db->getNumOfRows($qry);
                $getUserData = $this->db->fetchData($qry);

                if($rowNumber > 0)
                {
                    //found grant access
                    //create session here
                    $_SESSION['username'] = $username;
                    $_SESSION['adlogged'] = "true";
                    $_SESSION['usertype'] = "carer";
                    $_SESSION['userid'] = $getUserData['CarerID'];
                    $_SESSION['userfullname'] = $getUserData['FirstName']." ".$getUserData['LastName'];
                    $_SESSION['imagepath'] = $getUserData['imagepath'];

                    $this->audit->audit_log("User ".$_SESSION['username']." Successfully logged in");
                    //header("location:../admin/admin_content/index.php");

                    header("location:carer_dashboard.php");
                }
                else
                {
                    header("location:login.php?r=".base64_encode('failed'));
                }
            }

		}
	}

    public function addCarer()
    {
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $username = $this->fm->processfield($_POST['username']);
        $email = $this->fm->processfield($_POST['email']);
        $email2 = $this->fm->processfield($_POST['email2']);
        $password = $this->fm->processfield($_POST['password']);
        $password2 = $this->fm->processfield($_POST['password2']);
        $sex = $this->fm->processfield($_POST['sex']);
        $address = $this->fm->processfield($_POST['address']);
        $phone = $this->fm->processfield($_POST['phone']);
        $county = $this->fm->processfield($_POST['county']);
        $dob = $this->fm->processfield($_POST['birthday']);
        $pps = $this->fm->processfield($_POST['pps']);
        //validate
        if(empty($firstname)||empty($lastname)||empty($pps) || empty($sex) || empty($password) || empty($email)
        || empty($dob))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msgC = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all the required fields are filled!
             </div>';
            return $msgC;
        }
        if($password != $password2)
        {
            $msgC = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Please both password and password confirmation must be the same!
               </div>';
            return $msgC;


        }if($email != $email2)
        {
            $msgC = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Please both email and email confirmation must be the same!
               </div>';
            return $msgC;


        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msgC = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msgC;
        }

        else {

            $qry = "SELECT * FROM tblcarer WHERE UserName = '$username' or emailaddress = '$email'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {
                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msgC = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Username or Email already exist!
             </div>';
                return $msgC;
            } else {


                $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);

                //$minshr = "HCP";
                //$curDate=date('ymdHis');
                //$carerid = $minshr.$curDate.$serial;//generate



               $insertQry = "INSERT INTO tblcarer
                        (FirstName, LastName, Sex, Address, County, Phone, Username, Password, PPSNumber, EmailAddress, dateofbirth)
                VALUES ('$firstname', '$lastname', '$sex', '$address', '$county', '$phone', '$username', '".sha1($password)."', '$pps', '$email', '$dob')";
                 $res = $this->db->executeQuery($insertQry);
                if ($res) {
                    $this->audit->audit_log("new Carer added");
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msgC = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully registered, Admin will get back to you soon.</p>
                              </div>';
                    return $msgC;
                }//end if res
            }// end else row
        }//end else

    }

    public function addClient()
    {
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $email = $this->fm->processfield($_POST['email']);
        $address = $this->fm->processfield($_POST['address']);
        $phone = $this->fm->processfield($_POST['phone']);
        $dob = $this->fm->processfield($_POST['dateofbirth']);
        $county = $this->fm->processfield($_POST['county']);
        $sex = $this->fm->processfield($_POST['sex']);
        $comment = $this->fm->processfield($_POST['comment']);
        //validate
        if(empty($firstname)||empty($lastname)||empty($address) || empty($sex) || empty($phone) || empty($comment)
            || empty($dob))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all the required fields are filled!
             </div>';
            return $msg;
        }

    else {

        $qry = "SELECT * FROM tblpatient WHERE FirstName like '%$firstname%' and Lastname like '%$lastname%' and DateOfBirth = '$dob'";

        $row = $this->db->getNumOfRows($qry);
        if ($row > 0) {
            //username in use
            //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The Client has already been added!
             </div>';
            return $msg;

        } else {
            $insertQry = "INSERT INTO tblpatient
                        (FirstName, LastName, Sex, Address, EmailAddress, County, Phone, comments, DateOfBirth)
                VALUES ('$firstname', '$lastname', '$sex', '$address', '$email', '$county', '$phone', '$comment', '$dob')";
            $res = $this->db->executeQuery($insertQry);
            if ($res) {
                $this->audit->audit_log("New Patient added");
                //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>New Client has been successfully registered.</p>
                              </div>';
                return $msg;
            }//end if res
        }// end else row
    }//end else

    }//
    public function assignCover()
    {
        $CarerRosterID = $this->fm->processfield($_POST['CarerRosterID']);
        $coverid = $this->fm->processfield($_POST['coverid']);
        $reason = trim($_POST['reason']);

        //validate
        if(empty($CarerRosterID)||empty($coverid)|| $reason == "")
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all the required fields are filled!
             </div>';
            return $msg;
        }

        else {

            $qry = "SELECT * FROM tblcover WHERE  carerrosterid = '$CarerRosterID'";
            //coverid = '$coverid' and
            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {
                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> This carer has already been covered for this period!
             </div>';
                return $msg;
            }

            else {
                $insertQry = "INSERT INTO tblcover
                        (coverid, carerrosterid, reason, createddate, createdby)
                VALUES ('$coverid', '$CarerRosterID', '$reason', '".date("Y-m-d H:i:s")."', '". $_SESSION['AdminID']."')";
                $res = $this->db->executeQuery($insertQry);
                if ($res) {
                    $this->audit->audit_log("New Cover Assigned");
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully Assigned a Cover for client.</p>
                              </div>';
                    return $msg;
                }//end if res
            }// end else row
        }//end else

    }//end assignCover
    public function assignShift()
    {
        $shiftDate = $this->fm->processfield($_POST['shiftDate']);
        $fromtime = $this->fm->processfield($_POST['fromtime']);
        $totime = $this->fm->processfield($_POST['totime']);
        $patientId = $this->fm->processfield($_POST['PatientID']);
        $carerId = $this->fm->processfield($_POST['CarerID']);
        $NoOfHours = $this->fm->processfield($_POST['NoOfHours']);

        //validate
        if(empty($shiftDate)||empty($fromtime)||empty($totime) || empty($patientId) || empty($carerId) || empty($NoOfHours))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all the required fields are filled!
             </div>';
            return $msg;
        }

    else {

        $dateFrom = $shiftDate. " " .$fromtime;
        $dateTo = $shiftDate. " ".$totime;
        //echo $dateFrom;
        //echo $dateTo;
        $convFromDate = date('Y-m-d H:i:s', strtotime($dateFrom));
        $convToDate = date('Y-m-d H:i:s', strtotime($dateTo));
        echo $convFromDate;
        echo $convToDate;

       // $qry = "SELECT * FROM tblcarerholiday WHERE CarerID = '$carerid' and ((DateFrom <= '$convFromDate' and DateTo >= '$convFromDate') or (DateFrom <= '$convToDate'  and DateTo >= '$convToDate'))";


        $qry = "SELECT * FROM tblcarerroster WHERE PatientID = '$patientId' and ((DateFrom <= '$convFromDate' and DateTo >= '$convFromDate') or (DateFrom <= '$convToDate'  and DateTo >= '$convToDate'))";
        $qry1 = "SELECT * FROM tblcarerroster WHERE CarerID = '$carerId' and PatientID = '$patientId' and ((DateFrom <= '$convFromDate' and DateTo >= '$convFromDate') or (DateFrom <= '$convToDate'  and DateTo >= '$convToDate'))";
        $row = $this->db->getNumOfRows($qry);
        $row1 = $this->db->getNumOfRows($qry1);
        if ($row > 0) {
            //username in use
            //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> This patient has been assigned carer for this period!
             </div>';
            return $msg;
        }
        elseif($row1 > 0) {
            //username in use
            //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> This patient has been assigned to the same carer for this period!
             </div>';
            return $msg;
        }
        else {
             $insertQry = "INSERT INTO tblcarerroster
                        (CarerID, PatientID, DateFrom, DateTo, NoOfHours)
                VALUES ('$carerId', '$patientId', '$convFromDate', '$convToDate', '$NoOfHours')";
            $res = $this->db->executeQuery($insertQry);
            if ($res) {
                $this->audit->audit_log("new Carer added");
                //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully Assigned a carer to a client/patient.</p>
                              </div>';
                return $msg;
            }//end if res
        }// end else row
    }//end else

    }//end assignShift
    public function cancelShift()
    {
        $carerId = $_SESSION['CarerID'];
        $reason = $this->fm->processfield($_POST['reason']);
        $message = $this->fm->processfield($_POST['message']);
        $patientId0 = $this->fm->processfield($_POST['patientId0']);
        $patientId1 = $this->fm->processfield($_POST['patientId1']);
        $patientId2 = $this->fm->processfield($_POST['patientId2']);
        $patientId3 = $this->fm->processfield($_POST['patientId3']);
        
        if(isset($reason) && !isset($message)){
          $cancelReason = $reason;
        }
        else if(!isset($reason) && isset($message)){
          $cancelReason = $message;
        }
        else if(isset($reason) && isset($message)){
          $cancelReason = $reason;
        }

        //validate
        if($reason == "" && trim(empty($message)) || $reason == "")
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msgC = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure reason OR other message is filled!
             </div>';
            return $msgC;
        }
        if($patientId0 == "" && $patientId1 == "" && $patientId2 == "" && $patientId3 == "")
            {
            $msgC = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> You must select at least one client!
               </div>';
            return $msgC;


        }
        if(($patientId0==$patientId1 && $patientId1 != "")  || ($patientId0 == $patientId2 && $patientId2 != "") || ($patientId0 == $patientId3 && $patientId3 != "") ||
          ($patientId1==$patientId2 && $patientId1 != "") || ($patientId1 == $patientId3 && $patientId1 != "") || ($patientId2 == $patientId3 && $patientId3 != "") 
         ){
            $msgC = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> You cannot select a patient more than once!
               </div>';
            return $msgC;

        }

        else {
              


            $qry = "SELECT * FROM tblcarerroster WHERE CarerID = ".$_SESSION['CarerID']." and PatientID in ('$patientId0', '$patientId1', '$patientId2', '$patientId3')";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {

              $conn=$this->db->getConnection();
              $result = mysqli_query($conn, $qry);
              while($row=mysqli_fetch_assoc($result)){
                $patId = $row['PatientID'];
                $crID = $row['CarerID'];
                $cr = $cancelReason;
                $cId = $carerId;
                    $updQry = "UPDATE tblcarerroster SET CancelledOn ='".date("Y-m-d H:i:s")."', Cancelled = 1, cancelreason='$cr' WHERE  CarerID = $crID and PatientID = $patId";
                   $res = $this->db->executeQuery($updQry);
                
                //echo "CancelledOn:". date("Y-m-d H:i:s")." CANCELLED: 1". " cancelreason:". $cr. " carerid: ".$cId. " PatientID: ". $patId;
               //echo "<br/>";
                     
                 }
                 $res = $this->db->executeQuery($updQry);
                if ($res) {
                    $this->audit->audit_log("patient(s) shift cancelled");
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msgC = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully cancelled some patient(s).</p>
                              </div>';
                    return $msgC;
                }//end if res
            }
            else {

                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msgC = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> You are not assigned to any of the clients selected!
             </div>';
                return $msgC;
                

            }// end else row
        }//end else

    }
    public function bookHoliday()
    {
        $fromDate = $this->fm->processfield($_POST['fromDate']);
        $toDate = $this->fm->processfield($_POST['toDate']);
        $NoOfHours = $this->fm->processfield($_POST['NoOfHours']);
        $carerid = $this->fm->processfield($_POST['carerid']);

       //validate
        if(empty($fromDate)||empty($toDate)||$carerid =='' || empty($NoOfHours))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all the required fields are filled!
             </div>';
            return $msg;
        }

        else
        {
            $convFromDate = date('Y-m-d', strtotime($fromDate));
            $convToDate = date('Y-m-d', strtotime($toDate));

            $qry = "SELECT * FROM tblcarerholiday WHERE CarerID = '$carerid' and ((DateFrom <= '$convFromDate' and DateTo >= '$convFromDate') or (DateFrom <= '$convToDate'  and DateTo >= '$convToDate'))";
            //$qry1 = "SELECT * FROM tblcarerroster WHERE CarerID = '$carerId' and PatientID = '$patientId' and DateFrom <= '$dateFrom' and DateTo >= '$dateTo'";
            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {
                echo "between";
                //username in use
                //return '<font color="#FF0000" size="-2">Username already in use, Try another username</font>';
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> You already have holiday booked for this period, you cannot be in 2 holidays at once!
             </div>';
                return $msg;
                  }
            else {
                echo "insert";
                $insertQry = "INSERT INTO tblcarerholiday
                (CarerID, DateFrom, DateTo, NoOfDays, status)
                VALUES ('$carerid', '$convFromDate', '$convToDate', '$NoOfHours', 'BOOKED')";
                $res = $this->db->executeQuery($insertQry);
                if ($res) {
                    $this->audit->audit_log("new holiday booked");
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully booked your holiday.</p>
                              </div>';
                    return $msg;
                }//end if res
            }// end else row
        }//end else
    }//end bookHoliday


public function addPermissionSetup()
    {
        $pageName = $this->fm->processfield($_POST['pageName']);
        $pageUrlName = $this->fm->processfield($_POST['pageUrlName']);
        $patientid = $this->fm->processfield($_POST['patientid']);
        $logoName = $this->fm->processfield($_POST['logoName']);
        //validate
        if(empty($pageName)
    )
    {
        $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Page Name cannot be empty, Please make sure you complete it!
             </div>';
        return $msg;
    }
        if(empty($pageUrlName)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Stop!</strong> The URL cannot be empty, Please provide necessary information!
             </div>';
            return $msg;
        }
  /*
        if((strlen($patientid)<1)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Parent Id should be completed, just select the appropriate number in the select box provided!
             </div>';
            return $msg;
        }
*/

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM permissions_tbl WHERE lower(page_name) = '". strtolower($pageName)."'";

        $row = $this->db->getNumOfRows($qry);
        if($row >0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The permission has already in been added, Please try another name!
             </div>';
            return $msg;

        }
        else
        {
            $userInAttendance=$_SESSION['username'];

            //prepare to insert

            $insertQry = "INSERT INTO permissions_tbl
                  (page_name, page_url, parent_id, logo_name, created_date, maker)
			VALUES('$pageName','$pageUrlName', '$patientid', '$logoName', '".date("Y-m-d H:i:s")."','$userInAttendance')";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." added a new permission (page) information - ".$pageName);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully added permission (page) information for - '.$pageName.'</p>
                              </div>';
                return $msg;


            }
        }

    }//end addPermissionSetup

    public function addNewRole()
    {
        $roleName = $this->fm->processfield($_POST['role_name']);
        $userInAttendance=$_SESSION['username'];



        //validate
        if(empty($roleName))
        {
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else {

            $qry = "SELECT * FROM roles_tbl WHERE name = '$roleName'";

            $row = $this->db->getNumOfRows($qry);
            if ($row > 0) {

                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The role has already been setup, Try another role name!
             </div>';
                return $msg;
            } else {

                $insertQry = "INSERT INTO roles_tbl (name, created_date, maker)
			VALUES('$roleName','".date("Y-m-d H:i:s")."', '$userInAttendance')";
//'$hallNumber',
                $res = $this->db->executeQuery($insertQry);

                if ($res) {
                    $this->audit->audit_log("User " . $_SESSION['username'] . " added a new role information - " . $roleName);
                    //return '<font color="#006600" size="-2">You have successfully register a staff!</font>';
                    $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>You have successfully added new role!</p>
                              </div>';
                    return $msg;
                }
            }
        }

    }//addNewRole
    //addition ends here
    public function validateAge($then)
    {
        //, $min
        // $then will first be a string-date
        $then = strtotime($then);
        //The age to be over, over +18
        $min = strtotime('+18 years', $then);
        //echo $min;
        if(time() < $min)  {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> You cannot create user who is less than 15 years!
             </div>';
            return $msg;
        }
    }//end ValidateAge

   //Update Starts here
    public function canCover()
    {
        $carerid = $this->fm->processfield($_POST['carerid']);
       if(!empty($carerid)){

        //update
        $upquery = "UPDATE 	tblemail SET status = 'ICAN', replieddate ='".date("Y-m-d H:i:s")."'  WHERE CarerID = '$carerid' and status is null";
        $res = $this->db->executeQuery($upquery);

        if($res)
         {
            $this->audit->audit_log("User ".$_SESSION['username']." signifies interest in covering");

            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully signified interest in covering for others, you will be notified if you were the first.
                                  Please be aware that this is based on first come first serve, the first person to hit the button gets the cover!</p>
                              </div>';
            return $msg;


         }
       }



    }//end canCover
    public function updateCarer()
    {
        $carerid = $this->fm->processfield($_POST['carerid']);
        //$username = $this->fm->processfield($_POST['username']);
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $address = $this->fm->processfield($_POST['address']);
        $emailaddress = $this->fm->processfield($_POST['emailaddress']);
        $county = $this->fm->processfield($_POST['county']);
        $phone = $this->fm->processfield($_POST['phone']);
        $ppsnumber = $this->fm->processfield($_POST['ppsnumber']);
        $active = $this->fm->processfield($_POST['active']);
        $dob = $this->fm->processfield($_POST['birthday']);
        $sex = $this->fm->processfield($_POST['sex']);
        $adminnote  = $this->fm->processfield($_POST['adminnote']);

       if(empty($active)|| empty($firstname)||empty($lastname)||empty($emailaddress)||empty($phone) ||empty($dob)||empty($sex)
           ||empty($county)||empty($ppsnumber) || empty($adminnote) || empty($address)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if(!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }

       $then = strtotime($dob);
        //The age to be over, over +18
        $min = strtotime('+15 years', $then);
        //echo $min;
        if(time() < $min) {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Wrong Age, carer must be more than 15 years!
             </div>';
            return $msg;
        }

        //update
         $upquery = "UPDATE 	tblcarer SET FirstName = '$firstname', LastName='$lastname',sex ='$sex', Address = '$address', County = '$county',
        Phone = '$phone', PPSNumber ='$ppsnumber', AdminNote = '$adminnote', Active = '$active', EmailAddress = '$emailaddress',
        DateOfBirth ='$dob',updated_date ='".date("Y-m-d H:i:s")."'  WHERE CarerID = '$carerid'";

       // $upquery = "UPDATE 	tblcarer SET FirstName = '$firstname'  WHERE CarerID = '$carerid'";

        $res = $this->db->executeQuery($upquery);

        if($res)
        {
            $this->audit->audit_log("User ".$_SESSION['username']." updated a ".$firstname." ". $lastname."'s information ");

            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated the Carer\'s information!</p>
                              </div>';
            return $msg;


        }



    }//end updateCarer
    public function updateClient()
    {
        $patientid = $this->fm->processfield($_POST['patientid']);
        $firstname = $this->fm->processfield($_POST['firstname']);
        $lastname = $this->fm->processfield($_POST['lastname']);
        $address = $this->fm->processfield($_POST['address']);
        $emailaddress = $this->fm->processfield($_POST['emailaddress']);
        $county = $this->fm->processfield($_POST['county']);
        $phone = $this->fm->processfield($_POST['phone']);
        $dob = $this->fm->processfield($_POST['birthday']);
        $sex = $this->fm->processfield($_POST['sex']);
        $comments  = $this->fm->processfield($_POST['comments']);

        if( empty($firstname)||empty($lastname)||empty($emailaddress)||empty($phone) ||empty($dob)||empty($sex)
            ||empty($county)||empty($comments) || empty($address)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if(!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }

        $then = strtotime($dob);
        //The age to be over, over +18
        $min = strtotime('+15 years', $then);
        //echo $min;
        if(time() < $min) {
            //die('Not 18');
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Wrong Age, carer must be more than 15 years!
             </div>';
            return $msg;
        }

        //update
        $upquery = "UPDATE 	tblpatient SET FirstName = '$firstname', LastName='$lastname', Sex ='$sex', Address = '$address', County = '$county',
        Phone = '$phone', Comments = '$comments', EmailAddress = '$emailaddress',
        DateOfBirth = '$dob' WHERE PatientID = '$patientid'";
        //,updated_date ='".date("Y-m-d H:i:s")."'
        // $upquery = "UPDATE 	tblcarer SET FirstName = '$firstname'  WHERE CarerID = '$carerid'";

        $res = $this->db->executeQuery($upquery);

        if($res)
        {
            $this->audit->audit_log("User ".$_SESSION['username']." updated a ".$firstname." ". $lastname."'s information ");

            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated the Patient\'s information!</p>
                              </div>';
            return $msg;


        }



    }//end updateClient
    public function updateHoliday()
    {
        $carerid = $this->fm->processfield($_POST['carerid']);
        $carerHolidayId = $this->fm->processfield($_POST['carerHolidayId']);
        $status = $this->fm->processfield($_POST['status']);
        $reason = $this->fm->processfield($_POST['reason']);
        $adminid = $this->fm->processfield($_POST['adminid']);
        //echo "right now";

        if($status == '' || trim(empty($reason)) || empty($carerHolidayId)||empty($carerid)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if($status == 'APPROVED'){
            echo 'status';
            $upquery = "UPDATE tblcarerholiday SET status = '$status', reason ='$reason', ApprovedByAdminID = '$adminid',
            ApprovedOn ='".date("Y-m-d H:i:s")."'  where CarerHolidayID = '$carerHolidayId'";

        }
        else {
            echo 'no status';
            $upquery = "UPDATE tblcarerholiday SET status = '$status', reason ='$reason' WHERE CarerHolidayID = '$carerHolidayId'";
        }
        $res = $this->db->executeQuery($upquery);

        if($res)
        {
            $this->audit->audit_log("User ".$_SESSION['username']." updated holiday of holiday id: ".$carerHolidayId);

            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated the Carer\'s holiday!</p>
                              </div>';
            return $msg;


        }



    }//end updateHoliday






    public function updateUserPassword()
    {
        $currentPassword = $this->fm->processfield($_POST['current_password']);
        $newPassword = $this->fm->processfield($_POST['new_password']);
        $rtPassword = $this->fm->processfield($_POST['rt_password']);
        $acclevel = $this->fm->processfield($_POST['acclevel']);
       if (empty($currentPassword) || empty($newPassword) || empty($rtPassword) || empty($acclevel)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }
        if (!empty($newPassword) && strcmp($newPassword, $rtPassword) != 0) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The password specified does not match!
             </div>';
            return $msg;

        }
        //For file upload
        if(empty($_FILES["file"]["name"]))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
            return $msg;

        }
        if($_FILES["file"]["size"] > 900000)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The photograph is more than the allowed upload size of 900kb!
             </div>';
            return $msg;

        }

        //End for file upload

        //$qry = "SELECT * FROM users_tbl WHERE user_id = '".$_SESSION['user_id'] ."'";
        $qry = "SELECT * FROM users_tbl WHERE password ='" . sha1($currentPassword) . "'";

        $row = $this->db->getNumOfRows($qry);
        if ($row <= 0) {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The password you specified is not correct, Please specify another!
             </div>';
            return $msg;

        }
        elseif ($row > 0) {

            $ownerid=$_SESSION['user_id'];
            $path="userAvatar";

           $filename = $ownerid."_".$_FILES["file"]["name"];

            if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
                ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
            {

                $target_path = "../../imgs/uploads/".$path."/".$filename;
                $realpathAvatar = "../../imgs/uploads/".$path."/".$filename;
                //check if the user has a pix before remove it and replace

                if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
                {

                    $pcqy ="";
                    if($path=="userAvatar")
                    {
                        //$_SESSION['staimage']=$realpath;
                        $pcqy = "SELECT * FROM users_tbl WHERE user_id='$ownerid'";
                        $pxdata = $this->db->fetchData($pcqy);
                        $imagename=$pxdata['imagepathavatar'];
                        //"../../".

                        //chmod($imagename, 0777);
                        if(!empty($imagename))unlink($imagename);

                        //$qry="UPDATE  users_tbl SET imagepathavatar='realpathAvater' WHERE user_id='".trim($ownerid)."'";
                        $qry="UPDATE  users_tbl SET password='".sha1($newPassword)."', acclevel='".$acclevel."', imagepathavatar='$realpathAvatar' WHERE user_id='".trim($ownerid)."'";

                        $res = $this->db->executeQuery($qry);
                        if($res)
                        {
                            $_SESSION['imageAvatar']=$realpathAvatar;
                             $this->audit->audit_log("User ".$_SESSION['username']." updated own password information and uploaded avatar");

                           /* unset($_SESSION['userfullname']);
                            unset($_SESSION['username']);
                            unset($_SESSION['adlogged']);
                            unset($_SESSION['levelaccess']);
                            unset($_SESSION['imagepathavatar']);
                            unset($_SESSION['user_id']);*/

                            $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thank you!
                                  </h4>
                                  <p>You have successfully updated your information! Please you have to <a href="logout.php"> Click here </a> to completely log out and Login back.</p>
                              </div>';
                                return $msg;

                        }

                    }

                }
                else
                {
                    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
                    return $msg;
                }

            }//end if checking file type
            else
            {
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Error!</strong> Invalid File selected!
             </div>';
                return $msg;


            }




        }//elseif password correct


    }//updateUserPassword
    public function updateRoomReservation()
    {
        $clt_id = $this->fm->processfield($_POST['client_id']);
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $room_number = $this->fm->processfield($_POST['room_number']);
        $room_rate = $this->fm->processfield($_POST['room_rate']);
        $number_of_nights = $this->fm->processfield($_POST['number_of_nights']);
        $number_of_people = $this->fm->processfield($_POST['number_of_people']);
        $dateIn = $this->fm->processfield($_POST['dateIn']);
        $timeIn = $this->fm->processfield($_POST['timeIn']);
        $dateOut = $this->fm->processfield($_POST['dateOut']);
        //$timeOut = $this->fm->processfield($_POST['timeOut']);
        $visit_purpose = $this->fm->processfield($_POST['visit_purpose']);
        $reg_number = $this->fm->processfield($_POST['reg_number']);
        $model = $this->fm->processfield($_POST['model']);
        $color = $this->fm->processfield($_POST['color']);
        $status = $this->fm->processfield($_POST['status']);


        //echo date_diff(date("Y-m-d"),$dob);


        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($room_number)||empty($room_rate) ||empty($number_of_nights)||empty($number_of_people)
            ||empty($dateIn)||empty($timeIn) ||empty($visit_purpose) ||empty($dateOut)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($dateIn);
        $outDate=strtotime($dateOut);
        $inTime=strtotime($timeIn);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Date Check out cannot come first!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM room_reservation_tbl WHERE room_reservation_id=$clt_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The client information does not exist, please create this client first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/
            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $room_rate=str_replace($delimiter, '', $room_rate);
            $totalPrice= floatval($room_rate)*floatval($number_of_nights);
            $room_rate=floatval($room_rate);
            $totalPrice=floatval($totalPrice);

            //$room_rate=number_format(floatval($room_rate),2);
            //$totalPrice=number_format(floatval($totalPrice),2);






            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert

            $insertQry = "UPDATE room_reservation_tbl SET client_name='$client_name', client_address='$client_address',client_phone='$client_phone',client_email='$client_email'
,room_number='$room_number',rate='$room_rate',number_of_people='$number_of_people',date_in='$dateIn',time_in='$timeIn',number_of_days='$number_of_nights',date_out='$dateOut',
visit_purpose='$visit_purpose', car_reg_number='$reg_number',car_model='$model',car_color='$color',price_paid='$totalPrice', attended_to_by='$userInAttendance', date_updated='".date("Y-m-d H:i:s")."', status='$status' where room_reservation_id=".$clt_id."";

            $res = $this->db->executeQuery($insertQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated client information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an accommodation information for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateRoomReservation
    public function updateHallReservation()
    {
        $clt_id = $this->fm->processfield($_POST['client_id']);
        $client_name = $this->fm->processfield($_POST['client_name']);
        $client_address = $this->fm->processfield($_POST['client_address']);
        $client_phone = $this->fm->processfield($_POST['client_phone']);
        $client_email = $this->fm->processfield($_POST['client_email']);
        $hall_number = $this->fm->processfield($_POST['hall_number']);
        $hall_feature_rate = $this->fm->processfield($_POST['hall_feature_rate']);
        $purpose = $this->fm->processfield($_POST['purpose']);
        $number_of_days = $this->fm->processfield($_POST['number_of_days']);
        $startDate = $this->fm->processfield($_POST['startDate']);
        $startTime = $this->fm->processfield($_POST['startTime']);
        $endDate = $this->fm->processfield($_POST['endDate']);
        $endTime = $this->fm->processfield($_POST['endTime']);

        //validate
        if(empty($client_name)||empty($client_address)||empty($client_phone)||empty($hall_number)||empty($hall_feature_rate) ||empty($number_of_days)||empty($startDate)
            ||empty($startTime)||empty($endDate) ||empty($purpose) ||empty($endTime)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }

        if(!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please Specify a valid email!
             </div>';
            return $msg;
        }
        //, $min
        // $then will first be a string-date
        $inDate = strtotime($startDate);
        $outDate=strtotime($endDate);
        //$inTime=strtotime($startTime);

        if($outDate < $inDate)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
                 <button data-dismiss="alert" class="close close-sm" type="button">
                   <i class="fa fa-times"></i>
                 </button>
                 <strong>Nah!</strong> Check out date cannot come first!
               </div>';
            return $msg;


        }

        //check if the username has not beeen registered before

        $qry = "SELECT * FROM hall_reservation_tbl WHERE hall_reservation_id=$clt_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The client information does not exist, please create this client first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            /*//generate 4digit random number
            $serial = rand(100,999).substr(str_shuffle("0123456789"),0,1);
            //call a method that returns school's shorth form
            $minshr = "VHM";
            $curDate=date('YmdHis');
            $userid = $minshr.$curDate.$serial;//generate*/

            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $hall_feature_rate=str_replace($delimiter, '', $hall_feature_rate);
            $totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
            $hall_feature_rate=floatval($hall_feature_rate);
            $totalPrice=floatval($totalPrice);
            //$hall_feature_rate=number_format($hall_feature_rate,2);
            //$totalPrice = number_format($totalPrice, 2);




            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE hall_reservation_tbl SET client_name='$client_name', client_address='$client_address',client_phone='$client_phone',client_email='$client_email'
,purpose_of_use='$purpose',rate='$hall_feature_rate',no_of_days='$number_of_days',start_date='$startDate',startTime='$startTime',end_date='$endDate',
price_paid='$totalPrice', attended_to_by='$userInAttendance', updated_date='".date("Y-m-d H:i:s")."' where hall_reservation_id=".$clt_id."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated client:".$client_name." hall information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an hall information for a client!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateHallReservation
    public function updateBarItem()
    {
        $itm_id = $this->fm->processfield($_POST['iitm_id']);
        $itemId = $this->fm->processfield($_POST['item_id']);
        $itemRate = $this->fm->processfield($_POST['item_rate']);
        $quantity= $this->fm->processfield($_POST['quantity']);

        //validate
        if(empty($itemId)||empty($itemRate)||empty($quantity) || empty($itm_id)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }


        //check if the username has not beeen registered before

        $qry = "SELECT * FROM bar_tbl WHERE bar_item_id=$itm_id";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The item information does not exist, please create this item first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            //Get the bar quantity for that item
            $qryQty=$this->db->fetchData($qry);
            $rowQSold=$qryQty['quantity_sold'];
            $rowItemId=$qryQty['item_id'];

            //Get the barsetup available quantity for the item
            $qtyQuery = "SELECT quantity_available qtyAvailable FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$rowItemId";
            $qtyRow = $this->db->fetchData($qtyQuery);
            $qtyCounted=$qtyRow['qtyAvailable'];
            //echo "//Get the barsetup available quantity for the item ". $qtyCounted;

            //add them together
            $addQSold=floatval($rowQSold)+floatval($qtyCounted);
            echo "<br/>//add them together ".$addQSold;
            //update barsetup
            $updQSold = "UPDATE bar_setup_tbl SET quantity_available = '$addQSold', updated_date ='".date("Y-m-d H:i:s")."'  WHERE item_id=$rowItemId";
            $upResQSold = $this->db->executeQuery($updQSold);

            //Get the new quantity from form
            //Get the barsetup available quantity
            $qtyNewSold = "SELECT quantity_available qtyAvailable FROM `bar_setup_tbl` where quantity_available > 0 and item_id=$itemId";
            $qtyNewRowSold = $this->db->fetchData($qtyNewSold);
            $qtyNewCounted=$qtyNewRowSold['qtyAvailable'];

            //echo "//add them together ".$qtyNewCounted;

            //subtract them from each other
            $newQtyAvail=floatval($qtyNewCounted) - floatval($quantity);
            //echo "<br/>//subtract them from each other". $newQtyAvail;


            //update barsetup
            $updFinishQuery = "UPDATE bar_setup_tbl SET quantity_available = '$newQtyAvail', updated_date ='".date("Y-m-d H:i:s")."'  WHERE item_id=$itemId";
            $upResFinishQuery = $this->db->executeQuery($updFinishQuery);

            //echo "<br/>after //update barsetup";

            $userInAttendance=$_SESSION['username'];
            $delimiter=',';
            $itemRate=str_replace($delimiter, '', $itemRate);
            $totalPrice= floatval($itemRate)*floatval($quantity);
            $quantity=floatval($quantity);
            $itemRate=floatval($itemRate);
            $totalPrice=floatval($totalPrice);

            //echo "<br/> after total price: ".$totalPrice ."and before last update updateQry";
            $updateQry = "UPDATE bar_tbl SET item_id='$itemId', quantity_sold='$quantity', rate='$itemRate',total='$totalPrice',attended_to_by='$userInAttendance', date_created= '".date("Y-m-d H:i:s")."' where bar_item_id='$itm_id'";
            $res = $this->db->executeQuery($updateQry);
            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated bar item of Item Id:".$itemId." information!");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an bar Item information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateBarItem
    public function updateHallSetup()
    {
        $hallNumber = $this->fm->processfield($_POST['hall_number']);
        $hallName= $this->fm->processfield($_POST['hall_name']);
        $featureId = $this->fm->processfield($_POST['feature_id']);
        $availability = $this->fm->processfield($_POST['availability']);

        /*
                $delimiter=',';
                $rate=str_replace($delimiter, '', $rate);
                $discount=str_replace($delimiter, '', $discount);*/


        //validate
        if(empty($hallNumber)||empty($hallName) ||empty($featureId) || empty($availability)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all required fields are completed!
             </div>';
            return $msg;
        }


        $qry = "SELECT * FROM hall_setup_tbl WHERE hall_number=$hallNumber";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The hall setup information does not exist, please create the information first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {
            $userInAttendance=$_SESSION['username'];
            /*
             *  //$delimiter=',';
             //$rate=str_replace($delimiter, '', $rate);
             //$discount=str_replace($delimiter, '', $discount);
             $pricePaid=floatval($rate)-floatval($discount);
             $rate=number_format($rate,2);
             $discount=number_format($discount,2);
             $pricePaid=number_format($pricePaid,2);
             //$totalPrice= floatval($hall_feature_rate)*floatval($number_of_days);
             //$totalPrice = number_format($totalPrice, 2);
            */


            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //prepare to insert
            $updateQry = "UPDATE  hall_setup_tbl SET hall_name='$hallName', hall_feature_id='$featureId', availability='$availability', updated_date='".date("Y-m-d H:i:s")."', maker='$userInAttendance' where hall_number=".$hallNumber."";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$hallName." room setup information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Hall Setup information!</p>
                              </div>';
                return $msg;


            }
        }

    }//end updateHallSetup
    public function updateBarSetup()
    {
        $item_id=$this->fm->processfield($_POST['item_id']);
        $itemType = $this->fm->processfield($_POST['itemType']);
        $itemName = $this->fm->processfield($_POST['itemName']);
        $itemRate = $this->fm->processfield($_POST['rate']);
        $quantity = $this->fm->processfield($_POST['quantity']);
        $quantityAvailable = $this->fm->processfield($_POST['quantityAvailable']);
        $oldQuantity=$this->fm->processfield($_POST['oldQuantity']);
        $threshold = $this->fm->processfield($_POST['threshold']);


        $userInAttendance=$_SESSION['username'];
        $delimiter=',';
        $oldQuantity=str_replace($delimiter, '', $oldQuantity);
        $quantity=str_replace($delimiter, '', $quantity);
        $itemRate=str_replace($delimiter, '', $itemRate);
        $newQty=floatval($oldQuantity)+floatval($quantity);
        $cmpQty=floatval($oldQuantity)+floatval($quantity);

        $oldQuantity=floatval($oldQuantity);
        $quantity=floatval($quantity);
        $itemRate=floatval($itemRate);
        $newQty=floatval($newQty);
        $threshold=str_replace($delimiter, '', $threshold);
        $threshold=floatval($threshold);
        $quantityAvailable=str_replace($delimiter, '', $quantityAvailable);
        $quantityAvailable=floatval($quantityAvailable);
        $newQtyAvailable=$quantityAvailable+$quantity;

        /*
         * $oldQuantity=number_format(floatval($oldQuantity),2);
        $quantity=number_format(floatval($quantity),2);
        $newQty=number_format(floatval($newQty),2);
        $threshold=str_replace($delimiter, '', $threshold);
        $threshold=number_format(floatval($threshold),2);
        $quantityAvailable=str_replace($delimiter, '', $quantityAvailable);
        $quantityAvailable=number_format(floatval($quantityAvailable), 2);
        $newQtyAvailable=$quantityAvailable+$quantity;*/



        //validate
        if(empty($itemType)||empty($itemName)||empty($itemRate)||empty($threshold))
        {
            //empty($quantity)||
            //return '<div style="color: #FF0000; font-size: small">Please make sure all fields are filled!</div>';
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please make sure all fields are filled!
             </div>';
            return $msg;
        }
        else if($threshold >= $cmpQty )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please threshold cannot be greater than or equal to quantity:'.$cmpQty.'
             </div>';
            return $msg;
        }
        else if(!is_numeric($threshold)||!is_numeric($quantity))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Please only numbers are allowed!
             </div>';
            return $msg;
        }

        /*
                $delimiter=',';
                $rate=str_replace($delimiter, '', $rate);
                $discount=str_replace($delimiter, '', $discount);*/


        //validate


        $qry = "SELECT * FROM bar_setup_tbl WHERE item_id=$item_id";
        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The bar setup information does not exist, please create the information first!
             </div>';
            return $msg;

        }
        else if($row > 0)
        {



            //$twelveTime=strtotime("12:00:00");

            //date_out, time_out
            //$newQty=$oldQuantity+$quantity;
            //prepare to insert

            $updateQry = "UPDATE  bar_setup_tbl SET item_type='$itemType', item_name='$itemName', item_rate='$itemRate', quantity='$newQty', quantity_available='$newQtyAvailable', threshold='$threshold', updated_date='".date("Y-m-d H:i:s")."', created_by='$userInAttendance' where item_id=".$item_id."";
            $insertQry = "INSERT INTO bar_setup_history_tbl(item_type, item_name, item_rate, quantity, quantity_available, threshold, created_by, created_date, status)
                          VALUES('$itemType','$itemName', '$itemRate', '$quantity', '$quantityAvailable', '$threshold', '$userInAttendance','".date("Y-m-d H:i:s")."', 'Update: After Updating an item information');";
            //SET item_type='$itemType', item_name='$itemName', item_rate='$itemRate', quantity='$newQty', threshold='$threshold', updated_date='".date("Y-m-d H:i:s")."', created_by='$userInAttendance' where item_id=".$item_id."";

            $res = $this->db->executeQuery($updateQry);
            echo "I got here before the update statement";
            $resIns = $this->db->executeQuery($insertQry);

            if($res && $resIns)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated :".$itemName." item setup information");

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated an Item Setup information!</p>
                              </div>';
                return $msg;


            }
        }

    }//End updateBarSetup
    public function updatePermissionSetup()
    {

        $permId = $this->fm->processfield($_POST['permId']);
        $pageName = $this->fm->processfield($_POST['pageName']);
        $pageUrlName = $this->fm->processfield($_POST['pageUrlName']);
        $patientid = $this->fm->processfield($_POST['patientid']);
        $logoName = $this->fm->processfield($_POST['logoName']);
        //validate
        if(empty($pageName)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Page Name cannot be empty, Please make sure you complete it!
             </div>';
            return $msg;
        }
        if(empty($pageUrlName)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Stop!</strong> The URL cannot be empty, Please provide necessary information!
             </div>';
            return $msg;
        }
        /*if((strlen($patientid)<1)
        )
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Parent Id should be completed, just select the appropriate number in the select box provided!
             </div>';
            return $msg;
        }*/


        //check if the username has not beeen registered before

        $qry = "SELECT * FROM permissions_tbl WHERE perm_id = ". $permId."";

        $row = $this->db->getNumOfRows($qry);
        if($row <= 0 )
        {
            //username in use
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oh oh!</strong> The permission does not exist, Please add first!
             </div>';
            return $msg;

        }
        else
        {
            $userInAttendance=$_SESSION['username'];

            //prepare to insert

            $updateQry = "UPDATE permissions_tbl
                  SET page_name='$pageName', page_url='$pageUrlName', parent_id='$patientid', logo_name='$logoName', updated_date= '".date("Y-m-d H:i:s")."', maker='$userInAttendance' where perm_id=$permId";

            $res = $this->db->executeQuery($updateQry);

            if($res)
            {
                $this->audit->audit_log("User ".$_SESSION['username']." updated an existing permission (page) information to - ".$pageName);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Thanks!
                                  </h4>
                                  <p>You have successfully updated permission (page) information for - '.$pageName.'</p>
                              </div>';
                return $msg;


            }
        }

    }//end updatePermissionSetup
    public function uploadCompany($path, $coyid)
{
if(empty($coyid))
{
$msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Naada!</strong> Please create the company information first! Company information does not exist!
             </div>';
return $msg;

}
if(empty($_FILES["file"]["name"]))
{
    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
    return $msg;

}
if($_FILES["file"]["size"] > 900000)
{
    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The photograph is more than the allowed upload size of 900kb!
             </div>';
    return $msg;

}
//generate 4digit random number


$filename = $coyid."_".$_FILES["file"]["name"];

if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
    ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
{

    $target_path = "../../imgs/uploads/".$path."/".$filename;
    $realpath = "../../imgs/uploads/".$path."/".$filename;
    //check if the user has a pix before remove it and replace

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
    {

        $pcqy ="";
        if($path=="coy")
        {
            //$_SESSION['staimage']=$realpath;
            $pcqy = "SELECT * FROM company_info_tbl WHERE coy_id='$coyid'";
            $pxdata = $this->db->fetchData($pcqy);
            $imagename=$pxdata['coy_image'];

            //"../../".

            //chmod($imagename, 0777);
            if(!empty($imagename))unlink($imagename);

            $qry="UPDATE  company_info_tbl SET coy_image='$realpath' WHERE coy_id='$coyid'";
            //mysql_query("UPDATE users_tbl SET imagepath='$realpath' WHERE user_id='$ownerid'");
            echo "Path: ".$realpath;

            $res = $this->db->executeQuery($qry);
            if($res)
            {    $_SESSION['image']=$realpath;
                $this->audit->audit_log("User ".$_SESSION['username']." uploaded picture for company id".$coyid);

                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>Picture uploaded successfully!</p>
                              </div>';
                return $msg;


            }

        }
        /*
         * else
        {
            //$_SESSION['image']=$realpath;
            $pcqy = "SELECT * FROM tblstudent WHERE stud_id='$ownerid'";
            $pxdata = $this->db->fetchData($pcqy);
            $imagename="../".$pxdata['imgpath'];

            if(!empty($imagename)) unlink($imagename);

            mysql_query("UPDATE tblstudent SET imgpath='$realpath' WHERE stud_id='$ownerid'");
            $this->audit->audit_log("Admin ".$_SESSION['username']." uploaded picture ".$filename." for student ".$this->getStudentName($ownerid));

                $this->audit->audit_log($this->getStudentName($ownerid)." uploaded a picture ".$filename);
                return '<font color="#006600" size="-2">Picture uploaded successfully!</font>';

        }*/
    }
    else
        $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
    return $msg;


}//end if checking file type
else
{
    $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid File selected!
             </div>';
    return $msg;


}
}//end uploadCompany

    function  sendMailToAskForCover()
    {

        $CarerRosterID = $this->fm->processfield($_POST['CarerRosterID']);
        $message = trim($_POST['message']);



        if(empty($CarerRosterID) || $message == "")
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Sorry!</strong> Please Provide all Information in the fields!
             </div>';
            return $msg;

        }

        $emailMessage = "select * from tblemail where message='$message'";
        $result = $this->db->getNumOfRows($emailMessage);
        if($result > 0){
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Sorry!</strong> The mail has been sent already, select another schedule!
             </div>';
            return $msg;
        }

        try {
            $carMailQuery = "select * from tblcarer where CarerID  not in (SELECT CarerID from tblcarerroster where CarerRosterID='$CarerRosterID')";
            $conn=$this->db->getConnection();
            $result = mysqli_query($conn, $carMailQuery);
               while($row_list=mysqli_fetch_assoc($result))
                {
                    $email = $row_list['EmailAddress'];
                    $carerId = $row_list['CarerID'];
                    $to  = $email;
                    $subject = "Carer Cover request by Manager: ".$_SESSION['userfullname'];
                    $actualMessage = '<html>
	<head>
	<title>TCare Plus Carer Scheduling System</title>
	</head>

	<body style="font-family:verdana, arial; font-size: .8em;">
	'.$message .'
	<br/>Best Regards<br/>
	'.$_SESSION['userfullname'].'<br/><br/>

	</body>
	</html>';
                        $headers = 'From: ccomputingpractical@gmail.com' . "\r\n" .
                        'Reply-To: ccomputingpractical@gmail.com' . "\r\n" .
                        'Cc: diamonddemola@yahoo.co.uk' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n".
                        'Content-type: text/html'."\r\n";

                    $retval = mail($to, $subject, $message, $headers);
                    if($retval == true){
                        $suc ="Sent";
                    }
                    else{
                        $fail="Not Sent";
                    }

                        $qry = "INSERT INTO tblemail(sender, CarerRosterID, receiver, message, sentdate, CarerID) VALUE  ('ccomputingpractical@gmail.com', $CarerRosterID, '$to', '$message', '".date("Y-m-d H:i:s")."', '$carerId')";

                    $res = $this->db->executeQuery($qry) ;
                    if($res){
                        $inSucc ="mail inserted";
                    }
                    else{
                        $inFail = "Mail not Sent";
                    }


                }//end while

            if(isset($suc) and isset($inSucc))
            {
                $this->audit->audit_log("Admin ".$_SESSION['userfullname']." sent a new new mail for cover.");
                $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Great!
                                  </h4>
                                  <p>Message sent successfully...!</p>
                              </div>';
                return $msg;
            }
            else
            {
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Sorry!</strong> Message could not be sent...!
             </div>';
                return $msg;

            }//end if

         }//end try
     catch(Exception $exc)
        {
            echo ($exc->getMessage() . "<br>");
        }

    }  //end function ask for cover


    public function upload($path, $ownerid, $sheetDate)
    {
        //echo "Owner Id".$ownerid;
        if($sheetDate=='' || empty($ownerid))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> The carer and date cannot be empty!
             </div>';
            return $msg;

        }
        if(empty($_FILES["file"]["name"]))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
            return $msg;

        }
        if($_FILES["file"]["size"] > 9000000)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The document is more than the allowed upload size of 900kb!
             </div>';
            return $msg;

        }
        //$title = $_FILES["file"]["name"];
        $filename = $_SESSION['username']."_".$ownerid."_".$_FILES["file"]["name"];
        //echo $filename;
        if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "application/pdf")
            ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
        {

            $target_path = "../uploads/".$path."/".$filename;
            $realpath = "../uploads/".$path."/".$filename;
            //check if the user has a pix before remove it and replace

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
            {

                $pcqy ="";
                if($path=="documents")
                {
                    $sheetDate = date('Y-m-d', strtotime($sheetDate));
                    //$_SESSION['staimage']=$realpath;
                    $pcqy = "SELECT * FROM tbltimesheet WHERE carerid='$ownerid' and sheetdate='$sheetDate'";
                    $pxdata = $this->db->fetchData($pcqy);
                    $rowCount = $this->db->fetchArrayData($pcqy);
                    $imagename=$pxdata['document'];
                    //"../../".

                    //chmod($imagename, 0777);
                    if(!empty($imagename))unlink($imagename);
                    if($rowCount > 0) {
                        //echo "update";
                        $qry = "UPDATE  tbltimesheet SET sheetdate ='$sheetDate', document='$realpath', title='$filename' WHERE carerid='$ownerid' and sheetdate = '$sheetDate'";
                        //mysql_query("UPDATE users_tbl SET imagepath='$realpath' WHERE user_id='$ownerid'");
                    }
                    elseif($rowCount <= 0){
                        //echo "insert";
                        $qry = "INSERT INTO tbltimesheet(carerid, sheetdate, document, title) VALUE  ('$ownerid', '$sheetDate', '$realpath', '$filename')";
                    }
                    $res = $this->db->executeQuery($qry);
                    if($res)
                    {
                        $_SESSION['document']=$realpath;
                        $this->audit->audit_log("User ".$_SESSION['username']." uploaded timesheet for carer id: ".$_SESSION['username']);

                        $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>Document uploaded successfully!</p>
                              </div>';
                        return $msg;


                    }

                }
                /*
                 * else
                {
                    //$_SESSION['image']=$realpath;
                    $pcqy = "SELECT * FROM tblstudent WHERE stud_id='$ownerid'";
                    $pxdata = $this->db->fetchData($pcqy);
                    $imagename="../".$pxdata['imgpath'];

                    if(!empty($imagename)) unlink($imagename);

                    mysql_query("UPDATE tblstudent SET imgpath='$realpath' WHERE stud_id='$ownerid'");
                    $this->audit->audit_log("Admin ".$_SESSION['username']." uploaded picture ".$filename." for student ".$this->getStudentName($ownerid));

                        $this->audit->audit_log($this->getStudentName($ownerid)." uploaded a picture ".$filename);
                        return '<font color="#006600" size="-2">Picture uploaded successfully!</font>';

                }*/
            }
            else
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
            return $msg;


        }//end if checking file type
        else
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid File selected!
             </div>';
            return $msg;


        }
    }//end upload
    public function carerUploadPhotos($path, $ownerid)
    {
        //echo "Owner Id".$ownerid;
        if(empty($ownerid))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> The carer cannot be empty!
             </div>';
            return $msg;

        }
        if(empty($_FILES["file"]["name"]))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
            return $msg;

        }
        if($_FILES["file"]["size"] > 9000000)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The photo is more than the allowed upload size of 900kb!
             </div>';
            return $msg;

        }
        //$title = $_FILES["file"]["name"];
        $filename = $_SESSION['username']."_".$ownerid."_".$_FILES["file"]["name"];
        //echo $filename;
        if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
            ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
        {

            $target_path = "../uploads/".$path."/".$filename;
            $realpath = "../uploads/".$path."/".$filename;
            //check if the user has a pix before remove it and replace

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
            {

                $pcqy ="";
                if($path=="photos")
                {
                    $pcqy = "SELECT * FROM tblcarer WHERE carerid='$ownerid'";
                    $pxdata = $this->db->fetchData($pcqy);
                    $rowCount = $this->db->fetchArrayData($pcqy);
                    $imagename=$pxdata['imagepath'];
                    //"../../".

                    //chmod($imagename, 0777);
                    if(!empty($imagename))unlink($imagename);
                    if($rowCount > 0) {

                        $qry = "UPDATE  tblcarer SET imagepath ='$realpath' WHERE carerid='$ownerid'";

                    }

                    $res = $this->db->executeQuery($qry);
                    if($res)
                    {
                        $_SESSION['imagepath']=$realpath;
                        $this->audit->audit_log("User ".$_SESSION['username']." uploaded photos for carer: ".$_SESSION['username']);

                        $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>photo uploaded successfully!</p>
                              </div>';
                        return $msg;


                    }

                }

            }
            else
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
            return $msg;


        }//end if checking file type
        else
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid File selected!
             </div>';
            return $msg;


        }
    }//end carerUploadPhotos
    public function uploadPhotos($path, $ownerid)
    {
        //echo "Owner Id".$ownerid;
        if(empty($ownerid))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> The carer cannot be empty!
             </div>';
            return $msg;

        }
        if(empty($_FILES["file"]["name"]))
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Nah!</strong> Select file to be uploaded!
             </div>';
            return $msg;

        }
        if($_FILES["file"]["size"] > 9000000)
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> The photo is more than the allowed upload size of 900kb!
             </div>';
            return $msg;

        }
        //$title = $_FILES["file"]["name"];
        $filename = $_SESSION['username']."_".$ownerid."_".$_FILES["file"]["name"];
        //echo $filename;
        if ((($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/jpeg")
            ||($_FILES["file"]["type"] == "image/jpg")||($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/pjpeg")))
        {

            $target_path = "../uploads/".$path."/".$filename;
            $realpath = "../uploads/".$path."/".$filename;
            //check if the user has a pix before remove it and replace

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path))
            {

                $pcqy ="";
                if($path=="photos")
                {
                    $pcqy = "SELECT * FROM tbladmin WHERE AdminID='$ownerid'";
                    $pxdata = $this->db->fetchData($pcqy);
                    $rowCount = $this->db->fetchArrayData($pcqy);
                    $imagename=$pxdata['imagepath'];
                    //"../../".

                    //chmod($imagename, 0777);
                    if(!empty($imagename))unlink($imagename);
                    if($rowCount > 0) {

                        $qry = "UPDATE  tbladmin SET imagepath ='$realpath' WHERE AdminID='$ownerid'";

                    }

                    $res = $this->db->executeQuery($qry);
                    if($res)
                    {
                        $_SESSION['imagepath']=$realpath;
                        $this->audit->audit_log("User ".$_SESSION['username']." uploaded photos for carer: ".$_SESSION['username']);

                        $msg = '<div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                    Gracias!
                                  </h4>
                                  <p>photo uploaded successfully!</p>
                              </div>';
                        return $msg;


                    }

                }

            }
            else
                $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> File Upload failed, please try again!
             </div>';
            return $msg;


        }//end if checking file type
        else
        {
            $msg = '<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                 <i class="fa fa-times"></i>
               </button>
               <strong>Oops!</strong> Invalid File selected!
             </div>';
            return $msg;


        }
    }//end carerUploadPhotos

    function Change_Password()
{

	$staff_id = $this->fm->processfield($_POST['user']);
	 $old = $this->fm->processfield($_POST['oldpass']);
  	 $new= $this->fm->processfield($_POST['newpass']);
     $confirm = $this->fm->processfield($_POST['cpass']);

        if(empty($old)||empty($new)||empty($confirm)||empty($staff_id))
		{
			return '<font color="#FF0000" size="-2">Please make sure all fields are filled!</font>';
		}
		
		if(!empty($old) && strcmp($new, $confirm) !=0 )
		{
			return '<font color="#FF0000" size="-2">Password mismatch</font>';
		}
		
		$qry = "SELECT * FROM tblstaff WHERE staff_id='$staff_id' and password = '".sha1($old)."'";
		
		//return $qry;
		
		$row = $this->db->getNumOfRows($qry);
		if($row == 0 )
		{
			//username in use
			return '<font color="#FF0000" size="-2">The Old password is incorrect or does not exist</font>';
		}
		else
		{
		
		$upquery = "UPDATE tblstaff SET password = '".sha1($new)."' WHERE staff_id = '$staff_id'";
		//return $upquery;
		$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
		return '<font color="#009900" size="-2">Password Changed!</font>';
		}
}//end change password

function Reset_Password()
{
	// $staff_id = $_POST['staffid'];
	 $user = $_POST['username'];
  	 
        if(empty($user))
		{
			return '<font color="#FF0000" size="-2">Please, Enter the username in the box!</font>';
		}
		
				
		$qry = "SELECT * FROM tblstaff WHERE staff_id='$user'";
		
		//return $qry;
		
		$row = $this->db->getNumOfRows($qry);
		if($row == 0 )
		{
			//username in use
			return '<font color="#FF0000" size="-2">The Username does not exist</font>';
		}
		else
		{
		 $new = "cabinet";
		$upquery = "UPDATE tblstaff SET password = '".sha1($new)."' WHERE staff_id = '$user'";
		//return $upquery;
		$res = mysql_query($upquery) or die(mysql_error());//or die('na here');
					
		return '<font color="#FF0000" size="-2">Password Reset!</font>';
		}
}




} 

?>