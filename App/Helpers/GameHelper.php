<?php 

namespace App\Helpers;

class GameHelper {

    protected $pay_min = 99, $pay_max = 0, $reels = 0, $visible_symbols = 0;
    protected $rand_reels = [], $special_simbol = [], $counWin = [], $profits = [], $rewards = [];
    protected $json;

    public function __construct(){
    }


    // Spin and show reels
    public function get_rand_reels($json){
        $rand = [];
        // biggest element in reel
        $biggest = 0;
        $this->json = $json;

        $this->get_visible_symbols();

        foreach($json['reels'][0] as $key=>$reel){
            $biggest = count($reel) - 1;
            $rand[$key] = array_rand($reel);
            for($i = 0; $i<$this->visible_symbols; $i++){
                if ($rand[$key]+$i > $biggest){
                    $this->rand_reels[$key][] = $reel[0];
                } else {
                    $this->rand_reels[$key][] = $reel[$rand[$key]+$i];
                }
            }
        }
        
        return $this->rand_reels;
    }


    // Find all Profits and number of symbols in line
    public function find_lines(){
        $this->pay_min_max($this->json['pays']);

        $lines = $this->json['lines'];

        $currentIterSymb = [];

        foreach($lines as $key=>$line){
            $this->counWin[$key] = 1;
            foreach($line as $i=>$j){
                if(isset($currentIterSymb[$i-1]) && $this->rand_reels[$i][$j] == $currentIterSymb[$i-1]){
                    $this->counWin[$key]++;
                    if($this->counWin[$key] >=$this->pay_min){
                        $this->profits[$key] = $this->rand_reels[$i][$j];
                    }
                } else {
                    if($this->counWin[$key] < $this->pay_min){
                        $this->counWin[$key] = 1;
                    } else {
                        break;
                    }
                    
                }
                $currentIterSymb[$i] = $this->rand_reels[$i][$j];
            }
        }

    }


    // Create current Reward
    public function set_reward(){
        foreach($this->profits as $i=>$j){

            //get reward fro json
            foreach($this->json['pays'] as $pay){
                if($pay[0] == $this->profits[$i] && $pay[1] == $this->counWin[$i]){
                    $this->rewards[$i] = $pay[2];
                }
            }

        }
    }


    // Get All DATA
    public function get_data(){
        return ['Rewards'=>$this->rewards, 'Profits_lineNumber_winSymbol'=>$this->profits, 'Count_lineNumber_numSymbols'=>$this->counWin, 'Visible_reels_Spin'=>$this->rand_reels];
    }

    // Transform all special symbol to random one
    public function transform_special_symbol(){
        $this->find_special_symbol('mystery' ,$this->json);

        $this->get_rand_symbol();
        foreach($this->rand_reels as $key=>$reel){
            foreach($reel as $key1=>$value){
                if($value == $this->special_simbol['id']){
                    $this->rand_reels[$key][$key1] = $this->current_symbol_transform_to['id'];
                }
            }
        }
    }


    // Get Random symbol for replace special symbol
    private function get_rand_symbol(){
        if(($this->json['tiles'][array_rand($this->json['tiles'],1)])['id'] == $this->special_simbol['id']){
            $this->get_rand_symbol();
        } else {
            $this->current_symbol_transform_to = $this->json['tiles'][array_rand($this->json['tiles'],1)];
        }
    }

    
    // Find special symbol in Json
    private function find_special_symbol($needle, $haystack) {
        foreach ($haystack['tiles'] as $item) {
            if (is_array($item) && array_search($needle, $item)){
                $this->special_simbol = $item;
            } 
        }
        return false;
    }



    // Set the minimum and maximum reward symbols
    private function pay_min_max($pays){
        foreach($pays as $pay){
            foreach($pay as $key=>$value){
                if($key == 1 && $this->pay_min > $value){
                    $this->pay_min = $value;
                }
                if($key == 1 && $this->pay_max < $value){
                    $this->pay_max = $value;
                }
            }
        }
    }


    // Public method
    public function get_reels(){
        $this->reels = count($this->json['reels'][0]);

        return count($this->json['reels'][0]);
    }


    // Public method
    public function get_visible_symbols(){
        $distinct = count(array_unique(call_user_func_array('array_merge', $this->json['lines'])));
        $this->visible_symbols = $distinct;
        return $distinct;
    }

}
