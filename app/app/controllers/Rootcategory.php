<?php
/**
 * home class
 */

 class Rootcategory extends Controller
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
         if ($_SESSION['access_type'] == 'Full')
       {
      
         //show($User);
         //show($data['get_department']);
           $data['page_title'] = "Settings | Root Category List";
           $this->view('rootcategory',$data);
         }else{
            $data['page_title'] = "Page not found";
            $this->view('404',$data);
         }
         
         
         
        }
    
 }
