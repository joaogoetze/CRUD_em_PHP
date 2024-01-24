<?php

spl_autoload_register(function($class_name)
{
    $filename = "../".$class_name.".php";

    if(file_exists(($filename)))
    {
        require_once($filename);
    }
    else if(file_exists('Classes/'.$class_name.'.php'))
    {
        require_once('Classes/'.$class_name.'.php');
    }
    else
    {
        require_once('../Classes/'.$class_name.'.php');
    }
});
  
?>