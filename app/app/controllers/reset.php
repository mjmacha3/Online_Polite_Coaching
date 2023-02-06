<?php

Class reset extends Controller
{
    public function index()
    {
      if(!isset($_POST['data_type'])){

        $data['page_title'] = 'PAGE NOT FOUND';
        $this->view('404',$data);
      }
       if($_POST['data_type'] == 'reset_user')
       {

        // $Email = $this->load_model('Email');
        //           $user_data = $Email->mail();
         //include 'connection.php';
                
                    $email = trim($_POST['email']);
                    // validation
                    $error = array(
                      'error_status' => 0
                    );
                  
                    if (empty($email)) {
                      
                        $error['error_status'] = 1;
                        $error['msg'] = 'Email address cant be empty, Please update email address first!';
                      
                    }
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                      $error['error_status'] = 1;
                      $error['msg'] = 'Invalid email address entry, Please update email address first!';
                    }

                    if ($error['error_status'] > 0) {
                      echo json_encode($error);
                      exit();
                    }
                    $password = $this->get_randstr();
                    $data['password'] = hash('SHA256', $password);
                    $data['eid'] = trim($_POST['eid']);
                    $db = Database::getInstance();
                    $query = "UPDATE tblCoachingLogin SET Password=:password where [EMPLOYEE ID NUMBER]=:eid";
                    $result = $db->write($query,$data);
                    if($result ==true)
                    {
                      $Email = $this->load_model('Email');
                      $user_data = $Email->mail($email,$password,$data['eid']);
                      if($user_data == true) 
                      {
                        $response = array(
                          'status' => 1,
                          'msg' => 'User password successfully reset, new password was sent to ' . $email
                        );
                      }else
                      {
                        $error['error_status'] = 1;
                        $error['msg'] = 'Sorry, password not sent to your email, Please contact your system administrator.';
                        if ($error['error_status'] > 0) {
                          echo json_encode($error);
                          exit();
                        }
                      }

                    }
                    else
                    {
                      $error['error_status'] = 1;
                      $error['msg'] = 'Sorry, something wrong resetting your password';
                      if ($error['error_status'] > 0) {
                        echo json_encode($error);
                        exit();
                      }
                    }
                    

                    echo json_encode($response);
                    exit();
       }
                                        
                                        if($_POST['data_type']=='signup')
                                        {
                                          $db = Database::getInstance();
                                          $password = $_POST['password'];
                                          $data1['eid'] = ucfirst(trim($_POST['employeeID']));
                                          $query = "SELECT TOP 1 * FROM tblCoachingLogin where [EMPLOYEE ID NUMBER]=:eid";
                                          $result = $db->read($query,$data1);

                                          $error = array(
                                            'error_status'=>0
                                          );

                                          if(is_array($result))
                                          {
                                    
                                            $error['error_status'] = 1;
                                            $error['employee'] = 'User is already in use';
                                            $error['msg'] = 'User is already in use, you have account on our system. Contact your system administrator to verify.';
                                            if ($error['error_status'] > 0) {
                                              echo json_encode($error);
                                              exit();
                                            }
                                          }
                                          else
                                          {
                                           
                                            
                                            $data1['email']=trim($_POST['email']);
                                            $query = "SELECT top 1 * FROM tblEmailAddress where EID=:eid and Email_Address=:email";
                                            $result = $db->read($query,$data1);
                                            if (is_array($result))
                                            {

                                              if (strlen($password) < 5) {
                                                $error['error_status'] = 1;
                                                $error['password'] = 'Password must be at least 5 characters!';
                                                $error['msg'] = 'Password must be at least 5 characters!';
                                              }
                                              
                                              if ($error['error_status'] > 0) {
                                                echo json_encode($error);
                                                exit();
                                              }

                                              $data['pword'] = $password;
                                              $data['hash_pass'] = hash('SHA256', $password);
                                              $data['Password'] = hash('SHA256', $password);
                                              $data['eid'] = ucfirst(trim($_POST['employeeID']));
                                              $data['username'] = ucfirst(trim($_POST['employeeID']));
                                              $data['otp'] = $this->get_randstr();
                                              $query="INSERT INTO tblCoachingLogin([EMPLOYEE ID NUMBER],Username, pword, hash_pass, Password,Access,otp) values(:eid,:username,:pword,:hash_pass,:Password,'INACTIVE',:otp)";
                                              $result = $db->write($query,$data);
                                              if($result==true)
                                              {
                                                $response = array(
                                                  'status' => 1,
                                                  'msg' => 'Registration Complete! Thank you. '
                                                );
                                                $Email = $this->load_model('Email');
                                                $user_data = $Email->signUpMail($data1['email'],$data['eid'],$data['otp']);
                                                if ($user_data == true)
                                                {
                                                  $response = array(
                                                    'status' => 1,
                                                    'msg' => 'Your account has been review.'
                                                  );
                                                }
                                              

                                              }else
                                              {
                                                $error['error_status'] = 1;
                                                $error['password'] = 'Error in saving your account!';
                                                $error['msg'] = 'Error in your registration. Contact your system administrator and seek for assistance.';
                                                if ($error['error_status'] > 0) {
                                                  echo json_encode($error);
                                                  exit();
                                                }
                                              }

                                            }else
                                            {
                                              $error['error_status'] = 1;
                                              $error['email'] = 'No email found';
                                              $error['msg'] = 'No email found on our system. Contact your system administrator to verify.';
                                              if ($error['error_status'] > 0) {
                                                echo json_encode($error);
                                                exit();
                                              }
                                            }

                                          }

                                          echo json_encode($response);
                                          exit();
                                        }

                                        if($_POST['data_type'] == 'reset_password')
                                        {
                                 
                                         // $Email = $this->load_model('Email');
                                         //           $user_data = $Email->mail();
                                          //include 'connection.php';
                                                 
                                                     $email = trim($_POST['email']);
                                                     // validation
                                                     $error = array(
                                                       'error_status' => 0
                                                     );
                                                   
                                                     if (empty($email)) {
                                                       
                                                         $error['error_status'] = 1;
                                                         $error['msg'] = 'Email address cant be empty, Please update email address first!';
                                                       
                                                     }
                                                     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                                                     {
                                                       $error['error_status'] = 1;
                                                       $error['msg'] = 'Invalid email address entry, Please update email address first!';
                                                     }
                                 
                                                     if ($error['error_status'] > 0) {
                                                       echo json_encode($error);
                                                       exit();
                                                     }
                                                   
                                                      $data1['eid'] = trim($_POST['employeeID']);
                                                      $data1['email']= $email;
                                                      $db = Database::getInstance();
                                                      $query = "SELECT TOP 1 * FROM vw_CoachingLogin WHERE [EMPLOYEE ID NUMBER]=:eid and Email_Address =:email";
                                                      $result = $db->read($query,$data1);
                                                     if(is_array($result))
                                                     {
                                                      $password = $this->get_randstr();

                                                       $Email = $this->load_model('Email');
                                                       $user_data = $Email->mail($email,$password,$data1['eid']);
                                                       if($user_data == true) 
                                                       {
                                                        $data['password'] = hash('SHA256', $password);
                                                        $data['hash_pass'] = hash('SHA256', $password);
                                                        $data['eid'] = $data1['eid'] ;
                                                        $data['pword'] = $password;

                                                          $query = "UPDATE tblCoachingLogin SET pword=:pword,Password=:password,hash_pass=:hash_pass WHERE [EMPLOYEE ID NUMBER]=:eid";
                                                          $result = $db->write($query,$data);
                                                            if ($result == true) 
                                                            {
                                                          $response = array(
                                                            'status' => 1,
                                                            'msg' => 'User password successfully reset, new password was sent to ' . $email
                                                          );
                                                            }else
                                                          {
                                                            $error['error_status'] = 1;
                                                            $error['msg'] = 'Something wrong, Please contact your system administrator.';
                                                            if ($error['error_status'] > 0) {
                                                              echo json_encode($error);
                                                              exit();
                                                            }
                                                          }
                                                       }else
                                                       {
                                                         $error['error_status'] = 1;
                                                         $error['msg'] = 'Sorry, password not sent to your email, Please contact your system administrator.';
                                                         if ($error['error_status'] > 0) {
                                                           echo json_encode($error);
                                                           exit();
                                                         }
                                                       }
                                 
                                                     }
                                                     else
                                                     {
                                                       $error['error_status'] = 1;
                                                       $error['msg'] = 'Employee ID or Email is invalid';
                                                       $error['email'] = 'Employee ID or Email is invalid';
                                                       if ($error['error_status'] > 0) {
                                                         echo json_encode($error);
                                                         exit();
                                                       }
                                                     }
                                                     
                                 
                                                     echo json_encode($response);
                                                     exit();
                                        }

    }
   public function get_randstr ($len=6, $abc="aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789") {
      $letters = str_split($abc);
      $str = "";
      for ($i=0; $i<=$len; $i++) {
          $str .= $letters[rand(0, count($letters)-1)];
      };
      return $str;
  }
    
}