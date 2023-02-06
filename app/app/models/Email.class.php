<?php 
/**
 * email models
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require ROOT.'/thirdparty/vendor/autoload.php';

class Email 
{
    
   
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


    public function mail($email,$password,$employeeID)
    {
        //return true;
        
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    //$mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = MAIL_USERNAME;                     //SMTP username
                    $mail->Password   = MAIL_PASSWORD;                               //SMTP password
                    $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom(MAIL_USERNAME, 'VKPO Notification');
                     $mail->addAddress($email, $email);     //Add a recipient
                    // $mail->addAddress('mjmacha3@gmail.comm');               //Name is optional
                    // $mail->addReplyTo('mjmacha3@gmail.com', 'Information');
                    // $mail->addCC('mjmacha3@gmail.com');
                    // $mail->addBCC('mjmacha3@gmail.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Your Polite Coaching password reset request';
                    $line1 = "<br>Dear ". $email . ", <br><br>";
                    $line2 =  "A request has been received to reset the password for your Polite Coaching account. <br><br>";
                    $line3 = "Employee ID: ".$employeeID . "<br>" ;
                    $line4 = "Your new password is: <b>" . $password ."</b>"; 
                    $line5 = "<br><br>Thank you, <br><br>";
                    $line6 = "Visaya Knowledge Process Outsourcing <br><br>";
                    $line7 = "*** This is a system generated message. <b>DO NOT DELETE AND REPLY TO THIS EMAIL.</b>***";
                    $mail->Body    = $line1 . $line2 . $line3 . $line4 . $line5 . $line6 . $line7 ;
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    $_SESSION['mail_errors']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

                    }
                    return false;
        }

        public function signUpMail($email,$employeeID,$otp)
        {
            //return true;
            
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
    
                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = MAIL_USERNAME;                     //SMTP username
                        $mail->Password   = MAIL_PASSWORD;                               //SMTP password
                        $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                        //Recipients
                        $mail->setFrom(MAIL_USERNAME, 'VKPO Notification');
                         $mail->addAddress($email, $email);     //Add a recipient
                        // $mail->addAddress('mjmacha3@gmail.comm');               //Name is optional
                        // $mail->addReplyTo('mjmacha3@gmail.com', 'Information');
                        // $mail->addCC('mjmacha3@gmail.com');
                        // $mail->addBCC('mjmacha3@gmail.com');
    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Polite Coaching Registration';
                        $line1 = "<br>Dear ". $email . ", <br><br>";
                        $line2 =  "To complete your polite coaching registration, please click on the link below: <br>";
                        $line3 =  "<a href=http://52.187.147.244/acknowledgement/thankyou/index.php?employeeID=". $employeeID ."&otp=". $otp .">Click here to validate your account</a><br><br>";
                        $line4 = "Or copy and paste link below to your browser's address bar</br>"; 
                        $line5 =  "http://52.187.147.244/acknowledgement/thankyou/index.php?employeeID=". $employeeID ."&otp=". $otp;
                        $line6 = "<br><br>Thank you, <br><br>";
                        $line7 = "Visaya Knowledge Process Outsourcing <br><br>";
                        $line8 = "*** This is a system generated message. <b>DO NOT DELETE AND REPLY TO THIS EMAIL.</b>***";
                        $mail->Body    = $line1 . $line2 . $line3 . $line4 . $line5 . $line6 . $line7 . $line8;
                        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                        $mail->send();
                        return true;
                    } catch (Exception $e) {
                        $_SESSION['mail_errors']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
                        }
                        return false;
            }


            public function acknowledgeMail($email,$coachingID)
            {
                //return true;
                
                        //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);
        
                        try {
                            //Server settings
                            //$mail->SMTPDebug = 2;                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = MAIL_USERNAME;                     //SMTP username
                            $mail->Password   = MAIL_PASSWORD;                               //SMTP password
                            $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                            //Recipients
                            $mail->setFrom(MAIL_USERNAME, 'VKPO Notification');
                             $mail->addAddress($email, $email);     //Add a recipient
                            // $mail->addAddress('mjmacha3@gmail.comm');               //Name is optional
                            // $mail->addReplyTo('mjmacha3@gmail.com', 'Information');
                            // $mail->addCC('mjmacha3@gmail.com');
                            // $mail->addBCC('mjmacha3@gmail.com');
        
                            //Attachments
                            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Polite Coaching Acknowledgement';
                            $line1 = "<br>Dear ". $email . ", <br><br>";
                            $line2 =  "<b>Thank you for acknowledging your coaching session. <br>";
                            $line3 =  "Coaching ID: ". $coachingID ."<br></b>";
                            $line4 = "<br><br>Thank you, <br><br>";
                            $line5 = "Visaya Knowledge Process Outsourcing <br><br>";
                            $line6 = "*** This is a system generated message. <b>DO NOT DELETE AND REPLY TO THIS EMAIL.</b>***";
                            $mail->Body    = $line1 . $line2 . $line3 . $line4 . $line5 . $line6;
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                            $mail->send();
                            return true;
                        } catch (Exception $e) {
                            $_SESSION['mail_errors']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        
                            }
                            return false;
                }


                public function sendAcknowledge($mailAddress,$name,$coachingID,$data_type)
                {
                    
                            //Create an instance; passing `true` enables exceptions
                            $mail = new PHPMailer(true);
            
                            try {
                                //Server settings
                                //$mail->SMTPDebug = 2;                      //Enable verbose debug output
                                $mail->isSMTP();                                            //Send using SMTP
                                $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = MAIL_USERNAME;                     //SMTP username
                                $mail->Password   = MAIL_PASSWORD;                               //SMTP password
                                $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
                                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                                //Recipients
                                $mail->setFrom(MAIL_USERNAME, 'VKPO Notification');
                                 $mail->addAddress($mailAddress, $name);     //Add a recipient
                                // $mail->addAddress('mjmacha3@gmail.comm');               //Name is optional
                                // $mail->addReplyTo('mjmacha3@gmail.com', 'Information');
                                // $mail->addCC('mjmacha3@gmail.com');
                                // $mail->addBCC('mjmacha3@gmail.com');
            
                                //Attachments
                                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Polite Coaching Session Acknowledgement';
                                $line1 = "<br>Dear ". $name . ", <br><br>";
                                $line2 =  "This is an email confirmation that you have attended coaching and understood <br>";
                                $line3 = "item(s) discussed during the session done earlier today. This further signifies <br>";
                                $line4 ="accountability to follow agreed action plans stated on the POLITE Coaching form. <br><br>";
                                $line5 = "Coaching ID: ".$coachingID ;
                                if ($data_type == 'coachee'){
                                    $line6 = "<h4>PLEASE AKNOWLEDGE TO THIS LINK: http://52.187.147.244/acknowledgement/index.php?CoachingID=".$coachingID."</h4><br><br>";
                                }
                                else{
                                    $line6= "";
                                }
                                $line7 = "<br><br>Thank you, <br><br>";
                                $line8 = "Visaya Knowledge Process Outsourcing <br><br>";
                                $line9 = "*** This is a system generated message. <b>DO NOT DELETE AND REPLY TO THIS EMAIL.</b>***";
                                $mail->Body    = $line1 . $line2 . $line3 . $line4 . $line5 . $line6 . $line7 .$line8 .$line9 ;
                                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                                $mail->send();
                                return true;
                            } catch (Exception $e) {
                                $_SESSION['mail_errors']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            
                                }
                                return false;
                                $_SESSION['mail_errors']=  $_SESSION['mail_errors'];    
            }
                    

  

   
    

}