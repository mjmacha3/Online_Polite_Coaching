<?php

class ajax_supervisor extends Controller
{
    public function index()
    {
        if (!isset($_POST['data_type'])){
            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
        }
        $db = Database::getInstance();

        if ($_POST['data_type']=='getSupervisorList')
        {
            $result= $db->read("select a.SupId,b.[EMPLOYEE ID NUMBER] as EID,a.Supervisor from tblsupervisors a INNER join tblVKPOEmployee_HRNames b ON a.Supervisor = b.FIRSTNAME +' '+b.LASTNAME
            where b.EmployeeStatus = 'ACTIVE' ORDER BY A.SupId");
            echo json_encode($result, JSON_INVALID_UTF8_IGNORE);
        }
        if($_POST['data_type']=='search_eid'){
            $data['eid']=trim($_POST['employeeID']);
            $query= "SELECT [EMPLOYEE ID NUMBER] as emp_id, FIRSTNAME+' '+LASTNAME as fullname from tblVKPOEmployee_HRNames WHERE [EMPLOYEE ID NUMBER] =:eid and EmployeeStatus ='ACTIVE'";
            $result= $db->read($query,$data);
            echo json_encode($result);
        }


        if($_POST['data_type']=='newSupervisor'){
            $data['name']=$_POST['email'];
            $query= "SELECT top 1 * from tblsupervisors WHERE Supervisor =:name";
            $result= $db->read($query,$data);
            if (is_array($result))
            {
                $error = array('error_status'=>1,
                    'msg'=>'Supervisor already exist',
                    'email'=>'Supervisor already exist'
                );
                if ($error['error_status'] > 0) {
                    echo json_encode($error);
                    exit();
                  }
                
            }
            else
            {
                
                $query = "INSERT INTO tblsupervisors SELECT :name,'0'";
                $result = $db->write($query,$data);
                if ($result == true){

                    $response = array(
                        'status' => 1,
                        'msg' => 'Supervisor save successfully'
                      );
                }
            }

            echo json_encode($response);
        }


        if($_POST['data_type'] == 'deleteSupervisor')
        {

         $data['pcit'] = $_POST['id'];
         $query = "delete from tblsupervisors where SupId=:pcit";
         $result = $db->write($query,$data);
         if ($result == true) {
           $response = array(
             'status' => 1,
             'msg' => 'Supervisor successfully deleted'
           );
         }else{
           $error['error_status'] = 1;
                   $error['msg'] = 'Error in deleting the user';
                   if ($error['error_status'] > 0) {
                     echo json_encode($error);
                     exit();
                   }
                 
         }
         echo json_encode($response);
         exit();
        }
    }
}