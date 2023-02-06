 <!-- Navbar -->
 
 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="<?=$_SERVER['REQUEST_URI']?>"><?=$data['page_title']?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

          <?php if(isset($_SESSION['user_data'])): ?>
            <ul class="navbar-nav">
            <li class="nav-item dropdown ">
                <a class="nav-link "  data-toggle="dropdown"   title="Notifications" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell" aria-hidden="true"></i>
                  <p>
                  <span class="badge rounded-pill badge-notification bg-danger count" style="border-radius:10px;"></span>
   
                  </p>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right p-3"  style= "width:250px;" id="navbarDropdownToggle" aria-labelledby="navbarDropdownMenuLink1">

             

                </div>
               
              </li>
              <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <p>
                    <span class=""><?= $_SESSION['user_data'][0]->fullname?></span>
                  </p>
                  <i class="now-ui-icons users_single-02"></i>
                </a>
               
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../../assets/pdf/<?=$_SESSION['coachingPolicy'][0]->file_name?>" target="_blank" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Coaching Policy 
                 </a>
              
                  <a class="dropdown-item" href="<?=ROOT?>profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                  <a class="dropdown-item" href="<?=ROOT?>change_password"><i class="fa fa-key" aria-hidden="true"></i> Change password</a>
                  <a class="dropdown-item" href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </div>
              </li>
               
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->