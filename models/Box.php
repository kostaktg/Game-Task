<?php


class Box{
    private static $instance = false;
    private $db;

    function __construct(){
        $this->db     = Model::getInstance();
    }

// -------INSTANCE----------
    public static function getInstance() {
		if (!self::$instance)
			self::$instance =  new self();

		return self::$instance;
	}

    public function index(){

        $db = Model::getInstance();
        $db->query('SELECT * FROM boxes');
        $rows = $db->resultset();
    
    return $rows;
        
    }
}