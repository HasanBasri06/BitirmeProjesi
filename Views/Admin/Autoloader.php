<?php

    spl_autoload_register(function ($class_name) {
        include "../../Http/Controller/Admin/" . $class_name . ".basri.php"; 
    });
