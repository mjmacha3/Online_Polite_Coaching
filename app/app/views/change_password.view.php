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
                                                         <div class="container-fluid">
                                                            <div class="row">
                                                            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                                                                <form class="form" method="" action="" id="changePasswordForm">
                                                                <div class="card card-login card-hidden">
                                                                    <div class="card-header card-header-rose text-center">
                                                                    <h4 class="card-title">Change Password</h4>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                    <span class="bmd-form-group ">
                                                                        <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="password" name="old_pass" class="form-control " placeholder="Old Password..." required>
                                                                        </div>
                                                                        <small class="text-danger ml-5" id="oldPasswordError"></small>
                                                                    </span>
                                                                    <span class="bmd-form-group">
                                                                        <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="password" name="new_pass" class="form-control" placeholder="New Password..." required>
                                                                        </div>
                                                                        <small class="text-danger ml-5" id="passwordError"></small>
                                                                    </span>
                                                                    <span class="bmd-form-group">
                                                                        <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="password" name="retype_new" class="form-control" placeholder="Confirm New Password..." required>
                                                                        </div>
                                                                        <small class="text-danger ml-5" id="cPasswordError"></small>
                                                                    </span>
                                                                    </div>
                                                                    <div class="card-footer justify-content-center">
                                                                    <button type="submit" href="#pablo" class="btn btn-primary btn-block">Save Changes</button>
                                                                    </div>
                                                                </div>
                                                                </form>
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

<script>

    $('#changePasswordForm').on('submit', function(e) {
      e.preventDefault();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'changePassword');
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

      $.confirm({
        icon: 'fa fa-check',
    title: 'Password changed successfully!',
    content: 'You wish to logout your session?',
    type: 'green',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function()
            {
                window.location.href = '<?=ROOT?>login';
            }
        },
        No: function () {
        }
    }
});
            //toastr.success(response.msg);
            // handling success respone
            //window.location.href = '/php_tutorial/login.php';
          } else if (response.status == 0) {
            // Handling failure response
            //console.login(response.msg);
          }
        }
      });
    });

</script>

</body>
</html>