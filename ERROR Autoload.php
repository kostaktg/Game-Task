<?php
require_once 'Config.php';


function __autoload($cname){
    $myfile = INCLUDE_DIR.$cname.'.php';
    if ( file_exists($myfile) )
        require_once $myfile;

        unset($myfile);

}

spl_autoload_register('__autoload');