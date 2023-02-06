<?php $this->view('includes/header',$data)?>

</head>
<body>
<?php $this->view('includes/sidebar',$data)?> 
<div class="wrapper ">
<div class="main-panel" >
<?php $this->view('includes/nav',$data)?> 
<div class="panel-header panel-header-sm"  style="height: 70px;padding:0">
</div>
                                                <div class="content mt-2">
                                                        <div class="row">
                                                          <div class="col-md-8">
                                                            <div class="card">
                                                              <div class="card-header">
                                                                <h5 class="title text-center">New Coaching Session</h5>
                                                              </div>
                                                              <div class="card-body">
                                                                <form  class="form"  method = "POST" id = "coachingFormSubmit">
                                                                    <div class="row">
                                                                    <div class="col-md-12"><span>
                                                                     <span><h6 style="color:red"><?php check_error(); ?></h6> </span> 
                                                                    </div>
                                                                    </div>
                                                                     <div class="row">
                                                                      <div class="col-md-4"></div>
                                                                      <div class="col-md-8">
                                                                            <label>Search</label>
                                                                           <select class="selectpicker cmb_emp_id" data-style="btn btn-primary btn-round" title="Single Select" data-size="15" data-live-search="true" >  
                                                                            <option disabled selected value=""> Pick a name </option>
                                                                            <?php if(is_array($data['get_data'])): ?>
                                                                              <?php foreach($data['get_data'] as $key => $object):  ?>
                                                                                <option value="<?=$object->emp_id?>"><?=$object->Name?></option>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                            </select>
                                                                      </div>
                                                                     
                                                                  </div>
                                                                  <div class="row">
                                                                     <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text"   name = "fullname" id="fullname" class="form-control "  value = "<?= set_value('fullname') ?>" readonly>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Employee ID</label>
                                                                        <input type="text"   name = "employeeID" id="txtemployeeID" class="form-control "  value = "<?= set_value('employeeID') ?>"  readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Direct Supervisor</label>
                                                                        <input type="text" id="txtSupervisor" class="form-control" value = "<?= set_value('supervisor') ?>" name = "supervisor" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Designation</label>
                                                                        <input type="text" id="txtDesignation" class="form-control"  name = "designation" value = "<?= set_value('designation') ?>" readonly>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-4">
                                                                              <div class="form-group">
                                                                                <label class="label-control">Coaching Date</label>
                                                                                <div class="input-group mb-3" >
                                                                                  <div class="input-group-prepend">
                                                                                    <div class="input-group-text" >
                                                                                    <i class="now-ui-icons  ui-1_calendar-60"></i>
                                                                                    </div>
                                                                                  </div>
                                                                                    <input type="text" name="dtCoachingDate" id="dtCoachingDate" class="form-control datepicker" placeholder = "MM/DD/YYYY" required>
                                                                                </div>
                                                                              </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                    <div class="form-group">
                                                                      <label for="exampleFormControlSelect1">Scan ID</label>
                                                                      <input type="text" name="scanID"  value = "<?= set_value('scanID') ?>" id="txtScanID" class="form-control"  >
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Coaching Category</label>
                                                                              <select class="form-control" id="coachingCategory" name = "coachingCategory" required>
                                                                              <option disabled selected value="">Choose one</option>
                                                                              <?php if(is_array($data['get_category'])): ?>
                                                                                <?php foreach($data['get_category'] as $key => $object):  ?>
                                                                                  <option value="<?=$object->Category?>"><?=$object->Category?></option>
                                                                                  <?php endforeach; ?>
                                                                              <?php endif; ?>
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                
                                                                  <div class="row">
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Department</label>
                                                                        <input type="text" name = "department" id="txtDepartment" class="form-control" value = "<?= set_value('department') ?>" readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label >Site</label>
                                                                        <input type="text" id="cboSite" name= "cboSite" value = "<?= set_value('cboSite') ?>" class="form-control"  readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Sub Coaching Category</label>
                                                                              <select class="form-control" id="SubCategory" name = "SubCategory" required>
                                                                              <option disabled selected value="">Choose one</option>
                                                                              <?php if(is_array($data['get_sub_category'])): ?>
                                                                                <?php foreach($data['get_sub_category'] as $key => $object):  ?>
                                                                                  <option value="<?=$object->SubCategory?>"><?=$object->SubCategory?></option>
                                                                                  <?php endforeach; ?>
                                                                              <?php endif; ?>
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Date Hire</label>
                                                                              <div class="input-group mb-3" >
                                                                                    <input type="text"  id="dtDateHire" class="form-control" placeholder="MM/DD/YYYY" value = "<?= set_value('datehire') ?>" name = "datehire" readonly>
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Follow-Up Coaching Date</label>
                                                                        <div class="input-group mb-3" >
                                                                                  <div class="input-group-prepend">
                                                                                    <div class="input-group-text" >
                                                                                    <i class="now-ui-icons  ui-1_calendar-60"></i>
                                                                                    </div>
                                                                                   </div>
                                                                                    <input type="text"  id="dtFollowUp" class="form-control" name = "dtFollowUp"  value = "<?= set_value('dtFollowUp') ?>"  placeholder= "MM/DD/YYYY">
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Root Cause Category</label>
                                                                        <select class="form-control" id="rootCategory" name = "rootCategory" required>
                                                                        <option disabled selected value="">Choose one</option>
                                                                              <?php if(is_array($data['get_root_cause'])): ?>
                                                                                <?php foreach($data['get_root_cause'] as $key => $object):  ?>
                                                                                  <option value="<?=$object->RootCause?>"><?=$object->RootCause?></option>
                                                                                  <?php endforeach; ?>
                                                                              <?php endif; ?>
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Points of Discussion</label>
                                                                        <textarea id="discussion" name="discussion"  rows="4" cols="80" class="form-control" placeholder="Here can be your Points of Discussion" required><?= set_value('discussion')?>
</textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Cause</label>
                                                                        <textarea id="txtCause" name = "cause"  rows="4" cols="80" class="form-control" placeholder="Here can be your Cause" required><?= set_value('cause')?></textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Effect</label>
                                                                        <textarea id="txtEffect" name = "effect"  rows="4" cols="80" class="form-control" placeholder="Here can be your Effect" required><?= set_value('effect')?></textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-8">
                                                                      <div class="form-group">
                                                                        <label>Employee's Action Plan</label>
                                                                        <textarea id="txtEAplan" name = "employeActionPlan"  rows="4" cols="80" class="form-control" placeholder="Here can be your Employee's Action Plan" required><?= set_value('employeActionPlan')?></textarea>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Effectivity Date</label>
                                                                              <div class="input-group mb-3" >
                                                                                  <div class="input-group-prepend">
                                                                                      <div class="input-group-text" >
                                                                                      <i class="now-ui-icons  ui-1_calendar-60"></i>
                                                                                      </div>
                                                                                    </div>
                                                                                    <input type="text"  id="dtEmployeeDate" name = "dtEmployeeDate"  value = "<?= set_value('dtEmployeeDate') ?>" class="form-control" placeholder="MM/DD/YYYY" required>
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-8">
                                                                      <div class="form-group">
                                                                        <label>Leader's Action Plan</label>
                                                                        <textarea id="txtLAplan" name="leaderActionPlan" rows="4" cols="80" class="form-control" placeholder="Here can be your Leader's Action Plan" required><?= set_value('leaderActionPlan')?></textarea>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Effectivity Date</label>
                                                                                <div class="input-group mb-3" >
                                                                                  <div class="input-group-prepend">
                                                                                    <div class="input-group-text" >
                                                                                    <i class="now-ui-icons  ui-1_calendar-60"></i>
                                                                                    </div>                                                                                  
                                                                                  </div>
                                                                                    <input type="text"  id="dtLeaderDate" name = "dtLeaderDate" value = "<?= set_value('dtLeaderDate') ?>" class="form-control datepicker" placeholder="MM/DD/YYYY" required>
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Coached By</label>
                                                                        <input type="text" id="coachedby" class="form-control" value = "<?= $_SESSION['user_data'][0]->fullname ?>" name="coachedby" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Noted By</label>
                                                                        <input type="text" id="txtNotedBy" class="form-control"  value = "<?= set_value('notedby') ?>" name="notedby" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Acknowdledged By</label>
                                                                        <input type="text" id="txtAcknowBy" class="form-control"  value = "<?= set_value('acknowledgedby') ?>" name="acknowledgedby" readonly>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                      <div class="form-group">
                                                                        <label>Coach Email Address</label>
                                                                        <input type="email" id="txtCoachEmail" class="form-control"  value="<?= $_SESSION['user_data'][0]->email_address?>" name = "coached_email" required>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <div class="form-group">
                                                                        <label>Coachee Email Address</label>
                                                                        <input type="email" id="coachee_email"  name = "coachee_email" value = "<?= set_value('coachee_email') ?>" class="form-control"  required>
                                                                      </div>
                                                                    </div>
                                                                  
                                                                  </div>
                                                                  

                                                                  <div class="row">
                                                                    <div class="col-md-10">

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                      <div class="form-group">
                                                                        <button type="submit" id = "btnSubmit" class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-4">
                                                          <div class="card card-user">
                                                            <div class="image text-center">
                                                              <img src="../../assets/img/Visaya_KPO.png" alt="..." style="width: 60%;">
                                                            </div>
                                                            <div class="card-body">
                                                              <div class="author">
                                                                <a href="#">
                                                                  <img class="avatar border-gray" src="../../assets/img/default-avatar.png" alt="...">
                                                                  <h5 class="title" id="lblFullname"><?= set_value('fullname') ?></h5>
                                                                </a>
                                                                <p class="description text-center" id="lblEmployeeID"><?= set_value('employeeID') ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDesignation"><?= set_value('designation') ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDepartment"><?= set_value('department') ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblSite"><?= set_value('cboSite') ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDateHire"><?= set_value('datehire') ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblEmailAddress"><?= set_value('coachee_email') ?>
                                                                </p>
                                                              </div>
                                                            
                                                            </div>
                                                            
                                                           
                                                          </div>
                                                        </div>
                                                        </div>
                                                      </div>

