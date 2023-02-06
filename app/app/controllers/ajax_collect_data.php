<?php

Class Ajax_collect_data extends Controller
{
    public function index()

    {
        if(!isset($_POST['data_type'])){

            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
          }
        // $User = $this->load_model('User');
          //$db = Database::getInstance();
          
           
               
                if ($_POST['data_type'] == 'get_info')
                {
                  
                    $User = $this->load_model('User');
                    $get_data = $User->get_info($_POST);
                     echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                }
                if($_POST['data_type'] =='save_data')
                {
                    $User = $this->load_model('User');
                    $get_data = $User->newCoachingForm($_POST);

                    if ($_SESSION['errors'] != "")
                    {
                    
                    $get_data['message'] = $_SESSION['errors'];
                    $_SESSION['errors'] = "";
                    echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                    }
                    else
                    {
                        
                        echo json_encode($get_data); 
                    }
                }
                if($_POST['data_type']=='acknowledge_data')
                {
                    $data = array();
                    $data['EID']= $_SESSION['user_data'][0]->employee_id;
                    $db = Database::getInstance();
                    $get_data = $db->read("SELECT coachingID,CoachingDate,CoachedBy,coachee_email,Acknowledge,Acknowledge_date FROM tblCoachingMaster2 
                    WHERE status = 'ACTIVE' and EID=:EID ORDER BY Acknowledge asc, Acknowledge_date desc",$data);
          
                    echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                }
                if($_POST['data_type']=='users_data')
                {
                    // $data = array();
                    // $data['EID']= $_SESSION['user_data'][0]->employee_id;
                    $db = Database::getInstance();
                    $get_data = $db->read("select distinct PCIT,[EMPLOYEE ID NUMBER] as emp_id,FIRSTNAME + ' ' + LASTNAME as fullname ,Access ,Email_Address from vw_CoachingLogin");
                    echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                }
                if($_POST['data_type']=='email_data')
                {
                    // $data = array();
                    // $data['EID']= $_SESSION['user_data'][0]->employee_id;
                    $db = Database::getInstance();
                    $get_data = $db->read("SELECT EID,Email_Address, FIRSTNAME+' '+LASTNAME as fullname FROM tblEmailAddress a left outer join tblVKPOEmployee_HRNames b ON a.EID = b.[EMPLOYEE ID NUMBER] where EmployeeStatus = 'ACTIVE'");
                    echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                }

        
        
        
        
    }
}