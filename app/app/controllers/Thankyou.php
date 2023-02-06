<?php
/**
 * home class
 */

 class Thankyou extends Controller
 {

        public function index()
        {
          
          //$User = $this->load_model('User');
        //   $user_data = $User->check_login();
        //   //show($data['user_data']);
        //   if(is_array($user_data))
        //   {
            //show($user_data);
           //$data['user_data'] = $user_data;
           $data['page_title'] = "Thank you";
          
           $this->view('thankyou',$data);
           //show($data);
   

          //show($_SESSION['user']);
         
         
        }
    
 }
