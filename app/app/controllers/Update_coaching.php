<?php
/**
 * home class
 */

 class Update_coaching extends Controller
 {

        public function index()
        {

              $User = $this->load_model('User');
              $user_data = $User->check_login();
              //show($data['user_data']);
              if(!is_array($user_data))
              {
                //show($user_data);
               //$data['user_data'] = $user_data;
               header("Location: " . ROOT . "login");
               die;
              }
           
       
       if ($_SESSION['access_type'] != 'Agent' || !isset($_SESSION['access_type']))
       {

         if ($_SERVER['REQUEST_METHOD'] ==='GET')
         {
                //$User = $this->load_model("User");
                $data = $User->display_input_fields();
                $db = Database::newInstance();
                $data1['coachingID']= trim($_GET['coachingID']);
                $query = "SELECT * FROM tblcoachingmaster2 where CoachingID = :coachingID AND STATUS='ACTIVE'";
                $result = $db->read($query,$data1);
                $data['coaching_data'] = $result;
                //$data[''] = $result;
         }
    
         //show($User);
         //show($data['get_department']);
          
         $data['page_title'] = "Update Coaching Session";
         $this->view('update_coaching', $data);

         
       }else{
              $data['page_title'] = "Page Not Found";
         $this->view('404', $data);
       }
        }
    
 }
