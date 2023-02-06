<?php

class ajax_rootcategory extends Controller
{
    public function index()
    {
        if (!isset($_POST['data_type'])){
            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
        }
        $db = Database::getInstance();

        if($_POST['data_type']=='filterTable')
        {
           
            $result= $db->read("select * from tblCoachingRootCause");
            echo json_encode($result, JSON_INVALID_UTF8_IGNORE);

        }

        if($_POST['data_type'] =='create'){

            
            $data['name'] = trim($_POST['inputName']);
            
            $query = "SELECT TOP 1 * FROM tblCoachingRootCause WHERE RootCause=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Root Cause Category already exist';
                $error['email'] = 'Root Cause Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $query="INSERT INTO tblCoachingRootCause SELECT :name";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Root Cause Catergory save successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in saving Root Cause Category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);

           
        }

        if($_POST['data_type'] =='update'){

            
            $data['name'] = trim($_POST['inputName']);
         
            
            $query = "SELECT TOP 1 * FROM tblCoachingRootCause WHERE RootCause=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Root Cause Category already exist';
                $error['email'] = 'Root Cause Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $data['id'] = trim($_POST['inputID']);
            $query="UPDATE tblCoachingRootCause SET RootCause = :name WHERE RootCauseID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Root Cause Category update successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in updating Root Cause Category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);

           
        }

        if($_POST['data_type']=='delete')
        {
            $data['id'] = trim($_POST['inputID']);
            $query="DELETE FROM tblCoachingRootCause WHERE RootCauseID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Root Cause Catergory delete successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in deleting Root Cause Category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);
        }

       
    }
}