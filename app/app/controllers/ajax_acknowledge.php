<?php

class ajax_acknowledge extends Controller
{
    public function index()
    {
        if (!isset($_POST['data_type'])){
            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
        }
        $db = Database::getInstance();

        if($_POST['data_type']=='update')
        {
         //$data['Name'] = $_SESSION['user_data'][0]->fullname;
         $data['coachingID'] = $_POST['coachingID'];
         $data['date'] = date('Y-m-d');
         $email = trim($_POST['email']);
         $get_data = $db->write("UPDATE tblCoachingMaster2 set Acknowledge = 'YES',Acknowledge_date=:date where coachingID =:coachingID",$data);
         if($get_data==true)
         {
            $response = array(
                'status' => 1,
                'msg' => 'Thank you! <br> Your coaching session has been successfully acknowledged. <br> Coaching ID: ' . $data['coachingID']
              );
            $Email = $this->load_model('Email');
            $user_data = $Email->acknowledgeMail($email, $data['coachingID']);
            if($user_data ==true){
                $response = array(
                    'status' => 2,
                    'msg' => 'Thank you! <br> Your coaching session has been successfully acknowledged. <br> Coaching ID: ' . $data['coachingID'] .' <br>An email was sent to your account! <br>' . $email
                  );
            }else{
                $error['error_status'] = 1;
                $error['msg'] = 'Invalid email address entry, Please update email address first!';
                            if ($error['error_status'] > 0) {
                echo json_encode($error);
                exit();
              }
            }
         }
         //$get_data = $_POST['data_type'];
         echo json_encode($response,JSON_INVALID_UTF8_IGNORE);
        }

      
       
    }
}