<?php

Class Report_ajax extends Controller
{
    public function index()

    {
        if(!isset($_POST['data_type'])){

            $data['page_title'] = 'PAGE NOT FOUND';
            $this->view('404',$data);
          }
        // $User = $this->load_model('User');
          $db = Database::getInstance();
                    $cond = ' ';
                    $cond1 = ' ';
                    $where = ' ';
               
                if ($_POST['data_type'] == 'quarter' || $_POST['data_type'] == 'monthly' || $_POST['data_type'] == 'annual')
                {
                    $data['date_year'] = $_POST['date_year'];
                   
                    // $User = $this->load_model('User');
                    // $get_data = $User->get_info($_POST);
                    if($_POST['data_type']=='quarter')
                    { 
                        $data['date_month'] = $_POST['date_month'];
                        $where = ' and DATEPART(QUARTER, CoachingDate)=:date_month ';
                    }
                    if($_POST['data_type'] =='monthly')
                    {
                        $data['date_month'] = $_POST['date_month'];
                        $where = ' and Month(coachingDate)=:date_month ';
                    }

                    if($_SESSION['access_type']=='Admin')
                    {   $data['department'] = trim($_SESSION['user_data'][0]->Department) . '%';
                        $cond = " and Department like :department ";
                    }
                    if($_SESSION['access_type']=='Limited')
                    {
                        $data['name'] = $_SESSION['user_data'][0]->fullname;
                        $cond = " and CoachedBy = :name ";
                    }
                    
                    $query = "SELECT CoachingDate, Name, startDate, Department, Designation, Supervisor, CoachingCategory, subcategory,
                    RootCauseCategory,FUCoachingDate, ItemDiscussion, RootCause,Effect, EmployeeActionPlan, SupervisorActionPlan, 
                     EffectiveDateEAP, EffectiveDateSAP,CoachedBy,ScanId, Site, CoachingNo, coachee_email,coach_email,Acknowledge_date,coachingID
                    from tblCoachingMaster2 
                    WHERE status = 'ACTIVE' and Year(CoachingDate)=:date_year ". $where . $cond . " ORDER BY coachingdate DESC";
                     $get_data = $db->read($query,$data);
                        echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                    
                }

            

                if ($_POST['data_type'] == 'summary_quarter' || $_POST['data_type'] == 'summary_monthly' || $_POST['data_type'] == 'summary_annual')
                {
                    $data['date_year'] = $_POST['date_year'];
                    $data['date_year1'] = $_POST['date_year'];
             
                    // $User = $this->load_model('User');
                    // $get_data = $User->get_info($_POST);
                   
                    $where1 = ' ';
                  
                 
                    if($_SESSION['access_type']=='Admin')
                    {  
                        $data['department'] = trim($_SESSION['user_data'][0]->Department) . '%';
                         $data['department1'] = $data['department'];
                        $cond = " and Department like :department ";
                        $cond1 =  " and Department like :department1 ";
                    }elseif($_SESSION['access_type']=='Limited')
                    {
                        $data['name'] = $_SESSION['user_data'][0]->fullname;
                        $data['name1'] = $data['name'];
                        $cond = " and CoachedBy = :name ";
                        $cond1 = " and CoachedBy = :name1 ";
                    }

                    if($_POST['data_type']=='summary_quarter')
                    {       $data['date_month'] = $_POST['date_month'];
                        $data['date_month1'] = $_POST['date_month'];
                        $where = ' and DATEPART(QUARTER, CoachingDate)=:date_month ';
                        $where1 = ' and DATEPART(QUARTER, CoachingDate)=:date_month1 ';
                    }
                    elseif($_POST['data_type']=='summary_monthly')
                    {   $data['date_month'] = $_POST['date_month'];
                        $data['date_month1'] = $_POST['date_month'];
                        $where = ' and Month(coachingDate)=:date_month ';
                        $where1 = ' and Month(coachingDate)=:date_month1 ';
                    }

               
    
            $query = "select 
            Department as Department1,
            sum(case when RootCauseCategory='People' then 1 else 0 end) as People,
            sum(case when RootCauseCategory='Process' then 1 else 0 end) as Process,
            sum(case when RootCauseCategory='Technology' then 1 else 0 end) as Technology,
            sum(case when CoachingCategory='Behavioral Assessment' then 1 else 0 end) as [Behavioral Assessment],
            sum(case when CoachingCategory='Productivity Review' then 1 else 0 end) as [Productivity Review],
            sum(case when CoachingCategory='Performance Update' then 1 else 0 end) as [Performance Update],
            sum(case when CoachingCategory='Quality Assurance Evaluation Scores Discussion' then 1 else 0 end) as [Quality Assurance Evaluation Scores Discussion],
            sum(case when SubCategory = 'Client Escalation' then 1 else 0 end) as [Client Escalation],
            sum(case when SubCategory = 'Touchpoint' then 1 else 0 end) as [Touchpoint],
            sum(case when SubCategory = 'Compliance' then 1 else 0 end) as [Compliance],
            sum(case when SubCategory = 'DSAT' then 1 else 0 end) as [DSAT],
            sum(case when SubCategory = 'CSAT' then 1 else 0 end) as [CSAT],
            sum(case when SubCategory = 'PIP' then 1 else 0 end) as [PIP],
            sum(case when SubCategory = 'COD' then 1 else 0 end) as [COD],
            sum(case when SubCategory = 'Scorecard' then 1 else 0 end) as [Scorecard],
            sum(case when SubCategory = 'ZTP' then 1 else 0 end) as [ZTP],
            sum(case when SubCategory = 'Attendance' then 1 else 0 end) as [Attendance],
            sum(case when SubCategory = 'Productivity' then 1 else 0 end) as [Productivity],
            sum(case when SubCategory = 'QA' then 1 else 0 end) as [QA],
            sum(case when SubCategory = 'KPI - Verified Leads' then 1 else 0 end) as [KPI - Verified Leads],
            sum(case when SubCategory = 'KPI - Conversion' then 1 else 0 end) as [KPI - Conversion],
            sum(case when SubCategory = 'KPI - External Errors' then 1 else 0 end) as [KPI - External Errors],
            sum(case when SubCategory = 'KPI - Accuracy' then 1 else 0 end) as [KPI - Accuracy],
            sum(case when SubCategory = 'KPI - General' then 1 else 0 end) as [KPI - General],
            sum(case when SubCategory = 'N/A' then 1 else 0 end) as [N/A]
            from tblCoachingMaster2
            where 1=1 and status='ACTIVE' and Year(CoachingDate) =:date_year ". $where . $cond ."
            group by Department
            union all 
            select 
            'Total' as Department1,
            sum(case when RootCauseCategory='People' then 1 else 0 end) as People,
            sum(case when RootCauseCategory='Process' then 1 else 0 end) as Process,
            sum(case when RootCauseCategory='Technology' then 1 else 0 end) as Technology,
            sum(case when CoachingCategory='Behavioral Assessment' then 1 else 0 end) as [Behavioral Assessment],
            sum(case when CoachingCategory='Productivity Review' then 1 else 0 end) as [Productivity Review],
            sum(case when CoachingCategory='Performance Update' then 1 else 0 end) as [Performance Update],
            sum(case when CoachingCategory='Quality Assurance Evaluation Scores Discussion' then 1 else 0 end) as [Quality Assurance Evaluation Scores Discussion],
            sum(case when SubCategory = 'Client Escalation' then 1 else 0 end) as [Client Escalation],
            sum(case when SubCategory = 'Touchpoint' then 1 else 0 end) as [Touchpoint],
            sum(case when SubCategory = 'Compliance' then 1 else 0 end) as [Compliance],
            sum(case when SubCategory = 'DSAT' then 1 else 0 end) as [DSAT],
            sum(case when SubCategory = 'CSAT' then 1 else 0 end) as [CSAT],
            sum(case when SubCategory = 'PIP' then 1 else 0 end) as [PIP],
            sum(case when SubCategory = 'COD' then 1 else 0 end) as [COD],
            sum(case when SubCategory = 'Scorecard' then 1 else 0 end) as [Scorecard],
            sum(case when SubCategory = 'ZTP' then 1 else 0 end) as [ZTP],
            sum(case when SubCategory = 'Attendance' then 1 else 0 end) as [Attendance],
            sum(case when SubCategory = 'Productivity' then 1 else 0 end) as [Productivity],
            sum(case when SubCategory = 'QA' then 1 else 0 end) as [QA],
            sum(case when SubCategory = 'KPI - Verified Leads' then 1 else 0 end) as [KPI - Verified Leads],
            sum(case when SubCategory = 'KPI - Conversion' then 1 else 0 end) as [KPI - Conversion],
            sum(case when SubCategory = 'KPI - External Errors' then 1 else 0 end) as [KPI - External Errors],
            sum(case when SubCategory = 'KPI - Accuracy' then 1 else 0 end) as [KPI - Accuracy],
            sum(case when SubCategory = 'KPI - General' then 1 else 0 end) as [KPI - General],
            sum(case when SubCategory = 'N/A' then 1 else 0 end) as [N/A]
            from tblCoachingMaster2
            where 1=1 and status='ACTIVE' and Year(CoachingDate) =:date_year1 ". $where1 . $cond1;
                        $get_data = $db->read($query,$data);

                        echo json_encode($get_data,JSON_INVALID_UTF8_IGNORE);
                    
                }


            
            
        
        
        
        
    }
}