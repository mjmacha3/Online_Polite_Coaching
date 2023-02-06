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
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="card card-user">
                                                        <div class="image">
                                                            <img src="../../assets/img/bg5.jpg" alt="...">
                                                        </div>
                                                        <div class="card-body">
                                                              <div class="author">
                                                                <a href="#">
                                                                  <img class="avatar border-gray" src="../../assets/img/default-avatar.png" alt="...">
                                                                  <h5 class="title" id="lblFullname"><?= $_SESSION['user_data'][0]->fullname ?></h5>
                                                                </a>
                                                                <p class="description text-center" id="lblEmployeeID"><?= $_SESSION['user_data'][0]->employee_id ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDesignation"><?= $_SESSION['user_data'][0]->position ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDepartment"><?= $_SESSION['user_data'][0]->Department ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblSite"><?= $_SESSION['user_data'][0]->Supervisor ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblDateHire"><?= $_SESSION['user_data'][0]->Location ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblEmailAddress"><?= date('m/d/y',strtotime($_SESSION['user_data'][0]->DateLock)) ?>
                                                                </p>
                                                                <p class="description text-center"  id="lblEmailAddress"><?= $_SESSION['user_data'][0]->email_address ?>
                                                                </p>
                                                              </div>
                                                          
                                                        </div>
                                                        <hr>
                                                     
                                                        </div>
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


</script>

</body>
</html>