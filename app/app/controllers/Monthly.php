<?php
/**
 * home class
 */

 class Monthly extends Controller
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

         if ($_SESSION['access_type'] != 'Agent' )
       {

        
        $db = Database::getInstance();
        //VAR_DUMP($query);
        $data['get_year'] = $db->read("select distinct year(CoachingDate) as [Year] from tblCoachingMaster2 order by year(CoachingDate) desc");
 
  
           $data['page_title'] = "Report | Monthly";
           $this->view('monthly',$data);
           //show($data['page_title']);
         }else{
            $data['page_title'] = "Page not found";
            $this->view('404',$data);
         }
         
         
         
        }
    
 }
