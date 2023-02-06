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
                      <div class="col-md-6">
                          <button id="newUser" class="btn btn-primary" data-toggle="modal" data-target="#newUserMdl"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Enter New</button>
                      </div>
                  </div>
                  <div class="row">
                  
                        <div class="col-md-6">
                      
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

<!-- Modal view-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          Supervisor Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employee ID</label>
            <input type="text" class="form-control" id="eid">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name">
          </div>
       
       
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal Update-->
<div class="modal fade" id="newUserMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          New Supervisor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class = "form" id="newUserForm">
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Employee ID</label>
            <input type="text" class="form-control" id="eidUpdate" name="employeeID" required>
         
          </div>
          <small class="text-danger" id="employeeError"></small>
          <div class="form-group">
            <label for="recipient-name" for="exampleDataList" class="col-form-label">Name</label>
            <input type="text" class="form-control"  id="emailUpdate" name="email" readonly>
        
          </div>
          <small class="text-danger" id="emailError"></small>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save Changes</button>
        <button type="button" class="btn btn-secondary" id="newBtnClose" data-dismiss="modal">Close</button>
       
      </div>
      </form>
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
// $(function(){
//   // $.noConflict();

//     fetch();

// });
$(document).ready(function() {
  
  fetch();
});





  function fetch(){
    
     //$.noConflict();
    $.ajax({
        url: "<?=ROOT?>ajax_supervisor",
        type: "POST",
        data: {data_type: 'getSupervisorList'},
        dataType: "json",
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
        success: function(data){
          console.log(data);
         // var received = JSON.parse(JSON.stringify(data)); 
           $('#records').DataTable( {
                                                      "data": data,
                                                    
                                                      fixedColumns:   {
                                                      right: 4
                                                  },
                                                    
                                            columns: [
                                              { title: 'ID',data: 'SupId' },
                                                { title: 'Employee ID',data: 'EID' },
                                                { title: 'fullname',data: 'Supervisor' },
                                                {data: null, render: function(item){return '<button data-fullname="' + item.Supervisor + '" data-access="' + item.Access + '" data-email="' + item.Email_Address + '" data-id="' + item.EID + '" id = "viewUser" data-toggle="modal" data-target="#exampleModalCenter" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></button>'}},
                                                {data: null, render: function(item){return '<button  data-eid="' + item.EID + '" data-email="' + item.Supervisor + '" value ="'+item.SupId+'" id = "deleteUserBtn" type="button" rel="tooltip" class="btn btn-danger btn-sm  btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                           
                                                
                                            ]
                                            } );
                                            
          
           }

    }); }


    $(document).on('click', '#viewUser', function(e) {
  e.preventDefault();
      var emp_id = $(this).attr("data-id");
      var fullname = $(this).attr("data-fullname");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eid").value =emp_id;
  document.getElementById("name").value = fullname;
});


$(document).on("click","#deleteUserBtn",function(e){
  e.preventDefault();
  var id = (this).value;
  var email = $(this).attr('data-email');
  var eid = $(this).attr('data-eid');
  // alert(id);
  $.confirm({
    title: 'Delete Supervisor?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: This supervisor may delete forever. Are you sure you want to continue?</i><br><br><b> Employee ID: ' +eid + '<br> Name: '+ email,
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-red',
            action: function(){
              $.ajax({
        type: "POST",
        url: '<?=ROOT?>ajax_supervisor',
        data: {id: id, data_type: 'deleteSupervisor'},
        dataType: "json",
        // processData: false,
        // contentType: true,
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
        },
        success: function(response) {
          //console.log(response);
          // form.find(':submit').attr('disabled', false);
          if (response.error_status == 1) {
            toastr.error(response.msg);
            // If validation error exists
          }
          if (response.status == 1) {
            // form.trigger('reset');
            // form.find('small').text('');
             toastr.success(response.msg);
            // jQuery.noConflict();
            // $('#updateUser').modal('hide');
            $('#records').DataTable().destroy();
            fetch();

            // handling success respone
            //window.location.href = '/php_tutorial/login.php';
          } else if (response.status == 0) {
            // Handling failure response
            //console.login(response.msg);
          }
        }
      });
            }
        },
        No: function () {
        }
    }
});
});

$(document).on("click","#newUser",function(e){
e.preventDefault();

// document.getElementById('eidUpdate').readOnly = false;
// $("#eidUpdate").attr("required", "true");
// $("#eidUpdate").val('');
// $("#emailUpdate").val('');
//alert(data);

$('#newUserForm').on('submit', function(e) {
      e.preventDefault();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'newSupervisor');
      var form = $(this);
      // form.trigger('reset');
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax_supervisor',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
        },
        success: function(response) {
          //console.log(response);
          form.find(':submit').attr('disabled', false);
          if (response.error_status == 1) {
            toastr.error(response.msg);
            form.find('small').text('');
            // If validation error exists
            for (var key in response) {
              var errorContainer = form.find(`#${key}Error`);
              if (errorContainer.length !== 0) {
                // alert(errorContainer.html(response[key]));
                errorContainer.html(response[key]);
                //alert(errorContainer);
              }
            }
          }
          if (response.status == 1) {
            toastr.success(response.msg);
            form.trigger('reset');
            form.find('small').text('');
            $('#records').DataTable().destroy();
            fetch();
            $('#newBtnClose').click();
            //$('#records').dataTables().destroy();
            //fetch();
            // var table = $('#records').dataTables();
            // table.ajax.reload();

            // handling success respone
            //window.location.href = '/php_tutorial/login.php';
          } else if (response.status == 0) {
            // Handling failure response
            //console.login(response.msg);
          }
        }
      });
    });
// alert('clicked');
});

$(document).on('keyup','#eidUpdate',function(e){
        var eid = this.value.trim();
        $('#emailUpdate').val('');
        // $('#datalistOptions').html('');
        if (eid.length > 4) {
          var data = new FormData($('#newUserForm')[0]);
          data.append('data_type', 'search_eid');
          $.ajax({
            url: '<?=ROOT?>ajax_supervisor',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
        },
           success: function (response){
            console.log(response);
         
    
              $.each(response, function (key,value){
                //alert(value.fullname);
                $('#emailUpdate').val(value.fullname);
              });
             
         
           }
          });
        }

});
   
   //fetch('2013','01');
</script>

</body>
</html>