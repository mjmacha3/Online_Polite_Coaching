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
          <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto mt-5">
            <form class="form"id="registrationForm">
              
              <div class="card card-login card-hidden">
              
                <div class="card-header card-header-rose text-center">
                <img class="card-img-top " src="../../assets/img/visaya_kpo_logo.png" alt="Logo" style="width: 10rem;">
                  <h4 class="card-title">Thank you!</h4>
                </div>
                <div class="card-body ">
                <p>Please check your email: <b><?=isset($_GET['email'])?$_GET['email']:'';?> </b> for further instruction on how to complete your account setup.</p>
                </div>
                <div class="card-footer text-left" >
                    <a href="<?=ROOT?>login">Sign In </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    
        
</div>

  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>



  <!-- end  core js files-->
  </body>
  </html
  