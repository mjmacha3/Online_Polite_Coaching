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
                                                            <div class="card ">
                                                            <?php if(is_array($data['coaching_data'])): ?>
                                                              <div class="card-header">
                                                                <h5 class="title text-center">Update Coaching Session</h5>
                                                              </div>
                                                              <div class="card-body">
                                                             
                                                                <form  class="form"  method = "POST" id = "coachingFormSubmit">
                                                                <input type="text" name="coachingID" value="<?=$_GET['coachingID']?>" hidden>
                                                                  <div class="row">
                                                                     <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text"   name = "fullname" id="fullname" class="form-control "  value = "<?= $data['coaching_data'][0]->Name ?>" readonly>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Employee ID</label>
                                                                        <input type="text"   name = "employeeID" id="txtemployeeID" class="form-control "  value = "<?=  $data['coaching_data'][0]->EID ?>"  readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label>Direct Supervisor</label>
                                                                        <input type="text" id="txtSupervisor" class="form-control" value = "<?= $data['coaching_data'][0]->Supervisor ?>" name = "supervisor" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Designation</label>
                                                                        <input type="text" id="txtDesignation" class="form-control"  name = "designation" value = "<?= $data['coaching_data'][0]->Designation ?>" readonly>
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
                                                                                    <input value="<?= date("m/d/Y", strtotime($data['coaching_data'][0]->CoachingDate )) ?>" type="text" name="dtCoachingDate" id="dtCoachingDate" class="form-control datepicker" placeholder = "MM/DD/YYYY" required>
                                                                                </div>
                                                                              </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                    <div class="form-group">
                                                                      <label for="exampleFormControlSelect1">Scan ID</label>
                                                                      <input type="text" name="scanID"  value = "<?= $data['coaching_data'][0]->ScanId ?>" id="txtScanID" class="form-control">
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Coaching Category</label>
                                                                              <select class="form-control" id="coachingCategory" name = "coachingCategory" required>
                                                                              <option selected value="<?= $data['coaching_data'][0]->CoachingCategory ?>"><?= $data['coaching_data'][0]->CoachingCategory ?></option>
                                                                          
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                
                                                                  <div class="row">
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Department</label>
                                                                        <input type="text" name = "department" id="txtDepartment" class="form-control" value = "<?= $data['coaching_data'][0]->Department ?>" readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label >Site</label>
                                                                        <input type="text" id="cboSite" name= "cboSite" value = "<?= $data['coaching_data'][0]->Site ?>" class="form-control"  readonly>
                                                                      </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Sub Coaching Category</label>
                                                                              <select class="form-control" id="SubCategory" name = "SubCategory" required>
                                                                              <option selected value="<?= $data['coaching_data'][0]->SubCategory ?>"><?= $data['coaching_data'][0]->SubCategory ?></option>
                                                                    
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label>Date Hire</label>
                                                                              <div class="input-group mb-3" >
                                                                                    <input type="text"  id="dtDateHire" class="form-control" placeholder="MM/DD/YYYY" value = "<?= date("m/d/Y", strtotime($data['coaching_data'][0]->StartDate )) ?>" name = "datehire" readonly>
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
                                                                                    <input type="text"  id="dtFollowUp" class="form-control" name = "dtFollowUp"  value = "<?= date("m/d/Y", strtotime($data['coaching_data'][0]->FUCoachingDate )) ?>"  placeholder="MM/DD/YYYY">
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4 ">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Root Cause Category</label>
                                                                        <select class="form-control" id="rootCategory" name = "rootCategory" required>
                                                                        <option selected value="<?= $data['coaching_data'][0]->RootCauseCategory ?>"><?= $data['coaching_data'][0]->RootCauseCategory ?></option>
                                                                   
                                                                              </select>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Points of Discussion</label>
                                                                        <textarea id="discussion" name="discussion"  rows="4" cols="80" class="form-control" placeholder="Here can be your Points of Discussion" required><?= $data['coaching_data'][0]->ItemDiscussion ?>
</textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Cause</label>
                                                                        <textarea id="txtCause" name = "cause"  rows="4" cols="80" class="form-control" placeholder="Here can be your Cause" required><?= $data['coaching_data'][0]->RootCause ?></textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Effect</label>
                                                                        <textarea id="txtEffect" name = "effect"  rows="4" cols="80" class="form-control" placeholder="Here can be your Effect" required><?= $data['coaching_data'][0]->Effect ?></textarea>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-8">
                                                                      <div class="form-group">
                                                                        <label>Employee's Action Plan</label>
                                                                        <textarea id="txtEAplan" name = "employeActionPlan"  rows="4" cols="80" class="form-control" placeholder="Here can be your Employee's Action Plan" required><?= $data['coaching_data'][0]->EmployeeActionPlan ?></textarea>
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
                                                                                    <input type="text"  id="dtEmployeeDate" name = "dtEmployeeDate"  value = "<?= date("m/d/Y", strtotime($data['coaching_data'][0]->EffectiveDateEAP )) ?>" class="form-control" placeholder="MM/DD/YYYY" required>
                                                                                </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-8">
                                                                      <div class="form-group">
                                                                        <label>Leader's Action Plan</label>
                                                                        <textarea id="txtLAplan" name="leaderActionPlan" rows="4" cols="80" class="form-control" placeholder="Here can be your Leader's Action Plan" required><?= $data['coaching_data'][0]->SupervisorActionPlan ?></textarea>
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
                                                                                    <input type="text"  id="dtLeaderDate" name = "dtLeaderDate" value = "<?= date("m/d/Y", strtotime($data['coaching_data'][0]->EffectiveDateSAP )) ?>" class="form-control datepicker" placeholder="MM/DD/YYYY" required>
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
                                                                        <input type="text" id="txtNotedBy" class="form-control"  value = "<?= $data['coaching_data'][0]->NotedBy ?>" name="notedby" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                      <div class="form-group">
                                                                        <label for="exampleInputEmail1">Acknowdledged By</label>
                                                                        <input type="text" id="txtAcknowBy" class="form-control"  value = "<?= $data['coaching_data'][0]->Coachee  ?>" name="acknowledgedby" readonly>
                                                                      </div>
                                                                    </div>
                                                                  </div>

                                                                  <div class="row">
                                                                    <div class="col-md-6">
                                                                      <div class="form-group">
                                                                        <label>Coach Email Address</label>
                                                                        <input type="email" id="txtCoachEmail" class="form-control" value="<?= $_SESSION['user_data'][0]->email_address?>" name = "coached_email" readonly>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                      <div class="form-group">
                                                                        <label>Coachee Email Address</label>
                                                                        <input type="email" id="coachee_email"  name = "coachee_email" value = "<?= $data['coaching_data'][0]->coachee_email ?>" class="form-control" readonly>
                                                                      </div>
                                                                    </div>
                                                                  
                                                                  </div>
                                                                  

                                                                  <div class="row">
                                                                    <div class="col-md-10">

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                      <div class="form-group">
                                                                        <button type="submit" id = "btnSubmit" class="btn btn-primary">Save Changes</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      <?php else:?>
                                                          <div class="card-body text-center">
                                                            <p>No Records Found.</p>
                                                          </div>
                                                       <?php endif;?>
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

 $('#coachingFormSubmit').on('submit', function(e) {
      e.preventDefault();
      //var email = $('#email').val();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'updateCoachingForm');
      var form = $(this);
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>dropdown_list',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        complete: function(){
          setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
        },
        beforeSend: function() {
          $("#overlay").fadeIn(300);
        },
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
        },
        success: function(response) {
          console.log(response);
          form.find(':submit').attr('disabled', false);
          if (response.error_status == 1) {
            form.find('small').text('');
            // If validation error exists
            for (var key in response) {
              var errorContainer = form.find(`#${key}Error`);
              if (errorContainer.length !== 0) {
                // alert(errorContainer.html(response[key]));
                errorContainer.html(response[key]);
                toastr.error(response.msg)
                //alert(errorContainer);
              }
            }
          }
          if (response.status == 1) {
            //form.trigger('reset');
            form.find('small').text('');
            var coachingID = $("#coachingFormSubmit input[name=coachingID]").val();
            var name = $("#coachingFormSubmit input[name=fullname]").val();
            var coachingDate = $("#coachingFormSubmit input[name=dtCoachingDate]").val();
            var coach_email = $("#coachingFormSubmit input[name=coached_email]").val();
            var coachee_email = $("#coachingFormSubmit input[name=coachee_email]").val();
           // var coachingID = $("#coachingFormSubmit input[name=coachingID]").val();

            //console.log(coachingID + name + coachingDate);
            toastr.success(response.msg);
            if (response.coachedMailStatus == true){coachStatus='True'}else{var coachStatus = 'False';}
            if (response.coacheeMailStatus == true){coacheeStatus='True'}else{var coacheeStatus = 'False';}
            //console.log(received);
            window.location.href = '<?=ROOT?>'+ 'update_session_notif?coachingID=' +coachingID+
            '&name=' +name+'&coachingDate='+coachingDate+'&status_coach='+coachStatus+'&status_coachee='+coacheeStatus+'&coach_email='+coach_email+'&coachee_email='+coachee_email+'&success=1';
          } else if (response.status == 0) {

          }
        }
      });
    });
    


  $( function() {
    //var date = $_POST['dtCoachingDate'];
    
    $('#dtCoachingDate').datepicker({format:'mm/dd/yyyy',});

  });
  $( function() {$('#dtFollowUp').datepicker({format:'mm/dd/yyyy',});});
  $( function() {$('#dtEmployeeDate').datepicker({format:'mm/dd/yyyy',});});
  $( function() {$('#dtLeaderDate').datepicker({format:'mm/dd/yyyy',});});

dateFormat('dtCoachingDate');
dateFormat('dtFollowUp');
dateFormat('dtEmployeeDate');
dateFormat('dtLeaderDate');
  // $('#dtFollowUp').on('change',function(){

  //   var format = (this).value;
  // alert(format);
    
  // });

  $(document).on('submit','#coachingFormSubmit',function(){
          $("#overlay").fadeIn(100);  
  });


$('#coachingCategory').one('click',function(){
 $.ajax({
  type: 'POST',
  url: '<?=ROOT?>dropdown_list',
  data: {data_type: 'getCoachingCategory'},
  dataType: 'json',
  error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
  },
  success: function(response){
    console.log(response);
      $('#coachingCategory').empty();
      $('#coachingCategory').html(response);
  }
 });
});

$('#SubCategory').one('click',function(){
 $.ajax({
  type: 'POST',
  url: '<?=ROOT?>dropdown_list',
  data: {data_type: 'getSubCategory'},
  dataType: 'json',
  error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
  },
  success: function(response){
    console.log(response);
      $('#SubCategory').empty();
      $('#SubCategory').html(response);
  }
 });
});

$('#rootCategory').one('click',function(){
 $.ajax({
  type: 'POST',
  url: '<?=ROOT?>dropdown_list',
  data: {data_type: 'getRootCategory'},
  dataType: 'json',
  error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
  },
  success: function(response){
    console.log(response);
      $('#rootCategory').empty();
      $('#rootCategory').html(response);
  }
 });
});




</script>

</body>
</html>