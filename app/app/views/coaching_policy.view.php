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
                                                                <form class="form" method="" action="" id="changeCoachingPolicy" enctype="multipart/form-data">
                                                                <div class="card card-login card-hidden">
                                                                    <div class="card-header card-header-rose text-center">
                                                                    <h4 class="card-title">Edit Coaching Policy</h4>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                    
                                                                    <label for="" class="text-center" id ="coachingPolicy"><b>Current File: <?php if(isset($_SESSION['coachingPolicy'])){echo ($_SESSION['coachingPolicy'][0]->file_name);}else{echo 'No File Found';} ?></label>
                                                                    <span class="bmd-form-group ">
                                                                        <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="file" name="file" id="file" class="form-control" required>
                                                                        </div>
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

    $('#changeCoachingPolicy').on('submit', function(e) {
      e.preventDefault();
      var data = new FormData($(this)[0]);
      data.append('data_type', 'changeCoachingPolicy');
      data.append('id', '<?=$_SESSION['coachingPolicy'][0]->id?>');
      var form = $(this);
      //form.find(':submit').attr('disabled', true);
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
            //form.find('small').text('');
            // If validation error exists
            // for (var key in response) {
            //   var errorContainer = form.find(`#${key}Error`);
            //   if (errorContainer.length !== 0) {
            //     // alert(errorContainer.html(response[key]));
            //     toastr.error(response[key]);
            //     //alert(errorContainer);
            //   }
            // }
          }
          if(response.status ==1){
            form.trigger('reset');
            //form.find('small').text('');
            toastr.success(response.msg);
            document.getElementById('coachingPolicy').innerHTML = 'Current File: '+ response.file_name;
          }
    
        }
      });
    });

    $('#file').on('change',function(){
     // alert('awit');
      var file = this.files[0];
      var fileType = file.type;
      var match=['application/pdf','application/msword','application/vnd.ms-office','application/msexcel'];
        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2])  || (fileType == match[3]) )){
          toastr.warning('Sorry, only PDF file are allowed to upload.');
          $('#file').val('');
          return false;
        }

    });

</script>

</body>
</html>