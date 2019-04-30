<?php
    class Table 
    {
        protected $table;

        function __construct($table)
        {
            $this->table=$table;
        }

        function showTable()
        {
            echo "<table>\n";
            foreach($this->table as $v) {
                echo "\t<tr>\n";
                foreach($v as $val) {
                    echo "\t\t<td>$val</td>\n";                    
                }
                echo "\t</tr>\n";
            }
            echo "</table><hr>";
        }

        function add_row ($var, $key)
        {
            $new_array = [];
            foreach ($this->table as $k => $v) {
                if ($key == $k) {
                    $new_array[] = $var;
                }
                $new_array[] = $v;
            }
            $this->table = $new_array;
        }

        function deleteRow ($k)
        {
            unset($this->table[$k]);
        }

        function sortArray ($num)
        {
            $new_array = [];
            foreach ($this->table as $k=>$v) {
                $new_array[$k] = $v[$num];
            }
            array_multisort($new_array, $this->table);
        }

        function deleteCol ($key)
        {
            foreach ($this->table as$k=>$v) {
                unset ($this->table[$k][$key]);
            }
        }

        function test (&$table, $var, $key)
        {
            $buf_array = [];
            foreach ($table as $k => $v) {
                if ($key == $k) {
                    $buf_array[] = $var;
                }
                $buf_array = $v;
            }
            $table = $buf_array;
        }

        function addCol ($table, $key)
        {
            foreach ($this->table as $k => $v) {
                $this->test($this->table[$k], $table[$k], $key);
            }
            return $this->array;
        }

    }
    
    $obj = new Table(
    [['№', 'Вид работ', 'Ответственный', 'Должность'], 
    ['1', 'Уборка территории', 'Иванов', 'Инженер-механик'],
    ['2', 'Мытье окон', 'Сидоров', 'Инженер-электрик']]);
    echo $obj->showTable();
    $obj->add_row(['4', 'Вынос мусора', 'Поликарпов', 'Инженер-энергетик'], 1);
    echo $obj->showTable();
    $obj->deleteRow(1);
    echo $obj->showTable();
    $obj->sortArray(0);
    echo $obj->showTable();
    $obj->deleteCol(3);
    echo $obj->showTable();
    print_r ($obj -> addCol(['Стаж работы', 2, 9], 2));
    echo $obj->showTable();
?>