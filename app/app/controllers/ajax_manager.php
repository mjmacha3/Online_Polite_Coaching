<?php

class ajax_manager extends Controller
{
    public function index()
    {
        if (!isset($_POST['data_type'])){
            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
        }
        $db = Database::getInstance();

        if($_POST['data_type']=='users_data')
        {
             $data['eid']=trim($_POST['id']);
              $data['fname']=trim($_POST['id']);
              $data['lname']=trim($_POST['id']);
             $query= "select a.id,a.eid,b.FIRSTNAME +' '+b.LASTNAME as fullname, eid_sup,manager_name,sup_desc from vw_coachingSupervisor a left outer join tblVKPOEmployee_HRNames b ON a.eid = b.[EMPLOYEE ID NUMBER] where b.EmployeeStatus = 'ACTIVE' and
             (a.eid =:eid or b.FIRSTNAME=:fname or b.LASTNAME=:lname)";
             $result= $db->read($query,$data);
             
            echo json_encode($result);
        }

        if($_POST['data_type'] == 'delete_supervisor')
        {

         $data['id'] = $_POST['id'];
         $query = "delete from tblVKPOEmployee_HR_Supervisor where id=:id";
         $result = $db->write($query,$data);
         if ($result == true) {
           $response = array(
             'status' => 1,
             'msg' => 'User supervisor successfully deleted'
           );
         }else{
           $error['error_status'] = 1;
                   $error['msg'] = 'Error in deleting the user supervisor';
                   if ($error['error_status'] > 0) {
                     echo json_encode($error);
                     exit();
                   }
                 
         }
         echo json_encode($response);
         exit();
        }

        if($_POST['data_type']=='getDesc')
        {
            $output = '<option value="" selected disabled>Choose one</option>';
            $data= $db->read("select distinct sup_desc from tblVKPOEmployee_HR_Supervisor");

            foreach($data as $key => $object){
                $output .= '<option value="'. $object->sup_desc .'">'.$object->sup_desc.'</option>';
              }
            echo json_encode($output);
            exit();
        }

        if($_POST['data_type']=='getSupervisor')
        {
            $output =  '<option value="" selected disabled>Choose one</option>';
            $data= $db->read("select b.[EMPLOYEE ID NUMBER] as emp_id,a.Supervisor from tblSupervisors a inner join tblVKPOEmployee_HRNames b ON a.Supervisor = b.FIRSTNAME+' '+b.LASTNAME where b.EmployeeStatus = 'ACTIVE' and 1=1 order by a.Supervisor");
            foreach($data as $key => $object){
                $output .= '<option value="'. $object->emp_id .'">'.$object->Supervisor.'</option>';
              }
            echo json_encode($output);
            exit();
        }

        if($_POST['data_type'] == 'create')
        {
          $data['eid'] = ucfirst(trim($_POST['employeeID']));
          $data['sup_desc'] = trim($_POST['newDesc']);
          $query = "SELECT top 1 * FROM tblVKPOEmployee_HR_Supervisor WHERE eid=:eid and sup_desc =:sup_desc";
          $result = $db->read($query,$data);
          if (is_array($result)){
            $error['error_status'] = 1;
            $error['msg'] =  $data['sup_desc'] . ' already added to this user';
            $error['email'] =  $data['sup_desc'] . ' already added to this user';
            if ($error['error_status'] > 0) {
              echo json_encode($error);
              exit();
            }
          }
          
          $data['seid'] = trim($_POST['sEid']);
          $query="INSERT INTO tblVKPOEmployee_HR_Supervisor SELECT :eid,:seid,:sup_desc";
          $result = $db->write($query,$data);
          if ($result ==true){
          $response = array(
              'status' =>1,
              'msg' => 'User supervisor successfully added'
            );
          }else{
            $error['error_status'] = 1;
            $error['msg'] = 'Error in saving user supervisor';
            if ($error['error_status'] > 0) {
              echo json_encode($error);
              exit();
            }
          }

      
          echo json_encode($response);
          exit();
        }


        if($_POST['data_type']=='update')
        {
          $data['eid'] = trim($_POST['employeeID']);
          $data['desc'] = trim($_POST['desc']);
          $data['eid_sup']= trim($_POST['seid']);
          $query= "UPDATE tblVKPOEmployee_HR_Supervisor set eid_sup =:eid_sup where eid=:eid and sup_desc=:desc";
          $result= $db->write($query, $data);
          if($result == true){
            $response = array(
              'status' =>1,
              'msg' => 'User supervisor update successfully'
            );
          }else
          {  
            $error['error_status'] = 1;
            $error['msg'] = 'Error in updating user supervisor';

            if ($error['error_status'] > 0) {
              echo json_encode($error);
              exit();
            }

          }
          echo json_encode($response);
        }



    }
}