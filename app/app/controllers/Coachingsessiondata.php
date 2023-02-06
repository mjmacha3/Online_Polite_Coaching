<?php
/**
 * home class
 */

 class Coachingsessiondata extends Controller
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
            if ($_SESSION['access_type'] != 'Agent')
            {
                if (isset($_SESSION['session_data']))
                {
            $data['session_data'] = $_SESSION['session_data'];
            $data['page_title'] = "Coaching Session Data";
            $this->view('coachingsessiondata',$data);
                }else
                {
                    $data['page_title'] = "Coaching Session Data";
                    $this->view('coachingsessiondata',$data);
                }
            }
        else{
            $data['page_title'] = "Page not found";
          
            $this->view('404',$data);
        }
         
         
        }
    
 }
