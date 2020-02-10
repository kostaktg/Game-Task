<?php 

namespace App\Helpers;

use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;

class JsonHelper {

     protected $json;

    public function __construct(){

    }


    // Get Json.json
    public function get_my_json($path){  
        $json = file_get_contents($path);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($json, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

        $this->json = iterator_to_array($jsonIterator);    

        return $this->json;
    }


}
