<?php
/**
 * home class
 */

 class Coaching extends Controller
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
         }
    

         if($_SERVER['REQUEST_METHOD']=="POST")
         {
           
            //show($_POST);
           // $User = $this->load_model("User");
            //$User->display_input_fields();
           // $get_data = $User->mail('mjmacha3@gmail.com','MJ','GG','V21165');
            //saving coaching session
            $User->newCoachingForm($_POST);
        
            $data = $User->display_input_fields();
            $data['page_title'] = "Coaching Session";
           // show($get_data);
            //show($get_data);
       
       

         }
         //show($User);
         //show($data['get_department']);
          
         $data['page_title'] = "Coaching Session";
         $this->view('coaching', $data);

         
       }else{
              $data['page_title'] = "Page Not Found";
         $this->view('404', $data);
       }
        }
    
 }
