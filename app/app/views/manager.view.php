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
                            <form action="" class="form-inline" id="searchFilterForm">
                            <div class="form-group">
                            
                                <button type = "button" id="newUser" class="btn btn-primary" data-toggle="modal" data-target="#newUserMdl"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Enter New</button>
                            </div>
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" id="inputSearch" placeholder="eid or firstname or lastname">
                            </div>
                            <button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                 
                 
                 

                  </div>
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
          User Supervisor Information</h5>
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
            <label for="recipient-name" class="col-form-label">Supervisor EID</label>
            <input type="text" class="form-control" id="seid">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Supervisor Name</label>
            <input type="text" class="form-control" id="mname">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description</label>
            <input type="text" class="form-control" id="desc">
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
          Update User Supervisor</h5>
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
            <label for="recipient-name" class="col-form-label">Name </label>
            <input type="text" class="form-control" id="nameUpdate"  readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Supervisor EID</label>
            <input type="text" class="form-control" id="seidUpdate" name="seid"  readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Supervisor Name</label>
            <select id="snameUpdate" class="form-control" name="snameUpdate" required>
                   
                  
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description</label>
                        
                    <select id="descUpdate" class="form-control" name = "descUpdate" disabled>
                
                   
                    </select>
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

<!-- Modal New-->
<div class="modal fade" id="newUserMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          New User Supervisor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class = "form "id="newUserForm">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employee ID</label>
            <input type="text" class="form-control" id="eidUpdate" name="employeeID" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name </label>
            <input type="text" class="form-control" id="nameUpdates" name="employeeName" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Supervisor EID</label>
            <input type="text" class="form-control" id="newSeid" name="sEid"  readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Supervisor Name</label>
            <select id="snameNew" class="form-control" name="newSname" required>
                   
                  
            </select>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description</label>
                        
                    <select id="descNew" class="form-control" name="newDesc" required>
                
                   
                    </select>
          </div>
          <small class="text-danger " id="emailError"></small>
       
  
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

