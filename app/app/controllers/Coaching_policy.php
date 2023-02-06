<?php
/**
 * home class
 */

 class Coaching_policy extends Controller
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
           
       
       if ($_SESSION['access_type'] == 'Full' || !isset($_SESSION['access_type']))
       {
             
          
         $data['page_title'] = "Settings | Coaching Policy";
         $this->view('coaching_policy', $data);

         
       }else{
              $data['page_title'] = "Page Not Found";
         $this->view('404', $data);
       }
        }
    
 }
