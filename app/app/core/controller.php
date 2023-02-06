<?php 

/**
 * main controller class
 */

 class Controller 
 {
    public function view($view,$data = [])
    {
        extract($data);
        $filename = "../app/views/" . $view . ".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }
        else
        {
            include '../app/views/404.php';
        }

    }
    public function load_model($model)
    {
        if (file_exists("../app/models/" . strtolower($model) . ".class.php"))
        {
            include "../app/models/" . strtolower($model) . ".class.php";
            return $a = new $model();
        }    
        return false;
        
    }

 }