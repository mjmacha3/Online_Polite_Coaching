<div class="sidebar" data-color="orange">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a href="<?=ROOT?>home" class="simple-text logo-mini">
              PC
          </a>

          <a href="<?=ROOT?>home" class="simple-text logo-normal">
            <?=APP_NAME?>
          </a>
      </div>
 
      
        
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="nav-item <?= $data['page_title'] == 'Home' ? ' active' : ' '; ?>">
              <a href="<?=ROOT?>home" class="nav-link">

                    <i class="now-ui-icons design_app"></i>

                  <p>Dashboard</p>
              </a>
          </li>
        <?php if($_SESSION['access_type'] != 'Agent'):?>
          <li >
          <a data-toggle="collapse" href="#formsExamples" aria-expanded="true">
                    <i class="now-ui-icons files_box"></i>
                    <p> Coaching Session
                    <b class="caret"></b>
                    </p>
                    </a>

                    <div class="collapse <?= ($data['page_title'] == 'Coaching Session' || $data['page_title'] == 'Coaching List' )  ? ' show' : ' '; ?>" id="formsExamples" aria-expanded="true" style="">
                      <ul class="nav">
                      <li class="nav-item <?= $data['page_title'] == 'Coaching List' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>coachinglist" class="nav-link">
                      <span class="sidebar-mini"><i class="now-ui-icons design_bullet-list-67"></i></span>
                      <span class="sidebar-normal"> List </span>
                      </a>
                      </li >
                      <li class="nav-item <?= $data['page_title'] == 'Coaching Session' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>coaching" class="nav-link">
                      <span class="sidebar-mini"><i class="now-ui-icons ui-1_simple-add"></i></span>
                      <span class="sidebar-normal"> New Forms </span>
                      </a>
                      </li>
                      </ul>
                    </div>
          </li>

          <li >
          <a data-toggle="collapse" href="#formsReports" aria-expanded="true" >
          <i class="fa fa-file" aria-hidden="true"></i>
                    <p> Reports
                    <b class="caret"></b>
                    </p>
                    </a>

                    <div class="collapse <?= ($data['page_title'] == 'Report | Annual' || $data['page_title'] == 'Report | Monthly' || $data['page_title'] == 'Report | Quarter' )  ? ' show' : ' '; ?>" id="formsReports" aria-expanded="true" style="">
                      <ul class="nav">
                      <li class="nav-item <?= $data['page_title'] == 'Report | Annual' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>annual" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Annual </span>
                      </a>
                      </li >
                      <li class="nav-item <?= $data['page_title'] == 'Report | Quarter' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>quarter" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Quarter </span>
                      </a>
                      </li>
                      <li class="nav-item <?= $data['page_title'] == 'Report | Monthly' ? ' active' : ' '; ?>">

                      <a href="<?=ROOT?>monthly" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Monthly </span>
                
                      </a>  
                      </li>
                      </ul>
                    </div>
          </li>
          <?php endif;?>
          <li class="nav-item <?= $data['page_title'] == 'Acknowledgement | Logs' ? ' active' : ' '; ?>">
              <a href="<?=ROOT?>acknowledge" class="nav-link">

              <i class="fa fa-handshake-o" aria-hidden="true"></i>

                  <p>Acknowledgement | Logs</p>
              </a>
          </li>
          <?php if($_SESSION['access_type'] != 'Agent'):?>
          <li >
          <a data-toggle="collapse" href="#formsReports2" aria-expanded="true" >
          <i class="fa fa-folder-o" aria-hidden="true"></i>
                    <p> Reports Summary
                    <b class="caret"></b>
                    </p>
                    </a>

                    <div class="collapse <?= ($data['page_title'] == 'Summary | Annual' || $data['page_title'] == 'Summary | Monthly' || $data['page_title'] == 'Summary | Quarter' )  ? ' show' : ' '; ?>" id="formsReports2" aria-expanded="true" style="">
                      <ul class="nav">
                      <li class="nav-item <?= $data['page_title'] == 'Summary | Annual' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>summary_annual" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Annual </span>
                      </a>
                      </li >
                      <li class="nav-item <?= $data['page_title'] == 'Summary | Quarter' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>summary_quarter" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Quarter </span>
                      </a>
                      </li>
                      <li class="nav-item <?= $data['page_title'] == 'Summary | Monthly' ? ' active' : ' '; ?>">

                      <a href="<?=ROOT?>summary_monthly" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Monthly </span>
                
                      </a>  
                      </li>
                      </ul>
                    </div>
          </li>
          <?php endif; ?>
          <?php if($_SESSION['access_type'] == 'Full'): ?>
          <li >
          <a data-toggle="collapse" href="#formsReports3" aria-expanded="true" >
          <i class="fa fa-cog" aria-hidden="true"></i>
                    <p> Settings
                    <b class="caret"></b>
                    </p>
                    </a>

                    <div class="collapse <?= ($data['page_title'] == 'Settings | Root Category List' || $data['page_title'] == 'Settings | Sub Category List' || $data['page_title'] == 'Settings | Category List' || $data['page_title'] == 'Settings | Supervisor List' || $data['page_title'] == 'Settings | User - Supervisors' || $data['page_title'] == 'Settings | Sub Category' || $data['page_title'] == 'Settings | Coaching Policy' || $data['page_title'] == 'Settings | Users' || $data['page_title'] == 'Settings | Email Address' )  ? ' show' : ' '; ?>" id="formsReports3" aria-expanded="true" style="">
                      <ul class="nav">
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Users' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>users" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Users </span>
                      </a>
                      </li >
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Coaching Policy' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>coaching_policy" class="nav-link">
                      <span class="sidebar-mini">
                      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Coaching Policy</span>
                      </a>
                      </li>
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Email Address' ? ' active' : ' '; ?>">

                      <a href="<?=ROOT?>email_address" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Email Address </span>
                
                      </a>  
                      </li>


                      <li class="nav-item <?= $data['page_title'] == 'Settings | User - Supervisors' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>manager" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-address-book" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> User - Supervisors </span>
                      </a>  
                      </li>

                      <li class="nav-item <?= $data['page_title'] == 'Settings | Supervisor List' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>supervisors" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-group" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Supervisor List </span>
                      </a>  
                      </li>

                      
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Category List' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>category" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-list-ul" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Category List </span>
                      </a>  
                      </li>


                      
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Sub Category List' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>subcategory" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-list-ul" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Sub Category List </span>
                      </a>  
                      </li>

                      
                      <li class="nav-item <?= $data['page_title'] == 'Settings | Root Category List' ? ' active' : ' '; ?>">
                      <a href="<?=ROOT?>rootcategory" class="nav-link" >
                      <span class="sidebar-mini">
                      <i class="fa fa-list-ul" aria-hidden="true"></i>
                      </span>
                      <span class="sidebar-normal"> Root Cause Category List </span>
                      </a>  
                      </li>



                      </ul>
                    </div>
          </li>
         <?php endif; ?>
          
          
        </ul>
      </div>
    </div>



    