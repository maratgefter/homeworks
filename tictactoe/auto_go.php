<?php

class AutoGo extends Tic_Tac_Toe 
    {
        function random_empty_cell($array)
        {
            $size = count($array);
            $new_array = [];
            for ($i=0; $i < $size; $i++) { 
                for ($j = 0; $j < $size; $j++) {
                    if ($array[$i][$j] == '') {
                        $new_array[] = array('i'=>$i, 'j'=>$j);
                    }
                }
            }
            return $new_array[array_rand($new_array)];
        }

        function put_random_cross()
        {
            $availlable_move = $this->random_empty_cell($this->array);
            return $this->put_cross($availlable_move['i'], $availlable_move['j']);
        }

        function put_random_circle()
        {
            $availlable_move = $this->random_empty_cell($this->array);
            return $this->put_circle($availlable_move['i'], $availlable_move['j']);
        }

        function save_data_to_session()
        {
            $_SESSION['Tic_Tac_Toe']['array'] = $this->array;
            $_SESSION['Tic_Tac_Toe']['move'] = $this->move;
        }

        function load_data_from_session()
        {
            if (isset($_SESSION['Tic_Tac_Toe'])) {
            $this->array = $_SESSION['Tic_Tac_Toe']['array'];
            $this->move = $_SESSION['Tic_Tac_Toe']['move'];
            return true;
            } else {
                return false;
            }
        }

        function show() {
            echo "\t\n<table>";
            foreach ($this->array as $i=>$v) {
                echo "\t\n<tr>";
                foreach ($v as $j=>$val) {
                    if ($val == "X" || $val == "O") {
                    echo "\t<td>$val</td>";
                    } else {
                        echo "\t<td><a href='?i=$i&j=$j'>?</a></td>";
                    }
                }
                echo '</tr>';
            }
            echo '</table><hr>';
        }
    }