<?php 

/**
 * database class
 */




 //hard function
 class Database
 {
       public static $con;

       public function __construct()
       {
              try
              {
                     $str = DBDRIVER . ":Server=" . DBHOST . ";Database=" . DBNAME;
                     self::$con = new PDO($str,DBUSER,DBPASS);
              }
              catch (PDOException $e)
              {
                     die($e->getMessage());
              }      
       }

       public static function getInstance()
       {
             if(self::$con)
             {
                    return self::$con;
             }
             return $instance = new self();
    
       }   
       public static function newInstance()
       {
            
             return $instance = new self();
    
       }   
        
       //read to database
       public function read($query, $data = array())
       {
              $stm = self::$con->prepare($query);
              $result = $stm->execute($data);

              if($result)
              {
              $data = $stm->fetchAll(PDO::FETCH_OBJ);
              if(is_array($data) && count($data) > 0 )
              {
                     return $data;
              }
              return false;
              }
       } 
         //write to database
       public function write($query, $data = array())
       {
              $stm = self::$con->prepare($query);
              $result = $stm->execute($data);

              if($result)
              {
              return true;
              }
              return false;
       } 

 }

 // class Database
//  {
//         private function connect()
//         {
//               $str = DBDRIVER.":Server=".DBHOST.";Database=".DBNAME;
//               $con = new PDO($str,DBUSER,DBPASS);
//              return $con;
//         }
       
     
//         public function query($query, $data = [], $type = 'object')
//         {
//               $con = $this->connect();

//              $stmt = $con->prepare($query);
//               if ($stmt)
//               {
//                      $check =  $stmt->execute($data);
//                      if($check)
//                      {      
                           
//                             if($type == 'object')
//                             {
//                                    $type = PDO::FETCH_OBJ; 
//                             }
//                             else
//                             {
//                                    $type = PDO::FETCH_ASSOC;
//                             }
//                             //show($type);
//                             $result = $stmt->fetchAll($type);

//                                    if (is_array($result) && count($result) > 0 )
//                                    {
//                                           return $result;
//                                    }
//                      }
                    
//               } 
//               return false;
//         }
//  }
//  $db = Database::getInstance();
//  $data = $db->write("Insert into tblCoachingMaster2 (EID, Name, Department, Designation, CoachingCategory, RootCauseCategory, CoachingDate, Supervisor, FUCoachingDate, ItemDiscussion, RootCause, Effect, 
//  EmployeeActionPlan, SupervisorActionPlan, EffectiveDateEAP, EffectiveDateSAP, CoachedBy, NotedBy, Coachee,Updatedate,LastUpdateBy,[Status],ScanId, Site, CoachingDate2, startdate, subcategory)  
//  values('V17492', 'Glenda Margatinez' ,'LCD' , 'Organizational Development Training Lead', 'Behavioral Assessment' , 'Process', '01/12/2023', 'William Hubahib' ,
//  '01/12/2023' , '123' , '123' , '12' , '12', '12' , '01/12/2023', '01/12/2023' , 'Mac Jonner Macha', 'Joseph Hernandez', 'Glenda Margatinez' ,'2023-01-11 20:49:01' , 'Mac Jonner Macha','ACTIVE', '',
//   'DUMAGUETE', '2023-01-11 20:49:01', '09/08/2017', 'COD')");
// show($data);

