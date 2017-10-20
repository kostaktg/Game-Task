<?php


class Router {

    private static $instance;
    private $path, $noerr;
    public $args = array() , $file, $controller, $action;


    function __construct(){
    }



    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new router();
        }

        return self::$instance;
    }


    public function getController(){
        // get the route from the url
        $route = empty($_GET['vars']) ? (empty($_GET['var']) ? '' : $_GET['var']
        ) : $_GET['vars'];

        if (empty($route))
            $route = 'index';
        else {
            // get parts of the route
            $parts = explode('/', $route);
            $this->controller = $parts[0];
            if(isset( $parts[1]))
            $this->action = $parts[1];
            $this->args = $parts;
        }

        if (empty($this->controller))
            $this->controller = '';

        
        // Get action
        if (empty($this->action))
            $this->action = '';

        // set the file path
        $this->file = 'controllers/'.$this->controller.'.php';
    }







}