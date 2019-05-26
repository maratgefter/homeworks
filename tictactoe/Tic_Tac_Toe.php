<?
include 'auto_go.php';

class Tic_Tac_Toe {

    protected $array;
    protected $move;

    function create_array ($size) {
        $this->array = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $this->array[$i][$j] = '';
            }
        }
    }

    function __construct($size) {
        $this->create_array($size);
        if (round(rand(1,1))) {
            $this->move = 'cross';
        } else {
            $this->move = 'circle';
        }
    }

    function show() {
        echo "\t\n<table>";
        foreach ($this->array as $v) {
            echo "\t\n<tr>";
            foreach ($v as $val) {
                echo "\t<td>$val</td>";    
            }
            echo '</tr>';
        }
        echo '</table><hr>';
    }

    function put_cross($i, $j) {
        if ($this->in_matrix($i, $j) && $this->is_empty($i, $j) && $this->check_move('cross')) {
            $this->array[$i][$j] = 'X';
            $this->turn_move();
        }

    }

    function put_circle($i, $j) {
        if ($this->in_matrix($i, $j) && $this->is_empty($i, $j) && $this->check_move('circle')) {
            $this->array[$i][$j] = 'O';
            $this->turn_move();
        }
    }

    protected function is_empty ($i, $j) {
        return $this->array[$i][$j] == '' ? true : false;
    }

    protected function in_matrix ($i, $j) {
        $size = count($this->array);
        return ($i >= $size || $j >= $size || $i < 0 || $j < 0) ? false : true;
    }

    function check_move ($player) {
        if ($player == $this->move) {
            return true;
        } else {
            return false;
        }
    }

    function turn_move () {
        if ($this->move == 'cross') {
            $this->move = 'circle';
        } else {
            $this->move = 'cross';
        }
    }

    public function check_winner_by_row ($array) {
        $size = count($array);
        foreach ($array as $v) {
            $cross_count = 0;
            $circle_count = 0;
            foreach ($v as $val) {
                if ($val == "X") {
                    $cross_count++;
                }
                if ($val == "O") {
                    $circle_count++;
                }
            }
            if ($cross_count == $size) {
                return "X";
            }
            if ($circle_count == $size) {
                return "O";
            }
        }
        return "";
    }

    function transpolation($array){
        foreach ($array as $i => $js){
        foreach ($js as $j => $value) {
            $new_array[$j][$i] = $value;
            }
        }
        return $new_array;
    }

    function check_winner_by_col($array){
        return $this->check_winner_by_row($this->transpolation($array));
    }

    function check_winner(){
        if ($this->check_winner_by_row($this->array) != "") {
            return $this->check_winner_by_row($this->array);
        } else if ($this->check_winner_by_col($this->array) != ""){
            return $this->check_winner_by_col($this->array);
        } else if($this->winner_by_diagonal($this->array) != "") {
            return $this->winner_by_diagonal($this->array);
        }
    }
 
    function winner_by_diagonal($array){
        $cross_count1 = 0;
        $circle_count1 = 0;
        $cross_count2 = 0;
        $circle_count2 = 0;
        $size = count($array);
        for($i=0; $i<$size; $i++) {
            if ($array[$i][$i] == 'X'){
                $cross_count1++;
            }
            if ($array[$i][$i] == 'O'){
                $circle_count1++;
            }
            if ($array[$i][$size-1-$i] == 'X'){
                $cross_count2++;
            }
            if ($array[$i][$size-1-$i] == 'O'){
                $circle_count2++;
            }
        }
        
        if ($cross_count1 == count($array)) {
            return "X";
        }
        if ($circle_count1 == count($array)) {
            return "O";
        }
        if ($cross_count2 == count($array)) {
            return "X";
        }
        if ($circle_count2 == count($array)) {
            return "O";
        }
        return "";
    }

    function newGame() {
        session_unset();
    }
}