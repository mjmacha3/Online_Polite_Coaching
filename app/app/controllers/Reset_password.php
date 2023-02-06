<?php 

Class Reset_password extends Controller
{
    public function index()
    {
        
        $data['page_title'] = 'Reset Password';

    
         $User = $this->load_model("User");
      
        $this->view('reset',$data);
    }
}