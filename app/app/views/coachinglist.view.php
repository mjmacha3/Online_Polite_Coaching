<?php $this->view('includes/header',$data)?>

<style>
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
      
        margin: 0 auto;
    }
</style>
</head>
<body>
<?php $this->view('includes/sidebar',$data)?> 
<div class="wrapper ">
  
<div class="main-panel" >
<?php $this->view('includes/nav',$data)?> 
<div class="panel-header panel-header-sm"  style="height: 70px;padding:0">
</div>
<div class="content">
              <div class="container-fluid mt-5">
                <form method="POST" id="filterRecords">
                  <div class="row">
                   
                      <div class="row">
                      <div class="col-md-4">
                              <select class="selectpicker" data-style="btn btn-primary btn-round " title="Single Select" data-size="10" id ="get_year">
                              <option disabled selected> Choose one</option>
                              <?php if(is_array($data['get_year'])): ?>
                                <?php foreach($data['get_year'] as $key => $object):  ?>
                                   <option value="<?=$object->Year?>" <?php if (date("Y") == $object->Year){echo 'selected';} ?>><?=$object->Year?></option>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                              </select>
                            </div>
                            <?php ?>
                            <div class="col-md-4">
                              <select class="selectpicker" data-style="btn btn-primary btn-round " title="Single Select" data-size="15" id ="get_month">
                              <?php for($i = 1 ; $i <= 12; $i++) { $allmonth = date("F",mktime(0,0,0,$i,1,date("Y"))) ?>
                                <option value="<?php echo $i;?>" <?php if(date("F")==$allmonth){echo 'selected'; }?>><?php echo date("F",mktime(0,0,0,$i,1,date("Y")));}?></option>
                              </select>
                            </div>

                            <div class="col-md-4">
                              <select class="selectpicker" data-style="btn btn-primary btn-round " title="Single Select" data-size="15" data-live-search="true" id ="get_department">
                              <option disabled selected value=""> Choose one</option>
                              <?php if(is_array($data['get_department'])): ?>
                                <?php foreach($data['get_department'] as $key => $object):  ?>
                                   <option value="<?=$object->Department?>"><?=$object->Department?></option>
                                  <?php endforeach; ?>
                                  <?php else: ?>
                                    <?php if($_SESSION['access_type']=='Admin' || $_SESSION['access_type']=='Limited'): ?>
                                      <option selected value="<?=$data['get_department']?>"><?=$data['get_department']?></option>
                                    <?php else: ?>
                                    <option value="<?=$data['get_department']?>"><?=$data['get_department']?></option>
                                    <?php endif; ?>
                              <?php endif; ?>
                              </select>
                            </div>
                      </div>
                      
                            

                            <div class="col-lg mt-2">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Search name" aria-label="get_name_id" aria-describedby="basic-addon1" id ="get_name_id">
                            </div>
                            </div>

                            <div class="col-lg">
                            <button type="submit" id="filter" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                            </form>
                            
                              <div class="card">         
                              <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table stripe row-border order-column table-hover" style="width:auto;" id="records">
                                  
                                      <thead>
                                          <tr >
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;" > </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                                  </div>
                        </div>
                      </div>
                  </div>

                             
</div>
</div>
  <!-- spinner -->

  <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
  </div>

 <!-- spinner -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          Coaching Session Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                              
                            <span id="demo"></span>
                        
                             
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>
  <script>
