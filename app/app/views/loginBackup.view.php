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
    <div class="row ">
        <div class="cols mx-auto mt-5">
                    <div class="card text-center" style="width: 30rem;">
                    <img class="card-img-top " src="<?=ROOT?>/assets/images/visaya_kpo_logo.png" alt="Logo" style="width: 10rem;">
                    <div class="card-body">
                        <h4 class="card-title">Login to Your Account</h4>
                        
                                <form method="POST">
                           
                                <div class="form-group">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons users_single-02"></i>
                                        </div>      
                                        </div>
                                    <!-- <label for="employeeID">Employee ID</label> -->
                                    <input type="text" value = "<?= set_value('employeeID') ?>" name="employeeID" class="form-control validateUser validateEmployeeID" id="employeeID" aria-describedby="emailHelp" placeholder="Enter employee id" required>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </div>      
                                        </div>
                                    <!-- <label for="exampleInputPassword1">Password</label> -->
                                    <input  type="password" value = "<?= set_value('password') ?>" name="password" class="form-control validateUser validatePassword" id="password" placeholder="Password" required>
                                </div>
                                </div>
                                <span><h6 style="color:#FF6200"><?php check_error(); ?></h6> </span> 
                                <button type="submit" class="btn btn-primary btn-lg btnSubmit">Submit</button>
                                </form>
                      
                    </div>
                    </div>
        </div>
    </div>
        
</div>

  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>


  <!-- end  core js files-->
  </body>
  </html
  