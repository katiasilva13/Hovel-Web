<?php
//criação do autoloader
spl_autoload_register(function($class_name){ //new Usuario

    $filename = "class" . DIRECTORY_SEPARATOR . $class_name.".php";//Usuario.php

    if (file_exists($filename)){
        require_once($filename);
    }
});
