<?php
session_start();

class Game {
    protected $key1;
    protected $key2;
    
    public function start_game ($array) {
        echo "<table class='table_game'>";
        foreach ($array as $key => $value) {
            echo "<tr>";
           foreach ($array[$key] as $k => $v) {
            echo "<td>".$v."</td>";
           }
           echo "</tr>";
        }
        echo "</table>";
    }

    public function check_player($now_player, $new_player)
    {
        if ($now_player == $new_player) {
            return true;
        }
    }

    public function transform_zone($zone)
    {
        if ($zone==1) {$this->key1=0; $this->key2=0;}
        elseif ($zone==2) {$this->key1=0; $this->key2=1;}
        elseif ($zone==3) {$this->key1=0; $this->key2=2;}
        elseif ($zone==4) {$this->key1=1; $this->key2=0;}
        elseif ($zone==5) {$this->key1=1; $this->key2=1;}
        elseif ($zone==6) {$this->key1=1; $this->key2=2;}
        elseif ($zone==7) {$this->key1=2; $this->key2=0;}
        elseif ($zone==8) {$this->key1=2; $this->key2=1;}
        elseif ($zone==9) {$this->key1=2; $this->key2=2;}

        return $this->key1;
        return $this->key2;
    }

    public function check_zone($array, $zone)
    {
        $this->transform_zone($zone);
        if ($array[$this->key1][$this->key2] == 'X' || $array[$this->key1][$this->key2] == 'O' ) {
            return true;
        }
    }

    public function move(&$array, $zone, $player)
    {
        $this->transform_zone($zone);
        $array[$this->key1][$this->key2] = $player;
        return $array;
    }


    public function end_game($array)
    {
        if ($array[0][0]==$array[0][1] && $array[0][1]==$array[0][2]) {return true;}
        elseif ($array[1][0]==$array[1][1] && $array[1][1]==$array[1][2]) {return true;} 
        elseif ($array[2][0]==$array[2][1] && $array[2][1]==$array[2][2]) {return true;} 
        elseif ($array[0][0]==$array[1][0] && $array[1][0]==$array[2][0]) {return true;} 
        elseif ($array[0][1]==$array[1][1] && $array[1][1]==$array[2][1]) {return true;} 
        elseif ($array[0][2]==$array[1][2] && $array[1][2]==$array[2][2]) {return true;}
        elseif ($array[0][0]==$array[1][1] && $array[1][1]==$array[2][2]) {return true;}
        elseif ($array[0][2]==$array[1][1] && $array[1][1]==$array[2][0]) {return true;}
    }

}