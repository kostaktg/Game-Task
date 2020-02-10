<?php

use Core\Init;

//autoload
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__).'/Autoload.php';


//controllers
require_once INCLUDE_DIR.'App/Controllers/HomeController.php';

//Models
//Helpers
require_once INCLUDE_DIR.'App/Helpers/JsonHelper.php';
require_once INCLUDE_DIR.'App/Helpers/GameHelper.php';


//  --------- INDEX LOAD CONTROLLER  -------------

$init = new Init();

