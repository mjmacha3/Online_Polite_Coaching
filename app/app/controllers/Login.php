<?php
/**
 * home class
 */

 class Login extends Controller
 {

        public function index()
        {
          $data['page_title'] = "Login";
          if($_SERVER['REQUEST_METHOD']=="POST")
          {
            
            $User = $this->load_model("User");
            $User->login($_POST);


          }
          
          $this->view('login',$data);
        }
    
 }