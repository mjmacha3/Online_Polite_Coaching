<?php
/**
 * home class
 */

 class Update_session_notif extends Controller
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
               
                    $data['page_title'] = "Update Coaching Session";
                    $this->view('update_session_notif',$data);
              
            }
        else{
            $data['page_title'] = "Page not found";
          
            $this->view('404',$data);
        }
         
         
        }
    
 }
