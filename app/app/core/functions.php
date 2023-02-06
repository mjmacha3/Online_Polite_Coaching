<?php

function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function set_value($key)
{
    if(!empty($_POST[$key])){
        return $_POST[$key];

    }
    return '';
}

function check_error()
{
    if(isset($_SESSION['errors']) && $_SESSION['errors'] != "")
    {
        echo $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
}