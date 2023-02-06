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




  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>
  <script>

    $(document).on("submit", "#filterRecords", function(e){
    e.preventDefault();
    var date_year = $('#get_year').val();
    
    $('#records').DataTable().destroy();
  if (!date_year) 
  {
    showNotification('top','right','Please pick a year');  
  }else
  {
  fetch(date_year);
  }
    //alert(date_year + date_month);
  });

  function fetch(date_year){
    $.ajax({
        url: "<?=ROOT?>report_ajax",
        type: "POST",
        data: {
          date_year: date_year,
          data_type: 'annual'
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
        error: function(xhr){
          console.log(xhr.responseText);
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
                                                        dom: 'Bfrtip',
                                                        buttons: [

                                                            'copy', 'excel', 'print'
                                                        ],
                                                      scrollX: true,
                    
                                                        
                                            columns: [
                                              
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