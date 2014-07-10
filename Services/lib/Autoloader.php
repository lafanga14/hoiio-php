<?php

HoiioService_Autoloader::Register();

class HoiioService_Autoloader
{
    public static function Register() {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }
        return spl_autoload_register(array('HoiioService_Autoloader', 'Load'));
    }   //    function Register()


    /**
     * Autoload a class identified by name
     *
     * @param    string    $pClassName        Name of the object to load
     */
    public static function Load($pClassName){
        if ((class_exists($pClassName,FALSE))) {
            //already loaded 
            return FALSE;
        }

        $pClassFilePath = HoiioService_ROOT . 'lib/' . $pClassName . '.php';
        if ((file_exists($pClassFilePath) === FALSE) || (is_readable($pClassFilePath) === FALSE)) {
            //    Can't load
            return FALSE;
        }

        require($pClassFilePath);
    }   //    function Load()

}


?>
