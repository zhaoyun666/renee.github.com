<?php
class ComposerAutoloaderInitd59406a7bad17c8b067413ab4144304a{
    
    public static function getLoader(){
        spl_autoload_register(function ($pClassName)
        {
            // Looping through each directory to load all the class files. It will only require a file once.
            // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
            $className = str_replace("\\", "/", $pClassName);
            $parts = explode("/", $className);
            
            $newClassName = "";
            foreach ($parts as $key => $part) {
                //             if ($key == 0) {
                //                 $part = strtolower($part);
                //             }
                $newClassName .= "/".$part;
            }
            
            if (file_exists(ROOTDIR . $newClassName . '.php')) {
                require_once (ROOTDIR . $newClassName . '.php');
                return;
            }
        });
    }
}