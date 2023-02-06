<?php 

Class Signup extends Controller
{
    public function index()
    {
        
        $data['page_title'] = 'Signup';

    
            $User = $this->load_model("User");
      
        $this->view('signup',$data);
    }
}