</div>

<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
  </div>

  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>
  <script src="../../assets/js/dateFormat.js"></script>
  <script>



  $( function() {
    //var date = $_POST['dtCoachingDate'];
    
    $('#dtCoachingDate').datepicker({format:'mm/dd/yyyy',}).datepicker("setDate",'now');

  });
  $( function() {$('#dtFollowUp').datepicker({format:'mm/dd/yyyy',}).datepicker("setDate",'now');});
  $( function() {$('#dtEmployeeDate').datepicker({format:'mm/dd/yyyy',}).datepicker("setDate",'now');});
  $( function() {$('#dtLeaderDate').datepicker({format:'mm/dd/yyyy',}).datepicker("setDate",'now');});

  dateFormat('dtCoachingDate');
dateFormat('dtFollowUp');
dateFormat('dtEmployeeDate');
dateFormat('dtLeaderDate');
    
  $(document).on('submit','#coachingFormSubmit',function(){
          $("#overlay").fadeIn(100);  
  });


  $('.cmb_emp_id').on('change', function() {
    var employeeID = this.value.trim();
    //alert(employeeID);
    $.ajax({
        url: "<?=ROOT?>ajax_collect_data",
        type: "POST",
        data: {
          employeeID: employeeID,
          data_type: 'get_info'
        },
        dataType: "json",
        success: function(data){
          ////console.log(data);
          var received = JSON.parse(JSON.stringify(data)); 
          ////console.log(received);
          if (!received == false)
          {
            $('#txtemployeeID').val(received[0].employeeID);
            $('#txtSupervisor').val(received[0].Supervisor);
            $('#txtDesignation').val(received[0].position);
            $('#txtDepartment').val(received[0].Department);
            $('#dtDateHire').val(moment(received[0].DateLock).format("MM/DD/YYYY"));
            
            //$('#coachedby').val(received[0].Supervisor);
            $('#txtNotedBy').val(received[0].manager_name);
            
            $('#txtAcknowBy').val(received[0].name).trim;
            $('#fullname').val(received[0].name).trim;      
            $('#cboSite').val(received[0].LOCATION).trim;
            $('#coachee_email').val(received[0].Email_Address);
            //$('#lblFullname').val(received[0].name).trim;
            document.getElementById('lblFullname').innerHTML = received[0].name; 
            document.getElementById('lblEmployeeID').innerHTML = received[0].employeeID; 
            document.getElementById('lblDesignation').innerHTML = received[0].position; 
            document.getElementById('lblDepartment').innerHTML = received[0].Department; 
            document.getElementById('lblSite').innerHTML = received[0].LOCATION;
            document.getElementById('lblDateHire').innerHTML = moment(received[0].DateLock).format("MM/DD/YYYY");
            
            document.getElementById('lblEmailAddress').innerHTML = received[0].Email_Address;
          }
        
           }

    });

});
</script>

</body>
</html>