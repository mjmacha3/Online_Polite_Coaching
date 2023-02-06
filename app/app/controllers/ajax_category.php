<?php

class ajax_category extends Controller
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
           
            $result= $db->read("select * from tblCoachingCategory");
            echo json_encode($result, JSON_INVALID_UTF8_IGNORE);

        }

        if($_POST['data_type'] =='create'){

            
            $data['name'] = trim($_POST['inputName']);
            
            $query = "SELECT TOP 1 * FROM tblCoachingCategory WHERE Category=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Category already exist';
                $error['email'] = 'Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $query="INSERT INTO tblCoachingCategory SELECT :name";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Catergory save successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in saving category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);

           
        }

        if($_POST['data_type'] =='update'){

            
            $data['name'] = trim($_POST['inputName']);
         
            
            $query = "SELECT TOP 1 * FROM tblCoachingCategory WHERE Category=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Category already exist';
                $error['email'] = 'Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $data['id'] = trim($_POST['inputID']);
            $query="UPDATE tblCoachingCategory SET Category = :name WHERE CatID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Catergory update successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in updating category';
    
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
            $query="DELETE FROM tblCoachingCategory WHERE CatID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Catergory delete successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in deleing category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);
        }

       
    }
}