$(function(){
  var date_year = $('#get_year').val();
    var date_month = $('#get_month').val();
    
    //var date_month = (!date_month) ? ' ' : ' and Month(CoachingDate) =' + date_month;
    //alert(date_month);
    var get_department = $('#get_department').val();
    // var get_department = (get_department="") ? '%%' : get_department;
    //alert(get_department);
    var get_name_id = '%'+$('#get_name_id').val().trim()+'%';
    fetch(date_year, date_month, get_department, get_name_id);

});
$(document).on("click","#viewBtn",function(e){
e.preventDefault();
var coachingID = (this).value;
$.dialog({
  escapeKey: true,
    backgroundDismiss: true,
    type: 'green',
    icon: 'fa fa-info-circle',
    boxWidth: '40%',
    useBootstrap: false,
    content: function () {
        var self = this;
        return $.ajax({
            url: '<?=ROOT?>ajax',
            data: {coachingID: coachingID,
                  data_type: 'view_data'},
            dataType: 'json',
            type: 'POST'
        }).done(function (data) {
       var received = JSON.parse(JSON.stringify(data));
          received = received[0];
           ////console.log(received);
           Object.keys(received).forEach(key =>{
             //var name = name + key;
           
             self.setContentAppend('<div class="row"><div class="col-md-6">' + key + '</div><div class="col-md-6">: <b>' + received[key] + '</div></div>');
            //  self.setContent(key + received[key]) ;
            //  self.setContent(key + received[key]) ;
            //  self.setContent(key + received[key])  ;

             ////console.log(name);
           });
           ////console.log(name);
          self.setContent(name);
            // 
            // self.setContentAppend('<br>Version: ' + response.version);
             self.setTitle('Coaching Session Details');
        }).fail(function(){
          self.setTitle('Error!');
             self.setContent('Something went wrong.');
        });
    }
});

});
    $(document).on("click","#deleteBtn",function(e){
      e.preventDefault();
      var date_year = $('#get_year').val();
    var date_month = $('#get_month').val();
    
    //var date_month = (!date_month) ? ' ' : ' and Month(CoachingDate) =' + date_month;
    //alert(date_month);
    var get_department = $('#get_department').val();
    var get_department = (!get_department) ? '%%' : get_department;
    var get_name_id = '%'+$('#get_name_id').val().trim()+'%';
      $.confirm({
    title: '',
    content: 'Are you sure you want to delete this record?<br>'+ 'coaching ID: ' + (this).value,
    type: 'red',
    typeAnimated: true,
    escapeKey: true,
    backgroundDismiss: true,
    closeIcon: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-red',
            action: function()
            {
             // alert($('#deleteBtn').val());
              $.ajax({
                url: "<?=ROOT?>ajax",
                type: "POST",
                data: {coachingID: $('#deleteBtn').val(),data_type:'update_data'},
                dataType: "json",
                success: function(data){
                  //console.log(data);
                  var receive = JSON.parse(data);
                  $('#records').DataTable().destroy();
                  fetch(date_year, date_month, get_department, get_name_id);
                  
                }

              });
            }
        },
        Close: function () {
        }
    }
});
    });
    // $(document).on("change","#get_name_id",function(e){
    //   e.preventDefault();
    //   fetch(date_year, date_month, get_department, get_name_id);

    // });
    //click filter
    $(document).on("submit", "#filterRecords", function(e){
    e.preventDefault();
    var date_year = $('#get_year').val();
    var date_month = $('#get_month').val();
    
    //var date_month = (!date_month) ? ' ' : ' and Month(CoachingDate) =' + date_month;
    //alert(date_month);
    var get_department = $('#get_department').val();
    var get_department = (!get_department) ? '%%' : get_department;
    var get_name_id = '%'+$('#get_name_id').val().trim()+'%';
 //alert(date_year+' '+date_month+' '+get_department+' '+get_name_id);
  //showNotification();

  // if (!date_year || !date_month)
  // {
  //   //showNotification('top','right','Please pick year and month');
  // }
  // else
  // {
    $('#records').DataTable().destroy();
  if (!date_year || !date_month) 
  {
    showNotification('top','right','Please pick a year and month');  
  }else
  {
  fetch(date_year, date_month, get_department, get_name_id);
  }
    //alert(date_year + date_month);
  });

  function fetch(date_year, date_month, get_department, get_name_id){
    $.ajax({
        url: "<?=ROOT?>ajax",
        type: "POST",
        data: {
          date_year: date_year,
          date_month: date_month,
          get_department: get_department,
          get_name_id: get_name_id,
          data_type: 'fetch_data'
        },
        dataType: "json",
        complete: function(){
          setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
        },
        beforeSend: function() {
          $("#overlay").fadeIn(300);
        },
        success: function(data){
          console.log(data);
          var received = JSON.parse(JSON.stringify(data)); 
          if (received == false)
          {
            $('#records').DataTable({"bFilter": false}).clear().draw();
           // alert(received);
          }
          else
          {
            //alert(data);
                                                        //var i = 1;
                                                    $('#records').DataTable( {
                                                      "data": data,
                                                        "bFilter": false,
                                                      
                                                      scrollX: true,
                                                      fixedColumns:   {
                                                      left: 3
                                                  },
                                                        
                                            columns: [
                                                {data: null,
                                                render: function(item){
                                                return '<button type="button" id= "viewBtn" value= "'+ item.coachingID +'" class="btn btn-primary btn-sm btn-icon btn-round" ><i class="fa fa-eye" aria-hidden="true"></i></button>'}},
                                                {data: null,
                                                render: function(item){
                                                return '<a type="button" id= "updateBtn" href="<?=ROOT?>update_coaching?coachingID='+item.coachingID+'" target="_blank" value= "'+ item.coachingID +'" class="btn btn-success btn-sm btn-icon btn-round" ><i class="fa fa-edit"></i></a>'}},
                                                {data: null,
                                                render: function(item){
                                                return '<button type="button" id="deleteBtn" value= "'+ item.coachingID +'" class="btn btn-danger btn-sm btn-icon btn-round" <?php if($_SESSION['access_type'] != 'Full'){echo 'disabled';} ?>><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                                                {title: 'Coaching Date',data: 'CoachingDate',
                                                render: function(data,type,row,meta){
                                                    return moment(row.CoachingDate).format("MM/DD/YYYY");} 
                                                },
                                                { title: 'Name',data: 'Name', },
                                                { title: 'Start Date',data: 'startDate',
                                                render: function(data,type,row,meta){
                                                    return moment(row.startDate).format("MM/DD/YYYY");}  },
                                                { title: 'Department',data: 'Department' },
                                                { title: 'Designation',data: 'Designation' },
                                                { title: 'Supervisor',data: 'Supervisor' },
                                                { title: 'Coaching Category',data: 'CoachingCategory' },
                                                { title: 'Coaching Sub Category',data: 'subcategory' },
                                                { title: 'Root Cause Category',data: 'RootCauseCategory' },
                                                { title: 'Follow-up Date',data: 'FUCoachingDate',
                                                render: function(data,type,row,meta){
                                                    return moment(row.FUCoachingDate).format("MM/DD/YYYY");}  },
                                                { title: 'Points of Discussion',data: 'ItemDiscussion' },
                                                { title: 'Cause',data: 'RootCause' },
                                                { title: 'Effect',data: 'Effect' },
                                                { title: 'Employees Action Plan',data: 'EmployeeActionPlan' },
                                                { title: 'Leaders Action Plan',data: 'SupervisorActionPlan' },
                                                { title: 'Employees Action Plan Effectivity Date',data: 'EffectiveDateEAP',
                                                render: function(data,type,row,meta){
                                                    return moment(row.EffectiveDateEAP).format("MM/DD/YYYY");}  },
                                                { title: 'Leaderss Action Plan Effectivity Date',data: 'EffectiveDateSAP',
                                                render: function(data,type,row,meta){
                                                    return moment(row.EffectiveDateSAP).format("MM/DD/YYYY");}  },
                                                { title: 'Coached By',data: 'CoachedBy' },
                                                { title: 'Scan ID',data: 'ScanId' },
                                                { title: 'Site',data: 'Site' },
                                                { title: 'Coaching Number',data: 'CoachingNo' },
                                                { title: 'Coachee email',data: 'coachee_email' },
                                                { title: 'Coached email',data: 'coach_email' },
                                                { title: 'Acknowledge Date',data: 'Acknowledge_date',
                                                render: function(data,type,row,meta){
                                                    return moment(row.Acknowledge_date).format("MM/DD/YYYY");}  },
                                                { title: 'Coaching ID',data: 'coachingID' }
                                            ]
                                            } );
          }
           }

    }); }
   
   //fetch('2013','01');
</script>

</body>
</html>