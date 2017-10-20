<?php

//autoload
require_once dirname(__FILE__).'/Config.php';


// includes
require_once INCLUDE_DIR.'/includes/Template.php';
require_once INCLUDE_DIR.'/includes/Router.php';
require_once INCLUDE_DIR.'/includes/Init.php';
require_once INCLUDE_DIR.'/includes/Controller.php';
require_once INCLUDE_DIR.'/includes/Model.php';



//controllers
require_once INCLUDE_DIR.'/controllers/homeController.php';
require_once INCLUDE_DIR.'/controllers/usersController.php';
require_once INCLUDE_DIR.'/controllers/boxController.php';

//Models
require_once INCLUDE_DIR.'/models/Home.php';
require_once INCLUDE_DIR.'/models/Box.php';

//  --------- INDEX LOAD CONTROLLER  -------------
$init = Init::getInstance();
$controller = $init->createController();

if($controller){
    $controller->executeAction();
}
