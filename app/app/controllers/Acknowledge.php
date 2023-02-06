<?php
/**
 * home class
 */

 class Acknowledge extends Controller
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
       
       
        //$db = Database::getInstance();

           $data['page_title'] = "Acknowledgement | Logs";
           $this->view('acknowledge',$data);
       
         
         
        }
    
 }
