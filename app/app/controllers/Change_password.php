<?php
/**
 * home class
 */

 class Change_password extends Controller
 {

        public function index()
        {
          
          $User = $this->load_model('User');
          $user_data = $User->check_login();
          //show($data['user_data']);
          if(is_array($user_data))
          {
            //show($user_data);
           //$data['user_data'] = $user_data;
           $data['page_title'] = "Change Password";
           $this->view('change_password',$data);
          }
          else
          {
            header("Location: " . ROOT . "login");
            die;
          }

          //show($_SESSION['user']);
         
         
        }
    
 }
