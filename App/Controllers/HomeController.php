<?php

namespace App\Controllers;

use Core\Controller;
use App\Helpers\JsonHelper;
use App\Helpers\GameHelper;



class HomeController extends Controller{

    protected $reels = 0;
    protected $visible_symbols = 0;
    protected $current_visible_reels = [];

    public function index(){
        $this->smarty->show('spin');
    }

    // Spin
    public function spin(){

        $json_helper = new JsonHelper;
        $json = $json_helper->get_my_json("Json.json");


        $game_helper = new GameHelper;

        $this->current_visible_reels = $game_helper->get_rand_reels($json);

        $game_helper->transform_special_symbol();

        $game_helper->find_lines();

        $game_helper->set_reward();

        // ------------- ALL DATA YOU NEED is in $all_data  ----------------
        $all_data = $game_helper->get_data();
        // var_dump('<pre>',$all_data);
        // ------------------------------------------------

        echo json_encode('Reward is : '.array_sum($all_data['Rewards']));

    }


}