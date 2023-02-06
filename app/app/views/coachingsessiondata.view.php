<style>
  .alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-success h4
{
    color: #3C763D;
}
.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #d9534f;
}
.alert-message-danger h4
{
    color: #d9534f;
}
.alert-message-warning
{
    background-color: #fcf8f2;
    border-color: #f0ad4e;
}
.alert-message-warning h4
{
    color: #f0ad4e;
}
.alert-message-info
{
    background-color: #f4f8fa;
    border-color: #5bc0de;
}
.alert-message-info h4
{
    color: #5bc0de;
}
.alert-message-default
{
    background-color: #EEE;
    border-color: #B4B4B4;
}
.alert-message-default h4
{
    color: #000;
}
.alert-message-notice
{
    background-color: #FCFCDD;
    border-color: #BDBD89;
}
.alert-message-notice h4
{
    color: #444;
}
</style>
</head>
<body>
<?php $this->view('includes/header',$data)?>


<?php $this->view('includes/sidebar',$data)?> 
<div class="wrapper ">
<div class="main-panel" >
<?php $this->view('includes/nav',$data)?> 
<div class="panel-header panel-header-sm"  style="height: 70px;padding:0">
</div>
            <div class="content mt-2">
                     
                        <?php if(isset($_SESSION['session_data'])): ?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert-message alert-message-success">
                                <h4>
                                <i class="fa fa-check-circle" aria-hidden="true"></i></i> Well done!</h4>
                                <p>Your coaching session has been saved successfully.</p>
                                  <p>Coaching ID: <?= $data['session_data'][0]->CoachingID ?></p>
                                  <p>Name: <?= $data['session_data'][0]->Name ?></p>
                                  <p>Coaching Date: <?= $data['session_data'][0]->CoachingDate2 ?></p>
                            </div>
                          </div>
                        </div>
                        <?php else: ?>
                          <div class="row">
                          <div class="col-md-12">
                          <p>No records found!</p>
                            
                          </div>
                        </div>
                        <?php endif; ?>
                     

                        
                          <?php if(isset($data['session_data'])): ?>
                            <?php if($_SESSION['coachedMail']==1): ?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert-message alert-message-success">
                                <h4>
                                <i class="fa fa-check-circle" aria-hidden="true"></i></i> Check inbox!</h4>
                                <p>Coach, your coaching session has been sent to your mail. </p>
                                <p>Email: <?= $data['session_data'][0]->coach_email ?></p>
                            </div>
                          </div>
                        </div>
                        <?php else:?>
                          <div class="row">
                          <div class="col-md-12">
                            <div class="alert-message alert-message-danger">
                              <h4>
                              <i class="fa fa-times-circle-o" aria-hidden="true"></i> Oh snap!</h4>
                              <p>Send error, please check the email address. </p>
                              <p>Email: <?= $data['session_data'][0]->coach_email ?></p>
                            </div>
                          </div>
                        </div>
                            <?php endif; ?>
                            <?php else: ?>
                          <div class="row">
                          <div class="col-md-12">
                          <p>No records found!</p>
                            
                          </div>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($data['session_data'])): ?>
                        <?php if($_SESSION['coacheeMail']==1): ?>
                          
                        <div class="row">
                          <div class="col-md-12">
                            <div class="alert-message alert-message-success">
                                <h4>
                                <i class="fa fa-check-circle" aria-hidden="true"></i></i> Check inbox!</h4>
                                <p>Coachee, your coaching session has been sent to your mail. </p>
                                <p>Email: <?= $data['session_data'][0]->coachee_email ?></p>
                            </div>
                          </div>
                        </div>
                        <?php else:?>
                          <div class="row">
                          <div class="col-md-12">
                            <div class="alert-message alert-message-danger">
                              <h4>
                              <i class="fa fa-times-circle-o" aria-hidden="true"></i> Oh snap!</h4>
                              <p>Send error, please check the email address. </p>
                              <p>Email: <?= $data['session_data'][0]->coachee_email ?></p>
                            </div>
                          </div>
                        </div>
                            <?php endif; ?>
                            <?php else: ?>
                          <div class="row">
                          <div class="col-md-12">
                          <p>No records found!</p>
                          </div>
                        </div>
                        <?php endif; ?>
                        
                        
                     
                    
                                    
                        
                      
            </div>

</div>

  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>
  </body>
</html>

