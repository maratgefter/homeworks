<?

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
        if (round(rand(0,0))) {
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

    function put_cross ($i, $j) {
        if ($this->in_matrix($i, $j) && $this->is_empty($i, $j) && $this->check_move('cross')) {
            $this->array[$i][$j] = 'X';
            $this->turn_move();
        }

    }

    function put_circle ($i, $j) {
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

    public function check_winner () {
        $size = count($this->array);
        foreach ($this->array as $v) {
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

    function interpolation(){
        foreach ($this->array as $i => $js){
            foreach ($js as $j => $value) {
                $this->output[$j][$i] = $value;
            }
        }
        $size = count($this->output);
        foreach ($this->output as $v) {
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

    // function horizontally(){
    //     $cross_count = 0;
    //     $circle_count = 0;

    //     for
    // }

}

// foreach ($input as $i => $js)
//   foreach ($js as $j => $value)
//     $output[$j][$i] = $value;