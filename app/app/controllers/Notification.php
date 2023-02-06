<?php

Class Notification extends Controller
{
    public function index()

    {
        // $User = $this->load_model('User');
          //$db = Database::getInstance();
          if (isset($_POST['view'])){
            $db = Database::getInstance();
            $cdata['EID']= $_SESSION['user_data'][0]->employee_id;
            $query = "SELECT Supervisor, CoachingDate FROM tblCoachingMaster2 WHERE STATUS='ACTIVE' AND Acknowledge ='NO' AND EID=:EID";
            $data['data'] = $db->read($query,$cdata);
            $data['count'] = is_array($data['data']) || $data['data'] instanceof Countable ? count($data['data']) : 0;
            $data['output']='';
            if (is_array($data['data']))
            {

                 foreach($data['data'] as $key => $object)
                  {
                  $data['output'] .= '<div class="row">
                      <div class="col-md-8">
                      <span><b>'. $object->Supervisor .'</b> has coached you. </span><hr>
                      </div>
                      <div class="col-md-4">
                      <span>'. date('m/d/y', strtotime($object->CoachingDate)) .'</span>
                      </div>
                  </div>';
                  }
                  $data['output']  .=  '<div class="row"> 
                  <div class="col-md-12 text-center">
                  <a href = "'.ROOT.'acknowledge" class="btn btn-primary btn-sm">See All Notification</a>
                  </div>
                </div>'; 
            }
            else
            {
              $data['output']  = '<span>No Notification Found</span>';
            }

            
            echo json_encode($data);
            exit();
            
            }
            
       
        
        
        
        
    }
 
}