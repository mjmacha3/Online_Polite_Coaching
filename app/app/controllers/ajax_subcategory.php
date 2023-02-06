<?php

class ajax_subcategory extends Controller
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
           
            $result= $db->read("select * from tblCoachingSubCategory");
            echo json_encode($result, JSON_INVALID_UTF8_IGNORE);

        }

        if($_POST['data_type'] =='create'){

            
            $data['name'] = trim($_POST['inputName']);
            
            $query = "SELECT TOP 1 * FROM tblCoachingSubCategory WHERE SubCategory=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Sub Category already exist';
                $error['email'] = 'Sub Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $query="INSERT INTO tblCoachingSubCategory SELECT :name";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Sub Catergory save successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in saving Sub category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);

           
        }

        if($_POST['data_type'] =='update'){

            
            $data['name'] = trim($_POST['inputName']);
         
            
            $query = "SELECT TOP 1 * FROM tblCoachingSubCategory WHERE SubCategory=:name";
            $result= $db->read($query,$data);
            if (is_array($result)){
                $error['error_status'] = 1;
                $error['msg'] = 'Sub Category already exist';
                $error['email'] = 'Sub Category already exist';
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
            }
            $data['id'] = trim($_POST['inputID']);
            $query="UPDATE tblCoachingSubCategory SET SubCategory = :name WHERE ID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Sub Catergory update successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in updating sub category';
    
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
            $query="DELETE FROM tblCoachingSubCategory WHERE ID=:id";
            $result= $db->write($query,$data);

            if($result == true){
                $response = array(
                  'status' =>1,
                  'msg' => 'Sub Catergory delete successfully'
                );
              }else
              {  
                $error['error_status'] = 1;
                $error['msg'] = 'Error in deleting sub category';
    
                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
    
              }
              echo json_encode($response);
        }

       
    }
}