$(document).on('submit','#newUserForm', function(e) {
      e.preventDefault();
    var searchFilter =   $('#inputSearch').val();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'create');
      var form = $(this);
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax_manager',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
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
            $('#records').DataTable().destroy();
            fetch(searchFilter);
            $("#newBtnClose").click();
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
// $(function(){
//   // $.noConflict();

//     fetch();

// });
// $(function() {
  
//   fetch();
// });
$(document).on('submit','#searchFilterForm',function(e){
e.preventDefault();
var searchFilter = $('#inputSearch').val();
$('#records').DataTable().destroy();
if (!(searchFilter)){
  fetch('');
}else{
fetch(searchFilter);
//toastr.success(searchFilter);
}
});
  function fetch(searchFilter){
    // var inputSearch = $('#inputSearch').val();
     //$.noConflict();
    $.ajax({
        url: "<?=ROOT?>ajax_manager",
        type: "POST",
        data: {id:searchFilter ,data_type: 'users_data'},
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
          //var received = JSON.parse(JSON.stringify(data)); 
          if (data!=false){
           $('#records').DataTable( {
                                                      "data": data,
                                                      "bFilter": false,   
                                            columns: [
                                                
                                                { title: 'ID',data: 'id' },
                                                { title: 'Employee ID',data: 'eid' },
                                                { title: 'Name',data: 'fullname' },
                                                { title: 'Supervisor EID',data: 'eid_sup' },
                                                { title: 'Supervisor Name',data: 'manager_name' },
                                                { title: 'Description',data: 'sup_desc' },
                                                {data: null, render: function(item){return '<button data-desc= "'+item.sup_desc+'" data-mname= "'+item.manager_name+'" data-seid="'+item.eid_sup+'" data-id = "'+item.id+'" data-eid="'+item.eid+'" data-name="'+item.fullname+'" id = "viewUser" data-toggle="modal" data-target="#exampleModalCenter" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-desc= "'+item.sup_desc+'" data-mname= "'+item.manager_name+'" data-seid="'+item.eid_sup+'" data-id = "'+item.id+'" data-eid="'+item.eid+'" data-name="'+item.fullname+'"  data-toggle="modal" data-target="#updateUser" id = "editUser" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"><i class="fa fa-edit"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-desc= "'+item.sup_desc+'" data-mname= "'+item.manager_name+'" data-seid="'+item.eid_sup+'" data-id = "'+item.id+'" data-eid="'+item.eid+'" data-name="'+item.fullname+'"  id = "deleteUserBtn" type="button" rel="tooltip" class="btn btn-danger btn-sm  btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                           
                                                
                                            ]
                                            } );
                                        }else{
                                            $('#records').DataTable({"bFilter": false}).clear().draw();
                                        }
                                         
          
           }

    }); }


    $(document).on('click', '#viewUser', function(e) {
  e.preventDefault();
      //var id = $(this).attr("data-id");
      var eid = $(this).attr("data-eid");
      var name = $(this).attr("data-name");
      var seid = $(this).attr("data-seid");
      var mname = $(this).attr("data-mname");
      var desc = $(this).attr("data-desc");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eid").value =eid;
  document.getElementById("name").value = name;
  document.getElementById("seid").value = seid;
  document.getElementById("mname").value = mname;
  document.getElementById("desc").value = desc;
});

$(document).on('click', '#editUser', function(e) {
   e.preventDefault();
  //alert('clicked');
 // document.getElementById("emailError").innerHTML = '';
      //var id = $(this).attr("data-id");
      var eid = $(this).attr("data-eid");
      var name = $(this).attr("data-name");
      var seid = $(this).attr("data-seid");
      var mname = $(this).attr("data-mname");
      var desc = $(this).attr("data-desc");
  // $('#exampleModalCenter').modal('show');
  document.getElementById("eidUpdate").value =eid;
  document.getElementById("nameUpdate").value = name;
  document.getElementById("seidUpdate").value = seid;
  // var string = seid;
  //  var abs = seid.trim();
   //alert(seid);

  //document.getElementById("snameUpdate").value = mname;
  $('#snameUpdate').val(seid.trim());
  // $('#snameUpdate option[value="'+seid+'"]').attr('selected', 'selected');

  // $('#descUpdate').empty();
  $('#descUpdate').val(desc.trim());


});

$(document).ready(function(){
 $.ajax({
  type: 'POST',
  url: '<?=ROOT?>ajax_manager',
  data: {data_type: 'getDesc'},
  dataType: 'json',
  error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
  },
  success: function(response){
    console.log(response);
      $('#descUpdate').empty();
      $('#descUpdate').html(response);
      $('#descNew').empty();
      $('#descNew').html(response);
  }
 });
});

$(document).ready(function(){
 $.ajax({
  type: 'POST',
  url: '<?=ROOT?>ajax_manager',
  data: {data_type: 'getSupervisor'},
  dataType: 'json',
  error: function(xhr, textStatus, errorThrown) {
          console.log(xhr.responseText);
  },
  success: function(response){
    console.log(response);
      $('#snameUpdate').empty();
      $('#snameUpdate').html(response);
      $('#snameNew').empty();
      $('#snameNew').html(response);
  }
 });
});

// $('#descNew').one('click',function(){
//  $.ajax({
//   type: 'POST',
//   url: '<?=ROOT?>ajax_manager',
//   data: {data_type: 'getDesc'},
//   dataType: 'json',
//   error: function(xhr, textStatus, errorThrown) {
//           console.log(xhr.responseText);
//   },
//   success: function(response){
//     console.log(response);
//       $('#descNew').empty();
//       $('#descNew').html(response);
//   }
//  });
// });

// $('#snameNew').one('click',function(){
//  $.ajax({
//   type: 'POST',
//   url: '<?=ROOT?>ajax_manager',
//   data: {data_type: 'getSupervisor'},
//   dataType: 'json',
//   error: function(xhr, textStatus, errorThrown) {
//           console.log(xhr.responseText);
//   },
//   success: function(response){
//     console.log(response);
//       $('#snameNew').empty();
//       $('#snameNew').html(response);
//   }
//  });
// });


$('#snameUpdate').on('change',function(){
document.getElementById("seidUpdate").value = this.value;
});

$('#snameNew').on('change',function(){
document.getElementById("newSeid").value = this.value;
});



$(document).on('submit','#updateUserForm', function(e) {
      e.preventDefault();
      var desc = $('#descUpdate').val();
      var searchFilter =   $('#inputSearch').val();
      // var id = $(this).attr('');
      var data = new FormData($(this)[0]);
      data.append('data_type', 'update');
      data.append('desc',desc);
      var form = $(this);
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax_manager',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown) {
          toastr.error(xhr.responseText);
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
            $('#records').DataTable().destroy();
            fetch(searchFilter);
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
  var searchFilter =   $('#inputSearch').val();
  var id = $(this).attr("data-id");
  // alert(id);
  $.confirm({
    title: 'Delete user supervisor?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: This user supervisor may delete forever. Are you sure you want to continue?</i><br><br><b> ID: ' +id,
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-red',
            action: function(){
              $.ajax({
        type: "POST",
        url: '<?=ROOT?>ajax_manager',
        data: {id: id, data_type: 'delete_supervisor'},
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
            fetch(searchFilter);
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

$(document).on('keyup','#eidUpdate',function(e){
        var eid = this.value.trim();
        //$('#emailUpdate').val('');
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
         
            if(response != false){
              $.each(response, function (key,value){
                //alert(value.fullname);
                $('#nameUpdates').val(value.fullname);
              });}
              else{
                $('#nameUpdates').val('');
              }
             
         
           }
          });
        }

});


   

   
   //fetch('2013','01');
</script>

</body>
</html>