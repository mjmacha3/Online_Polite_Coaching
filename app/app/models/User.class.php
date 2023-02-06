<?php 
/**
 * users models
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require ROOT.'/thirdparty/vendor/autoload.php';

class User 
{
    
    private $errors = "";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

    public function login($POST)
    {
        try {
            $data = array();
        
        //show($POST);
        $data['employeeID'] = trim($_POST['employeeID']);
        $data['password']   = trim($_POST['password']);

        // if (empty($data['employeeID']))
        // {
        //     $_SESSION['errors'] .= ("Please input employee id <br>");
        // }
        // if (empty($data['password']))
        // {
        //     $_SESSION['errors'] .= ("Please input password <br>");
        // }
        
        // if(!isset($_SESSION['errors']))
        // {

            //show($POST);
            //confirm
            $data['password'] = hash('SHA256', $data['password']);
            //show($data);
            $query = "select top 1 [EMPLOYEE ID NUMBER] as employee_id, access, username, CONCAT(FIRSTNAME,' ', LASTNAME) as fullname,
            DateLock, Department, Supervisor, [current employee position] as position, Location, email_address  from vw_CoachingLogin where [EMPLOYEE ID NUMBER] = :employeeID AND Password = :password AND Access <> 'INACTIVE'";
            $db = Database::getInstance();
            //VAR_DUMP($query);
            $result = $db->read($query,$data);
            //var_dump($result);
            
            if(is_array($result))
            {
                //show($data);
                $_SESSION['user_data'] = $result;
                $_SESSION['access_type']  = $result[0]->access;
                $_SESSION['coachingPolicy'] = $db->read("SELECT TOP 1 id,file_name FROM tblCoachingPolicy");
                header("Location: " . ROOT . "home");
                //return true;
            }
            if($result==false)
            {
                $_SESSION['errors'] = "Wrong employee id or password" ;
            }

            //code...
        } catch (Exception $e) {
            //throw $th;
            $_SESSION['errors'] =  'Caught exception: ' . $e->getMessage();
        }
    
        
        // }
        // $_SESSION['errors'] = $_SESSION['errors'];
        //show($_SESSION['errors']);

    }
    public function get_user($url)
    {

    }

    public function check_login()
    {
        if (isset($_SESSION['user_data']))
        {
            return $_SESSION['user_data'];
        }
        return false;
    }
    public function logout()
    {
        // if (isset($_SESSION['user_data']))
        // {
        //     unset($_SESSION['user_data']);
        //     unset($_SESSION['access_type']);
        //     unset($_SESSION['errors']);
        // }
        session_destroy();
        header("Location: " . ROOT . "login");
        die;
          
    }

    public function newCoachingForm($POST)
    {
             try {
                //$error= "";
                $cdata = array();
                $cdata['employeeID'] = trim($POST['employeeID']);
                $cdata['fullname'] = trim($POST['fullname']); 
                $cdata['department'] = trim($POST['department']);
                $cdata['designation'] = trim($POST['designation']);
                $cdata['coachingCategory'] = trim($POST['coachingCategory']);
                $cdata['rootCategory'] = trim($POST['rootCategory']);
                $cdata['dtCoachingDate'] = trim($POST['dtCoachingDate']);
                $cdata['supervisor'] = trim($POST['supervisor']);
                $cdata['dtFollowUp'] = $POST['dtFollowUp'];
                $cdata['discussion'] = trim($POST['discussion']);
                $cdata['cause'] = trim($POST['cause']);
                $cdata['effect'] = trim($POST['effect']);
                $cdata['employeActionPlan'] = trim($POST['employeActionPlan']);
                $cdata['leaderActionPlan'] = trim($POST['leaderActionPlan']);
                $cdata['dtEmployeeDate'] = trim($POST['dtEmployeeDate']);
                $cdata['dtLeaderDate'] = trim($POST['dtLeaderDate']);
                $cdata['coachedby'] = trim($POST['coachedby']);
                $cdata['notedby'] = trim($POST['notedby']);
                $cdata['acknowledgedby'] = trim($POST['acknowledgedby']);
                $cdata['date1'] = date('Y-m-d H:i:s');
                $cdata['LastUpdateBy'] = trim($POST['coachedby']);
                $cdata['status'] = 'ACTIVE';
                $cdata['scanID'] = trim($POST['scanID']);
                $cdata['cboSite'] = trim($POST['cboSite']);
                $cdata['date2'] = date('Y-m-d H:i:s');
                 $cdata['datehire'] = $POST['datehire'];
                $cdata['SubCategory'] = trim($POST['SubCategory']);
                 $cdata['coachee_email'] = trim($POST['coachee_email']); 
                 $cdata['coached_email'] = trim($POST['coached_email']); 
                
        
                
               
                if ($cdata['fullname']  == $_SESSION['user_data'][0]->fullname)
                {
                    $_SESSION['errors'] = "You cannot coach yourself! <br>" ;
                }
                if (empty($cdata['fullname']))
                {
                    $_SESSION['errors']  = "Fullname cannot be empty!";
                }
                if (empty($cdata['notedby']))
                {
                    $_SESSION['errors']  = "Noted by cannot be empty, Contact your system administrator.";
                }
                if(!filter_var($cdata['coachee_email'], FILTER_VALIDATE_EMAIL))
                {
                    $_SESSION['errors'] = $cdata['coachee_email'] . " is not a valid email, please check. <br>";
                }
                if(!filter_var($cdata['coached_email'], FILTER_VALIDATE_EMAIL))
                {
                    $_SESSION['errors'] = $cdata['coached_email'] . " is not a valid email, please check. <br>";
                }
                //show($_SESSION['errors'] . $_SESSION['errors']);
                // if(!isset($_SESSION['errors']))

                // {
                //     show($_SESSION);
                //     show ($cdata);
                // }
                if(!isset($_SESSION['errors']))
                {
                $query = "INSERT INTO tblCoachingMaster2 (EID, Name, Department, Designation, CoachingCategory, RootCauseCategory, CoachingDate,
                Supervisor, FUCoachingDate, ItemDiscussion, RootCause, Effect,
                EmployeeActionPlan, SupervisorActionPlan, EffectiveDateEAP, EffectiveDateSAP,
                CoachedBy, NotedBy, Coachee,Updatedate,LastUpdateBy,
                Status,ScanId, Site, CoachingDate2,StartDate,SubCategory,coach_email,coachee_email) OUTPUT INSERTED.coachingID VALUES 
                (:employeeID, :fullname ,:department , :designation, :coachingCategory , :rootCategory, :dtCoachingDate,
                :supervisor ,:dtFollowUp , :discussion , :cause , :effect,
                :employeActionPlan, :leaderActionPlan , :dtEmployeeDate, :dtLeaderDate,
                :coachedby, :notedby,:acknowledgedby ,:date1 , :LastUpdateBy,
                :status, :scanID,:cboSite, :date2, :datehire,:SubCategory,:coached_email,:coachee_email)";
        
               $db = Database::getInstance();
                $result = $db->read($query,$cdata);
                //return $result;
                        if(is_array($result))
                        {
                                $coachingID = $result[0]->coachingID;
                                $query = "SELECT * FROM tblCoachingMaster2 WHERE coachingID = $coachingID";
                                //$db = Database::getInstance();
                                $result = $db->read($query);
                                //return $result; 
                                //return true;
                                $_SESSION['session_data'] = $result;
                                $coacheeMail = $this->mail( $cdata['coachee_email'],$cdata['fullname'], $coachingID,'coachee' );
                                $_SESSION['coacheeMail']=$coacheeMail;
                                $coachedMail = $this->mail( $cdata['coached_email'],$cdata['coachedby'], $coachingID,'coached' );
                                $_SESSION['coachedMail']=$coachedMail;
                                header("Location: " . ROOT . "coachingsessiondata");
                                die;
                        }
                }
               
            } catch (Exception $e) {
                 $_SESSION['errors'] =  'Caught exception: ' . $e->getMessage();
         }
        // $_SESSION['errors'] =   "";
         //return false;
         //$_SESSION['errors'] =   $_SESSION['errors'];
         //var_dump($_SESSION['errors']);
    }
    
  
    public function SIGNUP($POST)
    {
        $cdata = array();
        show($_POST);
        $cdata['eid1'] = $_POST['email'];
        $cdata['username'] = $_POST['address'];
        $cdata['pword'] = $_POST['password'];
        $query = "INSERT INTO tblCoachingMaster2(EID,Name,Department) VALUES (:eid1,:username,:pword)";
        $db = Database::getInstance();
        $result = $db->write($query,$cdata);
        show($query);
        show($result);

    }
    public function get_info($POST)
    {            $data = array();
                $data['employeeID'] = $POST['employeeID'];     
                  $query = "select top 1 FIRSTNAME+' '+LASTNAME AS name, [EMPLOYEE ID NUMBER] as employeeID, [CURRENT EMPLOYEE POSITION] as position, LOCATION,
                   Department, DateLock, isnull(case when Supervisor not like '%,%' then Supervisor else ltrim(rtrim(substring(Supervisor,CHARINDEX(', ',Supervisor)+1,len(Supervisor)))) +' '+ltrim(rtrim(substring(Supervisor,0,CHARINDEX(', ',Supervisor)))) end,'') as Supervisor,Email_Address 
                  ,manager_name, c.sup_desc
                  FROM tblVKPOEmployee_HRNames a 
                  left outer join tblEmailAddress b  ON a.[EMPLOYEE ID NUMBER] = b.EID
                 left outer join vw_coachingSupervisor c ON a.[EMPLOYEE ID NUMBER] = (SELECT TOP 1 c.eid from vw_coachingSupervisor where c.sup_desc = 'Manager')
                  WHERE a.EmployeeStatus = 'ACTIVE' AND [EMPLOYEE ID NUMBER] =:employeeID";
                  $db = Database::getInstance();
                 $get_data = $db->read($query,$data);
                 return $get_data;
               
                 
    }

    public function display_input_fields()
    {
        $db = Database::newInstance();
         //show($db);
         //VAR_DUMP($query);

         //display records on input fields
         $data = array();
         $data['get_category'] = $db->read("select distinct Category from tblCoachingCategory order by Category");
         $data['get_sub_category'] = $db->read("select distinct SubCategory from tblCoachingSubCategory order by SubCategory");
         $data['get_root_cause'] = $db->read("select distinct RootCause from tblCoachingRootCause order by RootCause");
         $data['get_location'] = $db->read("select distinct location FROM tblVKPOEmployee_HRNames WHERE EmployeeStatus = 'ACTIVE'");
         
         $sup_id = $_SESSION['user_data'][0]->employee_id;
     
         if ($_SESSION['access_type'] == 'Full')
         {
            $data['get_data'] = $db->read("select * from vw_coachingFilterData");
         }else
         {
            $data['get_data'] = $db->read(" select distinct Name,emp_id from vw_coachingFilterData a
			   left outer join vw_coachingSupervisor b ON a.emp_id = b.eid
			    where b.eid_sup = '$sup_id'");
         }
         return $data;
    }

    public function mail($mailAddress,$name,$coachingID,$data_type)
    {
        
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    //$mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = MAIL_USERNAME;                     //SMTP username
                    $mail->Password   = MAIL_PASSWORD;                               //SMTP password
                    $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom(MAIL_USERNAME, 'VKPO Notification');
                     $mail->addAddress($mailAddress, $name);     //Add a recipient
                    // $mail->addAddress('mjmacha3@gmail.comm');               //Name is optional
                    // $mail->addReplyTo('mjmacha3@gmail.com', 'Information');
                    // $mail->addCC('mjmacha3@gmail.com');
                    // $mail->addBCC('mjmacha3@gmail.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Polite Coaching Session Acknowledgement';
                    $line1 = "<br>Dear ". $name . ", <br><br>";
                    $line2 =  "This is an email confirmation that you have attended coaching and understood <br>";
                    $line3 = "item(s) discussed during the session done earlier today. This further signifies <br>";
                    $line4 ="accountability to follow agreed action plans stated on the POLITE Coaching form. <br><br>";
                    $line5 = "Coaching ID: ".$coachingID ;
                    if ($data_type == 'coachee'){
                        $line6 = "<h4>PLEASE AKNOWLEDGE TO THIS LINK: http://52.187.147.244/acknowledgement/index.php?CoachingID=".$coachingID."</h4><br><br>";
                    }
                    else{
                        $line6= "";
                    }
                    $line7 = "<br><br>Thank you, <br><br>";
                    $line8 = "Visaya Knowledge Process Outsourcing <br><br>";
                    $line9 = "*** This is a system generated message. <b>DO NOT DELETE AND REPLY TO THIS EMAIL.</b>***";
                    $mail->Body    = $line1 . $line2 . $line3 . $line4 . $line5 . $line6 . $line7 .$line8 .$line9 ;
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    $_SESSION['mail_errors']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                    }
                    return false;
                    $_SESSION['mail_errors']=  $_SESSION['mail_errors'];    
}

  

   
    

}