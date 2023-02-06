<?php
/**
 * home class
 */

 class Users extends Controller
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
          
        //$User = $this->load_model('User');
         $db = Database::getInstance();
         //VAR_DUMP($query);
         $data['get_year'] = $db->read("select distinct year(CoachingDate) as [Year] from tblCoachingMaster2 order by year(CoachingDate) desc");
         //$data['get_month'] = $db->read("select distinct dateName(MONTH,CoachingDate) as [MonthName],Month(CoachingDate) as [MonthNumber] from tblCoachingMaster2 order by Month(CoachingDate) desc");
            //show($_SESSION['access_type']);
         if ($_SESSION['access_type'] == 'Admin' || $_SESSION['access_type'] == 'Limited')
         {
            $data['get_department'] = $_SESSION['user_data'][0]->Department;
         }else
         {
          $data['get_department'] = $db->read("select distinct Department from tblCoachingMaster2 c where 1=1 and c.[status]='ACTIVE' order by Department");
         }
         //show($User);
         //show($data['get_department']);
           $data['page_title'] = "Settings | Users";
           $this->view('users',$data);
         }else{
            $data['page_title'] = "Page not found";
            $this->view('404',$data);
         }
         
         
         
        }
    
 }
