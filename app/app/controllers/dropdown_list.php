<?php
class dropdown_list extends Controller
{
    public function index()
    {
        $db = Database::getInstance();
        
        if ($_POST['data_type']=='getCoachingCategory')
        {
            $output = '';
            $data= $db->read("select distinct Category from tblCoachingCategory order by Category");
            foreach($data as $key => $object){
                $output .= '<option value="'. $object->Category .'">'.$object->Category.'</option>';
              }
            echo json_encode($output);
            exit();

        }

          
        if ($_POST['data_type']=='getSubCategory')
        {
            $output = '';
            $data= $db->read("select distinct SubCategory from tblCoachingSubCategory order by SubCategory");
            foreach($data as $key => $object){
                $output .= '<option value="'. $object->SubCategory .'">'.$object->SubCategory.'</option>';
              }
            echo json_encode($output);
            exit();

        }


          
        if ($_POST['data_type']=='getRootCategory')
        {
            $output = '';
            $data= $db->read("select distinct RootCause from tblCoachingRootCause order by RootCause");
            foreach($data as $key => $object){
                $output .= '<option value="'. $object->RootCause .'">'.$object->RootCause.'</option>';
              }
            echo json_encode($output);
            exit();

        }


        if($_POST['data_type']=='updateCoachingForm')
        {
     
            $cdata['coachingID'] = trim($_POST['coachingID']);
            $cdata['coachingCategory'] = trim($_POST['coachingCategory']);
            $cdata['rootCategory'] = trim($_POST['rootCategory']);
            $cdata['dtCoachingDate'] = trim($_POST['dtCoachingDate']);
            $cdata['dtFollowUp'] = $_POST['dtFollowUp'];
            $cdata['discussion'] = trim($_POST['discussion']);
            $cdata['cause'] = trim($_POST['cause']);
            $cdata['effect'] = trim($_POST['effect']);
            $cdata['employeActionPlan'] = trim($_POST['employeActionPlan']);
            $cdata['leaderActionPlan'] = trim($_POST['leaderActionPlan']);
            $cdata['dtEmployeeDate'] = trim($_POST['dtEmployeeDate']);
            $cdata['dtLeaderDate'] = trim($_POST['dtLeaderDate']);
            $cdata['date1'] = date('Y-m-d H:i:s');
            $cdata['LastUpdateBy'] = trim($_POST['coachedby']);
            $cdata['scanID'] = trim($_POST['scanID']);
            $cdata['SubCategory'] = trim($_POST['SubCategory']);
             $cdata['coachee_email'] = trim($_POST['coachee_email']); 
             $cdata['coached_email'] = trim($_POST['coached_email']); 

             $query= "UPDATE tblCoachingMaster2 SET CoachingCategOry =:coachingCategory,
              RootCauseCategory=:rootCategory,CoachingDate=:dtCoachingDate,FUCoachingDate=:dtFollowUp,
              ItemDiscussion=:discussion, RootCause=:cause, Effect=:effect,EmployeeActionPlan=:employeActionPlan,
              SupervisorActionPlan=:leaderActionPlan,EffectiveDateEAP=:dtEmployeeDate, EffectiveDateSAP=:dtLeaderDate,
              LastUpdateBy=:LastUpdateBy,ScanId=:scanID,SubCategory=:SubCategory, coachee_email=:coachee_email,
              coach_email=:coached_email,Updatedate=:date1, Acknowledge='NO' 
              WHERE STATUS ='ACTIVE' and CoachingID =:coachingID";
             $result = $db->write($query,$cdata);
             if($result == true)
             {
              
              $Email = $this->load_model('Email');
              $coacheeMail = $Email->sendAcknowledge( $cdata['coachee_email'],trim($_POST['fullname']),$cdata['coachingID'] ,'coachee' );
              $coachedMail = $Email->sendAcknowledge( $cdata['coached_email'],trim($_POST['coachedby']),$cdata['coachingID'] ,'coached' );
             
                $response = array(
                    'status' => 1,
                    'coacheeMailStatus' => $coacheeMail,
                    'coachedMailStatus' => $coachedMail,
                    'msg' => 'Coaching session successfully updated'
                  );
             }
             else
             {
                $error['error_status'] = 1;
                $error['oldPassword'] = 'Sorry! something wrong.';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
             }
            echo json_encode($response, JSON_INVALID_UTF8_IGNORE );
            exit();
        }




    }
}