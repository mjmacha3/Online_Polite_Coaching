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
                <div class="row">
                  <div class="col-md-8">

                              <div class="card">         
                              <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table stripe row-border order-column table-hover" id="records">
                                  
                                      <thead>
                                          <tr >
                                               
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;"></th>
                                                <th style = "font-size: 16px;" > </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"> </th>
                                                <th style = "font-size: 16px;"></th>
                               
                                  
                                          </tr>
                                      </thead>
                                      
                                  </table>
                                  </div>
                        </div>
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


    fetch();

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
           
             self.setContentAppend('<div class="row"><div class="col-md-6">' + key + '</div><div class="col-md-6">:<b>' + received[key] + '</div></div>');
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
      //location.reload();
      var coachingID = (this).value;
      var email = $(this).attr('data-email');
      //alert(coachingID);
      $.confirm({
    title: 'Acknowledgement Receipt',
    content: '<hr>I HEREBY CERTIFY that the information provided in this form is complete, true and correct to the best of my knowledge.<hr><br>'+ 'coaching ID: ' + (this).value,
    type: 'orange',
    escapeKey: true,
    backgroundDismiss: true,
    typeAnimated: true,
    closeIcon: true,
    closeIconClass: 'fa fa-close',
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-primary',
            action: function()
            {
             // alert($('#deleteBtn').val());
              $.ajax({
                url: "<?=ROOT?>ajax_acknowledge",
                type: "POST",
                data: {coachingID: coachingID,email:email,
                        data_type:'update'},
                dataType: "json",
                complete: function(){
                  setTimeout(function(){
                $("#overlay").fadeOut(300);
              },500);
                },
                beforeSend: function() {
                  $("#overlay").fadeIn(300);
                },
                error: function(xhr,textStatus,errorThrown){
                  toastr.error(xhr.responseText)
                },
                success: function(data){
                  //location.reload();
                  //console.log(data);
                  //var receive = JSON.parse(data);
                  $('#records').DataTable().destroy();
                  fetch();
                  load_unseen_notification();

                  if (data.status==2)
                  {
                    toastr.success(data.msg);
                  }else
                  {
                    toastr.success(data.msg);
                  }
                  //showNotification();
                  
                  // $.dialog({
                  //   icon: 'fa fa-check fa-beat-fade',
                  //   title: 'Congratulations!',
                  //   content: 'Acknowledgement successfully completed',
                  //   type: 'green',
                  //   escapeKey: true,
                  //    backgroundDismiss: true
                  //     });                  
                }

              });
            }
        },
        No: function () {
        }
    }
});
    });


  function fetch(){
    $.ajax({
        url: "<?=ROOT?>ajax_collect_data",
        type: "POST",
        data: {data_type: 'acknowledge_data'},
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
          //console.log(data);
          var received = JSON.parse(JSON.stringify(data)); 
          if (received == false)
          {
            $('#records').DataTable({"bFilter": false}).clear().draw();
           // alert(received);
          }
          else
          {
                                                    $('#records').DataTable( {
                                                      "data": data,
                                                        "bFilter": false,
                                                        

                                            columns: [
                                                {data: null, render: function(item){
                                                 if(item.Acknowledge =='YES'){
                                                  return '<button type="button" id="viewBtn" value= "'+ item.coachingID +'" class="btn btn-primary btn-sm btn-icon btn-round"  ><i class="fa fa-eye" aria-hidden="true"></i></button>'
                                                 }
                                                 else
                                                 {
                                                  return '<button type="button" id="deleteBtn" data-email="'+item.coachee_email+'" value= "'+ item.coachingID +'" class="btn btn-success btn-sm btn-icon btn-round" ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>'
                                                }
                                                  
                                                }},
                                                { title: 'Coaching ID',data: 'coachingID' },
                                                {title: 'Coaching Date',data: 'CoachingDate',render: function(data,type,row,meta){return moment(row.CoachingDate).format("MM/DD/YYYY");}},
                                                { title: 'Coached By',data: 'CoachedBy' },
                                                { title: 'Coachee email',data: 'coachee_email' },
                                                { title: 'Acknowledge',data: 'Acknowledge' },
                                                { title: 'Acknowledge Date',data: 'Acknowledge_date',render: function(data,type,row,meta){return moment(row.Acknowledge_date).format("MM/DD/YYYY");}  }
                                                
                                            ]
                                            } );
                                            
          }
           }

    }); }
   
   //fetch('2013','01');
</script>

</body>
</html>