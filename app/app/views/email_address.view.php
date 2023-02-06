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
          Email Information</h5>
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
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address</label>
            <input type="text" class="form-control" id="email">
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
<div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          Update Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class = "form "id="updateUserForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employee ID</label>
            <input type="text" class="form-control" id="eidUpdate" name="employeeID" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="nameUpdate" name="nameUpdate" readonly>
          </div>
       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address</label>
            <input type="text" class="form-control " id="emailUpdate" name="email" required>
          </div>
          <small class="text-danger ml-5" id="emailError"></small>
       
  
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save Changes</button>
        <button type="button" class="btn btn-secondary" id="updateBtnClose" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Update-->
<div class="modal fade" id="newUserMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          New Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class = "form" id="newUserForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employee ID</label>
            <input type="text" class="form-control" id="eidUpdate" name="employeeID" require>
          </div>
          <small class="text-danger" id="employeeError"></small>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address</label>
            <input type="text" class="form-control " id="emailUpdate" name="email" required>
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
        url: "<?=ROOT?>ajax_collect_data",
        type: "POST",
        data: {data_type: 'email_data'},
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
          var received = JSON.parse(JSON.stringify(data)); 
           $('#records').DataTable( {
                                                      "data": data,
                                                      fixedColumns:   {
                                                      right: 3
                                                  },
                                                    
                                            columns: [
                                              
                                                { title: 'Employee ID',data: 'EID' },
                                                { title: 'Fullname',data: 'fullname' },
                                                { title: 'Email Address',data: 'Email_Address' },
                                                {data: null, render: function(item){return '<button data-fullname="' + item.fullname + '" data-access="' + item.Access + '" data-email="' + item.Email_Address + '" data-id="' + item.EID + '" id = "viewUser" data-toggle="modal" data-target="#exampleModalCenter" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-fullname="' + item.fullname + '" data-access="' + item.Access + '" data-email="' + item.Email_Address + '" data-id="' + item.EID + '" data-toggle="modal" data-target="#updateUser" id = "editUser" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"><i class="fa fa-edit"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-email="' + item.Email_Address + '" value ="'+item.EID+'" id = "deleteUserBtn" type="button" rel="tooltip" class="btn btn-danger btn-sm  btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                           
                                                
                                            ]
                                            } );
                                            
          
           }

    }); }


    $(document).on('click', '#viewUser', function(e) {
  e.preventDefault();
      var emp_id = $(this).attr("data-id");
      var email_address = $(this).attr("data-email");
      var name = $(this).attr("data-fullname");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eid").value =emp_id;
  document.getElementById("email").value = email_address;
  document.getElementById("name").value = name;
});

$(document).on('click', '#editUser', function(e) {
   e.preventDefault();
   document.getElementById("emailError").innerHTML = '';
  //alert('clicked');
      var emp_id = $(this).attr("data-id");
      var email_address = $(this).attr("data-email");
      var name = $(this).attr("data-fullname");
 
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eidUpdate").value =emp_id;
  document.getElementById("emailUpdate").value = email_address;
  document.getElementById("nameUpdate").value = name;
 
  

 
});

$(document).on("click","#editUser",function(e){
  e.preventDefault();
  document.getElementById('eidUpdate').readOnly = true;
  $('#updateUserForm').on('submit', function() {
      // e.preventDefault();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'updateUserEmail');
      var form = $(this);
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown) {
         // toastr.error(xhr.responseText);
        },
        success: function(response) {
          console.log(response);
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
            form.trigger('reset');
            form.find('small').text('');
            toastr.success(response.msg);
            $('#updateBtnClose').click();
            $('#records').DataTable().destroy();
            fetch();
            
          
            //$('#records').dataTables().destroy();
            //fetch();
            // var table = $('#records').dataTables();
            // table.ajax.reload();

            // handling success respone
            //window.location.href = '/php_tutorial/login.php';
          } else if (response.status == 0) {
            // Handling failure response
            console.login(response.msg);
          }
        }
      });
    });
});



$(document).on("click","#deleteUserBtn",function(e){
  e.preventDefault();
  var eid = (this).value;
  var email = $(this).attr('data-email');
  // alert(id);
  $.confirm({
    title: 'Delete user email?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: This user email may delete forever. Are you sure you want to continue?</i><br><br><b> Employee ID: ' +eid + '<br> Email: '+ email,
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-red',
            action: function(){
              $.ajax({
        type: "POST",
        url: '<?=ROOT?>ajax',
        data: {eid: eid, data_type: 'delete_user_mail'},
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
      data.append('data_type', 'newUserEmail');
      var form = $(this);
      // form.trigger('reset');
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax',
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

   
   //fetch('2013','01');
</script>

</body>
</html>