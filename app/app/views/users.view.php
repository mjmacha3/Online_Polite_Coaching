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
          User Information</h5>
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
            <label for="recipient-name" class="col-form-label">Access</label>
            <input type="text" class="form-control" id="access">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address</label>
            <input type="text" class="form-control" id="email">
          </div>
       
       
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          Update User</h5>
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
            <input type="text" class="form-control" id="nameUpdate"  readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Access</label>
              <select name="access_type" class="form-control" id="accessUpdate">
                <option value="Agent">Agent</option>
                <option value="Limited">Limited</option>
                <option value="Admin">Admin</option>
                <option value="Full">Full</option>
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Address</label>
            <input type="text" class="form-control " id="emailUpdate" name="email" required>
          </div>
          <small class="text-danger ml-5" id="emailError"></small>
       
  
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save Changes</button>
        <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Close</button>
       
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
$(function() {
  
  fetch();
});

  function fetch(){
    
     //$.noConflict();
    $.ajax({
        url: "<?=ROOT?>ajax_collect_data",
        type: "POST",
        data: {data_type: 'users_data'},
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
          //console.log(data);
          var received = JSON.parse(JSON.stringify(data)); 
           $('#records').DataTable( {
                                                      "data": data,
                                                      fixedColumns:   {
                                                      right: 4
                                                  },
                                                    
                                            columns: [
                                                
                                                { title: 'ID',data: 'PCIT' },
                                                { title: 'Employee ID',data: 'emp_id' },
                                                { title: 'Name',data: 'fullname' },
                                                { title: 'Access',data: 'Access' },
                                                { title: 'Email Address',data: 'Email_Address' },
                                                {data: null, render: function(item){return '<button data-fullname="' + item.fullname + '" data-access="' + item.Access + '" data-email="' + item.Email_Address + '" data-id="' + item.emp_id + '" id = "viewUser" data-toggle="modal" data-target="#exampleModalCenter" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-fullname="' + item.fullname + '" data-access="' + item.Access + '" data-email="' + item.Email_Address + '" data-id="' + item.emp_id + '" data-toggle="modal" data-target="#updateUser" id = "editUser" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"><i class="fa fa-edit"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-email="' + item.Email_Address + '" data-id="' + item.emp_id + '" id = "resetUserBtn" type="button" rel="tooltip" class="btn btn-primary btn-sm btn-round btn-icon"><i class="now-ui-icons loader_refresh"></i></button>'}},
                                                {data: null, render: function(item){return '<button value ="'+item.PCIT+'" id = "deleteUserBtn" type="button" rel="tooltip" class="btn btn-danger btn-sm  btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                           
                                                
                                            ]
                                            } );
                                            
          
           }

    }); }


    $(document).on('click', '#viewUser', function(e) {
  e.preventDefault();
      var emp_id = $(this).attr("data-id");
      var fullname = $(this).attr("data-fullname");
      var access = $(this).attr("data-access");
      var email_address = $(this).attr("data-email");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eid").value =emp_id;
  document.getElementById("name").value = fullname;
  document.getElementById("access").value = access;
  document.getElementById("email").value = email_address;
});

$(document).on('click', '#editUser', function(e) {
   e.preventDefault();
  //alert('clicked');
  document.getElementById("emailError").innerHTML = '';
      var emp_id = $(this).attr("data-id");
      var fullname = $(this).attr("data-fullname");
      var access = $(this).attr("data-access");
      var email_address = $(this).attr("data-email");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eidUpdate").value =emp_id;
  document.getElementById("nameUpdate").value = fullname;
  document.getElementById("accessUpdate").value = access;
  document.getElementById("emailUpdate").value = email_address;

 
});

$(document).on('submit','#updateUserForm', function(e) {
      e.preventDefault();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'updateUser');
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
            form.trigger('reset');
            form.find('small').text('');
            toastr.success(response.msg);
            $('#records').DataTable().destroy();
            fetch();
            $("#btnClose").click();
            // jQuery.noConflict();
            // $('#updateUser').modal('hide');
            //location.reload();
          
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

$(document).on("click","#deleteUserBtn",function(e){
  e.preventDefault();
  var pcit = (this).value;
  // alert(id);
  $.confirm({
    title: 'Delete user?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: This user may delete forever. Are you sure you want to continue?</i><br><br><b> ID: ' +pcit,
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
        data: {pcit: pcit, data_type: 'delete_user'},
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
             $('#records').DataTable().destroy();
            fetch();
            // jQuery.noConflict();
            // $('#updateUser').modal('hide');
            // location.reload();

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



$(document).on("click","#resetUserBtn",function(e){
  e.preventDefault();
  var eid = $(this).attr('data-id');
  var email = $(this).attr('data-email')
  // alert(id);
  $.confirm({
    title: 'Reset user password?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: Please check the email address it cant be empty or else error may occured.</i><br><br><b> Employee ID: ' + eid + '<br> Emaill Address: '+ email,
    type: 'orange',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-primary',
            action: function(){
              $.ajax({
        type: "POST",
        url: '<?=ROOT?>reset',
        data: {eid: eid, email:email, data_type: 'reset_user'},
        dataType: "json",
        // processData: false,
        // contentType: true,
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
             $('#records').DataTable().destroy();
            fetch();
            // jQuery.noConflict();
            // $('#updateUser').modal('hide');
             //location.reload();

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

   
   //fetch('2013','01');
</script>

</body>
</html>