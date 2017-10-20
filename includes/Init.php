<?php 





class Init{
    protected $router;
    private static $instance = false;
    private $controller, $action, $request;



// Check if is exists method and action 
    public function __construct($request){

        //------- ruter ---------
        $this->router = Router::getInstance();
        $this->router->getController();
        $router = $this->router->args;
        //------- ruter END---------

        $this->request = $request;

        //default controller homeController 
        if($this->router->controller == ""){
            $this->controller = 'homeController';
        } else {
            // init controller
             $this->controller = $this->router->controller;
        }
        //default action
        if($this->router->action == ""){
            $this->action = 'index';
        } else {
            // init action
            $this->action = $this->router->action;
        }
        // constructor ready
        echo 'construct ready<br />';
        var_dump($request);
    }



// -------INSTANCE----------
    public static function getInstance() {
		if (!self::$instance)
			self::$instance =  new self($_GET);

		return self::$instance;
	}




    //------------- create controller --------------
    public function createController(){

        //Check is it a class exists
    
        if(class_exists($this->controller)){
            $parent = class_parents($this->controller);
          
            //Check Extend
            if(in_array("Controller", $parent)){
                //Check is action exists
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else {
                    //Method does not exist
                    echo '<h1>Method does not exists</h1>';
                    return;
                }
            } else {
                // Base controller not found
                echo '<h1>Base controller does not found or does not Extended</h1>';
                return;
            }


        } else {
            // Controller Class Does Not Exist
            echo '<h1>Controller class does not exist</h1>';
            return;
        }


    }




}