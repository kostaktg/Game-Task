<?php

function __autoload($cname){
    $myfile = INCLUDE_DIR.$cname.'.php';
    
    if ( file_exists(str_replace('\\','/', $myfile)) ){
        require_once str_replace('\\','/',$myfile);
    }

        unset($myfile);

}

spl_autoload_register('__autoload');