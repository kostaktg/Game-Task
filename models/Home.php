<?php


class Home{
    private static $instance = false;
    private $db;

    function __construct(){
        $this->db     = Model::getInstance();
    }


    public static function getInstance() {
		if (!self::$instance)
			self::$instance =  new self();

	return self::$instance;
	}

    public function index(){

        $db = Model::getInstance();
        $db->query('SELECT * FROM users');
        $rows = $db->resultset();
  
    return $rows;
        
    }
}