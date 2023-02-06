<?php
/**
 * Notification class 
 */

Class Notification 
{
   public function get_notif_count()
   {
    $db = Database::newInstance();
    $cdata['EID']= $_SESSION['user_data'][0]->employee_id;
    $query = "SELECT Supervisor, CoachingDate FROM tblCoachingMaster2 WHERE STATUS='ACTIVE' AND Acknowledge ='NO' AND EID=:EID";
    $data['data'] = $db->read($query,$cdata);
    $data['count'] = is_array($data['data']) || $data['data'] instanceof Countable ? count($data['data']) : 0;
    return $data;
   }
}