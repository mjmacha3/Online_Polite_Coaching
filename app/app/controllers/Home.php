<?php
/**
 * home class
 */

 class Home extends Controller
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
           $data['page_title'] = "Home";
           $this->view('home',$data);
          }
          else
          {
            //var_dump(ROOT);
            header("Location: " . ROOT . "login");
            die;
          //   $data['page_title'] = "Login";
          //  $this->view('login',$data);
          }

          //show($_SESSION['user']);
         
         
        }
    
 }
