<style>
body{
    background: #FF6200;
    background: -webkit-linear-gradient(to right, #FF6200, #FDB777);
	background: linear-gradient(to right, #FF6200, #FDB777);
}

</style>
</head>
<?php $this->view('includes/header',$data)?>

<body class="">
<div class="container-fluid">

  <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto mt-5">
            <form class="form" id="registrationForm">
              
              <div class="card card-login card-hidden">
              
                <div class="card-header card-header-rose text-center">
                <img class="card-img-top " src="../../assets/img/visaya_kpo_logo.png" alt="Logo" style="width: 10rem;">
                  <h4 class="card-title">Registration</h4>
                  <small><i>Note: You must be employee of Visaya KPO and your email address you entered was save on our system. Please contact your system administrator for assistance. </i><br></small>
                </div>
                <div class="card-body ">
                   
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        </span>
                      </div>
                      <input type="text" name="employeeID" class="form-control" placeholder="Employee ID..." required>
                    </div>
                    <small class="text-danger ml-5" id="employeeError"></small>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                      </div>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email..." required>
                    </div>
                    <small class="text-danger ml-5" id="emailError"></small>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Password..." required>
                    </div>
                    <small class="text-danger ml-5" id="passwordError"></small>
                  </span>
               
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                  
                </div>
                <div class="card-footer">
                    <a href="<?=ROOT?>login">Sign in | </a>
                    <a href="<?=ROOT?>reset_password">Reset password </a>
                    </div>
              </div>
            </form>
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
     $('#registrationForm').on('submit', function(e) {
      e.preventDefault();
      var email = $('#email').val();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'signup');
      var form = $(this);
      form.find(':submit').attr('disabled', true);
      //var url = "/php_tutorial/change_password.php";
      $.ajax({
        type: 'POST',
        url: '<?=ROOT?>reset',
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
                toastr.error(response.msg)
                //alert(errorContainer);
              }
            }
          }
          if (response.status == 1) {
            form.trigger('reset');
            form.find('small').text('');
            toastr.success(response.msg);
            window.location.href = '<?=ROOT?>'+ 'thankyou?email=' +email;
           // console.log(response);
//       $.confirm({
//         icon: 'fa fa-check',
//     title: 'Password changed successfully!',
//     content: 'You wish to logout your session?',
//     type: 'green',
//     typeAnimated: true,
//     buttons: {
//         tryAgain: {
//             text: 'Confirm',
//             btnClass: 'btn-success',
//             action: function()
//             {
//                 window.location.href =login';
//             }
//         },
//         No: function () {
//         }
//     }
// });
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

  <!-- end  core js files-->
  </body>
  </html
  