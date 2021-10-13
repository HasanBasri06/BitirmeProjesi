<?php

    spl_autoload_register(function ($class_name) {

        $pathController =  "Http/Controller/" . ucwords($class_name) . '.basri.php';
        $pathLogger     =  "Http/Controller/Logger" . ucwords($class_name) . '.basri.php';
        $pathAdmin      =  "Http/Controller/Admin" . ucwords($class_name) . '.basri.php';

        if(!file_exists($pathController)){
            include $pathController;
        }
        else if(!file_exists($pathController)){
            include $pathLogger;
        }
        else if(!file_exists($pathAdmin)){
            include $pathAdmin;
        }




    });