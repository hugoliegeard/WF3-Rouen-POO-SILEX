<?php

class Autoloader {

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class) {
        echo 'Autoload pour : ';
            print_r($class);
        echo '<br>';
        $class  = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require PATH_ROOT . '/' . $class . '.php';
    }

}