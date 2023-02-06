<?php

Class Ajax
{
    public function index()

    {
      if(!isset($_POST['data_type'])){
        echo "Page Not Found!";
        exit();
      }
         //$User = $this->load_model('User');
          $db = Database::getInstance();
          if ($_POST['data_type']=='fetch_data')
          {
        
           //     //show($_POST['date_year']);
                $data['date_year'] = $_POST['date_year'];
               //$date_year_str = ' and Year(CoachingDate)';
                $data['date_month'] = $_POST['date_month'];
                
                //$data['date_month_str'] = ' and Month(CoachingDate) =:date_month';
                
                
                
                $data['get_name_id'] = $_POST['get_name_id'];
                
                if ($_SESSION['access_type']=='Full' || $_SESSION['access_type']=='Super Admin')
                {
                  $data['get_department'] = '%'.trim($_POST['get_department']) .'%';
                  $query = "SELECT CoachingDate, Name, startDate, Department, Designation, Supervisor, CoachingCategory, subcategory,
                  RootCauseCategory,FUCoachingDate, ItemDiscussion, RootCause,Effect, EmployeeActionPlan, SupervisorActionPlan, 
                   EffectiveDateEAP, EffectiveDateSAP,CoachedBy,ScanId, Site, CoachingNo, coachee_email,coach_email,Acknowledge_date,coachingID
                  from tblCoachingMaster2 
                  WHERE status = 'ACTIVE' and Year(CoachingDate)=:date_year and Month(CoachingDate)=:date_month and Department like :get_department and [Name] LIKE :get_name_id  ORDER BY coachingdate DESC";
               
                }elseif($_SESSION['access_type']=='Admin')
                {
                  $data['get_department'] = '%' . trim($_POST['get_department']);
                  //$data['coach'] = trim($_SESSION['user_data'][0]->fullname);
                  
                  $query = "SELECT CoachingDate, Name, startDate, Department, Designation, Supervisor, CoachingCategory, subcategory,
                  RootCauseCategory,FUCoachingDate, ItemDiscussion, RootCause,Effect, EmployeeActionPlan, SupervisorActionPlan, 
                   EffectiveDateEAP, EffectiveDateSAP,CoachedBy,ScanId, Site, CoachingNo, coachee_email,coach_email,Acknowledge_date,coachingID
                  from tblCoachingMaster2 
                  WHERE status = 'ACTIVE' and Year(CoachingDate)=:date_year and Month(CoachingDate)=:date_month and Department like :get_department and [Name] LIKE :get_name_id  ORDER BY coachingdate DESC";
               
                }
                else
                {
                  $data['get_department'] = trim($_POST['get_department']);
                  $data['coach'] = trim($_SESSION['user_data'][0]->fullname);
                  
                  $query = "SELECT CoachingDate, Name, startDate, Department, Designation, Supervisor, CoachingCategory, subcategory,
                  RootCauseCategory,FUCoachingDate, ItemDiscussion, RootCause,Effect, EmployeeActionPlan, SupervisorActionPlan, 
                   EffectiveDateEAP, EffectiveDateSAP,CoachedBy,ScanId, Site, CoachingNo, coachee_email,coach_email,Acknowledge_date,coachingID
                  from tblCoachingMaster2 
                  WHERE status = 'ACTIVE' and CoachedBy=:coach and Year(CoachingDate)=:date_year and Month(CoachingDate)=:date_month and Department = :get_department and [Name] LIKE :get_name_id  ORDER BY coachingdate DESC";
               
                }           
                $get_data = $db->read($query,$data);
               //$get_data = $_POST['data_type'];
               echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                //var_dump($data);
               
              }
               if($_POST['data_type']=='update_data')
               {
                $data['Name'] = $_SESSION['user_data'][0]->fullname;
                $data['coachingID'] =$_POST['coachingID'];
                $get_data = $db->write("UPDATE tblCoachingMaster2 set status = 'INACTIVE', LastUpdateBy =:Name , Updatedate=getdate() where coachingID =:coachingID",$data);
                //$get_data = $_POST['data_type'];
                echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
               }
               if($_POST['data_type']=='view_data')
               {
               
                $data['coachingID'] = $_POST['coachingID'];
                $get_data = $db->read("SELECT CoachingID as [Coaching ID],EID as [Employee ID],Name, format(CoachingDate,'d','us') as [Coaching Date],
                CoachingCategory as [Coaching Category],SubCategory as [Sub Category],RootCauseCategory as [Root Cause Category],
                ItemDiscussion as Discussion, Effect, RootCause as [Root Cause],EmployeeActionPlan as [Employee Action Plan], format(EffectiveDateEAP,'d','us') as [Employee/Effectivity Date],
                SupervisorActionPlan as [Supervisor Action Plan], format(EffectiveDateSAP,'d','us') as [Supervisor/Effectivity Date],format(FUCoachingDate,'d','us') as [Follow-up Coaching Date],
                Department, Designation,Site, Supervisor, ScanId as [Scan ID], CoachedBy as [Coached By], NotedBy as [Noted By], Coachee, format(startdate,'d','us') as [Date Hire],
                coach_email as [Coached Email Address], coachee_email as [Coachee Email Address], Acknowledge as [Acknowledge Status]
                FROM tblCoachingMaster2 WHERE coachingID=:coachingID",$data);

                // $dateString = $get_data['Coaching Date']; 
                // $get_data = DateTime::createFromFormat('Y-m-d', $dateString);

                  
                //$get_data = $_POST['data_type'];
                echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
               }

               if($_POST['data_type']=='acknowledge_data')
               {
                //$data['Name'] = $_SESSION['user_data'][0]->fullname;
                $data['coachingID'] = $_POST['coachingID'];
                $data['date'] = date('Y-m-d');
                $get_data = $db->write("UPDATE tblCoachingMaster2 set Acknowledge = 'YES',Acknowledge_date=:date where coachingID =:coachingID",$data);
                
                //$get_data = $_POST['data_type'];
                echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
               }


               if($_POST['data_type']=='changePassword'){

                    //include 'connection.php';
                
                    // $oldPassword = $_POST['oldPassword'];
                    // $password = $_POST['password'];
                    // $cPassword = $_POST['cPassword'];
                    $oldPassword= $_POST['old_pass'];
                    $password = $_POST['new_pass'];
                    $cPassword = $_POST['retype_new'];
                    $data['emp_id'] = $_SESSION['user_data'][0]->employee_id;
                    // validation
                    $error = array(
                      'error_status' => 0
                    );
                  
                    if (!empty( $password )) {
                      if (strlen( $password ) < 5) {
                        $error['error_status'] = 1;
                        $error['password'] = 'Password must be at least 5 characters!';
                      }
                    }
             
                    if (!empty($password) && !empty($cPassword)) {
                      if ($password != $cPassword) {
                        $error['error_status'] = 1;
                        $error['cPassword'] = 'Password and Confirm Password are not the same';
                      }
                    }
                    if ($password == $cPassword) {
                        if ($password == $oldPassword){
                          $error['error_status'] = 1;
                      $error['password'] = 'Sorry! You Entered An Old Password';
                        }
                      
                    }
                    if ($error['error_status'] > 0) {
                      echo json_encode($error);
                      exit();
                    }
                    //hash('SHA256', $data['password'])
                    //if validation is successful
                    // $email = $_SESSION['user_data']['email'];
                
                    // $hashed_password = md5($oldPassword);
                    // $new_hashed_password = md5($password);
                    //$qry = "Select * from users where email = '" . $email . "' and password = '" . $hashed_password . "'";
                    $data['password'] = hash('SHA256', $oldPassword);
                    $query= "SELECT * FROM tblCoachingLogin where [EMPLOYEE ID NUMBER]=:emp_id and Password=:password";
                    $result = $db->read($query,$data);

                    if (is_array($result))
                    {
                      // $data = array();
                      // data['password'] = 
                      $data['password'] = hash('SHA256', $password);
                        $query = "UPDATE tblCoachingLogin SET Password=:password where [EMPLOYEE ID NUMBER]=:emp_id";
                        $result = $db->write($query,$data);
                        if ($result==true){
                          $response = array(
                                  'status' => 1,
                                  'msg' => 'Password changed successfully'
                                );
                        }else{
                          $response = array(
                                  'status' => 0,
                                  'msg' => 'Changing password failed!'
                                );
                        }
                      //$result = true;
                    }else {
                        $error['error_status'] = 1;
                        $error['oldPassword'] = 'Invalid old password';
                        if ($error['error_status'] > 0) {
                          echo json_encode($error);
                          exit();
                        }
                      }

                    // $result = $conn->query($qry);
                    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                    //$count = mysqli_num_rows($result);
                    // if ($count == 1) {
                    //   // user exists we will update the password
                    //  // $qry = "Update users set password = '" . $new_hashed_password . "' Where email = '" . $email . "'";
                    //  // $result = $conn->query($qry);
                    //   if ($result) {
                    //     // destroy the user session
                    //     //session_destroy();
                    //     $response = array(
                    //       'status' => 1,
                    //       'msg' => 'password changed successfully successful'
                    //     );
                    //   } else {
                    //     $response = array(
                    //       'status' => 0,
                    //       'msg' => 'Changing password failed!'
                    //     );
                    //   }
                    // } else {
                    //   $error['error_status'] = 1;
                    //   $error['oldPassword'] = 'Invalid Old Password';
                    //   if ($error['error_status'] > 0) {
                    //     echo json_encode($error);
                    //     exit();
                    //   }
                    // }
                    echo json_encode($response);
                    exit();
                  
              

                //echo json_encode($_POST,JSON_INVALID_UTF8_IGNORE);

               }

               if ($_POST['data_type'] == 'changeCoachingPolicy')
               {
                $error = array(
                  'error_status'=>0
                );


                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }

                $allowTypes= array('pdf','doc','docx','xls','xlsx');
                $uploadedFile= '';
                $uploadDir =  "../../assets/pdf/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $data['id'] = $_POST['id'];
                $data['filename'] = $fileName;
                if (in_array($fileType, $allowTypes)){
                      if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                      {
                        $uploadedFile = $targetFilePath;
                        $query = "UPDATE tblCoachingPolicy SET file_name=:filename where id=:id";
                        $result = $db->write($query,$data);
                        
                        if ($result==true)
                        {
                          $response = array(
                            'status' => 1,
                            'msg' => $fileName .' file changed successfully, logout your account to see changes.',
                            'file_name' => $fileName
                          ); 
                        } else
                        {
                          $response = array(
                            'status' => 0,
                            'msg' => 'Error in uploading your file.'
                          ); 
                        }
                      }
                }else
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Error in uploading your file.';
                  if ($error['error_status'] > 0) {
                    echo json_encode($error);
                    exit();
                  }
                }
                echo json_encode($response);
                exit();
               }




               if ($_POST['data_type'] == 'updateUser')
               {
                //$data['email'] = trim($_POST['email']);
                $data['access_type'] = trim($_POST['access_type']);
                $data['employeeID'] = trim($_POST['employeeID']);

                $error = array(
                  'error_status'=>0
                );
                
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Invalid email address';
                  $error['email'] = 'Invalid email address';
                }

                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
                $query= "update tblcoachinglogin set Access=:access_type where [EMPLOYEE ID NUMBER]=:employeeID";
                $result = $db->write($query,$data);
                if ($result==true){
                  $data1['email'] = trim($_POST['email']);
                  $data1['employeeID'] = trim($_POST['employeeID']);
                        $query = "update tblEmailAddress set Email_Address=:email where eid =:employeeID ";
                        $result = $db->write($query,$data1);
                        if($result==true){
                          $response = array(
                            'status' => 1,
                            'msg' => 'User successfully updated'
                          );
                        }else{
                          $error['error_status'] = 1;
                          $error['msg'] = 'Error in updating the user';
                          if ($error['error_status'] > 0) {
                            echo json_encode($error);
                            exit();
                          }
                        }
                 
                }
                else
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Sorry, something wrong';
                 
                }

                echo json_encode($response);
                exit();
               }

               if($_POST['data_type'] == 'delete_user')
               {

                $data['pcit'] = $_POST['pcit'];
                $query = "delete from tblcoachinglogin where PCIT=:pcit";
                $result = $db->write($query,$data);
                if ($result == true) {
                  $response = array(
                    'status' => 1,
                    'msg' => 'User successfully deleted'
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



               if ($_POST['data_type'] == 'updateUserEmail')
               {
                //$data['email'] = trim($_POST['email']);
                //$data['access_type'] = trim($_POST['access_type']);
                $data['eid'] = trim($_POST['employeeID']);
                $data['email'] = trim($_POST['email']);

                $error = array(
                  'error_status'=>0
                );
                
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Invalid email address';
                  $error['email'] = 'Invalid email address';
                }

                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }

                $query = "update tblEmailAddress set Email_Address=:email where EID=:eid";
                $result = $db->write($query,$data);
              
                if ($result==true){
                  $response = array(
                    'status' => 1,
                    'msg' => 'User successfully updated'
                  );
                }
                else
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Sorry, something wrong';
                 
                }

                echo json_encode($response);
                exit();
               }


               
               if($_POST['data_type'] == 'delete_user_mail')
               {

                $data['eid'] = $_POST['eid'];
                $query = "delete from tblEmailAddress where EID=:eid";
                $result = $db->write($query,$data);
                if ($result == true) {
                  $response = array(
                    'status' => 1,
                    'msg' => 'User email successfully deleted'
                  );
                }else{
                  $error['error_status'] = 1;
                          $error['msg'] = 'Error in deleting the user email';
                          if ($error['error_status'] > 0) {
                            echo json_encode($error);
                            exit();
                          }
                        
                }
                echo json_encode($response);
                exit();
               }

               if ($_POST['data_type'] == 'newUserEmail')
               {
                //$data['email'] = trim($_POST['email']);
                //$data['access_type'] = trim($_POST['access_type']);
                $data['eid'] = ucfirst(trim($_POST['employeeID']));
                $email= trim($_POST['email']);

                $error = array(
                  'error_status'=>0
                );
                
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                  $error['error_status'] = 1;
                  $error['msg'] = 'Invalid email address';
                  $error['email'] = 'Invalid email address';
                }

                if ($error['error_status'] > 0) {
                  echo json_encode($error);
                  exit();
                }
                
                $query = "SELECT * from tblVKPOEmployee_HRNames WHERE [EMPLOYEE ID NUMBER]=:eid and EmployeeStatus ='ACTIVE'";
                $result = $db->read($query,$data);
                if (is_array($result)){
                  $query = "select top 1 * from tblEmailAddress where EID=:eid";
                  $result = $db->read($query, $data);
                
                  if (is_array($result)){
  
                            $error['error_status'] = 1;
                            $error['employee'] = 'Employee ID is in use';
                            $error['msg'] = 'This user is in use';
                            if ($error['error_status'] > 0) {
                              echo json_encode($error);
                              exit();
                            }
                  }
                  else
                  {
                    $data['email'] = trim($_POST['email']);
                    $query = "INSERT INTO tblEmailAddress SELECT :eid, :email";
                    $result = $db->write($query,$data);
                      if($result ==true)
                      {
                      $response = array(
                        'status' => 1,
                        'msg' => 'User email save successfully'
                      );
                    }
                    
                  }
                }else
                {
                  $error['error_status'] = 1;
                  $error['employee'] = 'Employee ID is invalid or inactive in hr list';
                  $error['msg'] = 'This employee either invalid or inactive, Please enter a valid employee id';
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