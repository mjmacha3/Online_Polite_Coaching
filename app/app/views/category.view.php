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
                          <button id="newBtn" class="btn btn-primary" data-toggle="modal" data-target="#modalID"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Enter New</button>
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



<!-- Modal -->
<div class="modal fade" id="modalID" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title text-center  w-100" id="exampleModalLongTitle">
          </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class = "form " id= "form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ID</label>
            <input type="text" class="form-control" id="inputID" name="inputID" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="inputName" name="inputName" required>
          </div>
          <small class="text-danger" id="emailError"></small>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="saveBtn">Save Changes</button>
        <button type="button" class="btn btn-secondary" id="closeBtn" data-dismiss="modal">Close</button>
       
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
  var title = '';
  fetch();
});





  function fetch(){
    
     //$.noConflict();
    $.ajax({
        url: "<?=ROOT?>ajax_category",
        type: "POST",
        data: {data_type: 'filterTable'},
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
                                              
                                                { title: 'ID',data: 'CatID' },
                                                { title: 'Name',data: 'Category' },
                                                {data: null, render: function(item){return '<button data-id = "'+item.CatID+'" data-name="'+item.Category+'" id = "viewBtn" data-toggle="modal" data-target="#modalID" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"><i class="now-ui-icons users_single-02"></i></button>'}},
                                                {data: null, render: function(item){return '<button data-id = "'+item.CatID+'" data-name="'+item.Category+'" data-toggle="modal" data-target="#modalID" id = "updateBtn" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"><i class="fa fa-edit"></i></button>'}},
                                                {data: null, render: function(item){return '<button value="'+item.CatID+'" data-name="'+item.Category+'" id = "deleteBtn" type="button" rel="tooltip" class="btn btn-danger btn-sm  btn-round btn-icon"><i class="now-ui-icons ui-1_simple-remove"></i></button>'}},
                           
                                                
                                            ]
                                            } );
                                            
          
           }

    }); }


    $(document).on('click', '#newBtn', function(e) {
  e.preventDefault();
//alert('clicked');
var form = $('#form');
  form.find('small').text('');
$('#inputID').prop('readonly', true);
$('#inputID').removeProp('required');
$('#exampleModalLongTitle').text('New Category');
title = 'New Category';
$('#inputID').val('');
$('#inputName').val('');
// ('#saveBtn').show();
$('#saveBtn').attr('disabled',false);
});

$(document).on('click', '#viewBtn', function(e) {
   e.preventDefault();
   var form = $('#form');
  form.find('small').text('');
   $('#inputID').prop('readonly', false);
// $('#inputID').removeProp('readonly');
$('#exampleModalLongTitle').text('View Category');
$('#inputID').val($(this).attr('data-id'));
$('#inputName').val($(this).attr('data-name'));
// $('#saveBtn').hide();
$('#saveBtn').attr('disabled',true);


});


$(document).on('click', '#updateBtn', function(e) {
   e.preventDefault();
   var form = $('#form');
  form.find('small').text('');
   $('#inputID').prop('readonly', true);
 $('#inputID').removeProp('required');
$('#exampleModalLongTitle').text('Update Category');
$('#inputID').val($(this).attr('data-id'));
$('#inputName').val($(this).attr('data-name'));
title = 'Update Category';
$('#saveBtn').attr('disabled',false);
// ('#saveBtn').show();

});


$(document).on('submit','#form',function(e){
  e.preventDefault();
  if (title=='New Category')
  {
    var data_type = 'create';
  }
  if(title =='Update Category')
  {
    var data_type = 'update';
  }
  var data = new FormData($(this)[0]);
      data.append('data_type', data_type);
      var form = $(this);
      form.find(':submit').attr('disabled', true);
  $.ajax({
        type: 'POST',
        url: '<?=ROOT?>ajax_category',
        data: data,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        error: function(xhr, textStatus, errorThrown){
          toastr.error(xhr.responseText);
        },
        success: function(response){
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
            $('#closeBtn').click();
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


$(document).on("click","#deleteBtn",function(e){
  e.preventDefault();
  var id = (this).value;
  var name = $(this).attr('data-name');
  // alert(id);
  $.confirm({
    title: 'Delete category?',
    escapeKey: true,
    backgroundDismiss: true,
    content: '<i>Note: This category may delete forever. Are you sure you want to continue?</i><br><br><b> ID: ' +id + '<br> Name: '+ name,
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-red',
            action: function(){
              $.ajax({
        type: "POST",
        url: '<?=ROOT?>ajax_category',
        data: {inputID: id, data_type: 'delete'},
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



   
   //fetch('2013','01');
</script>

</body>
</html>