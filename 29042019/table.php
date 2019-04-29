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
            echo '<table>';
            foreach($this->table as $v) {
                echo '<tr>';
                foreach($v as $val) {
                    echo "<td>$val</td>";                    
                }
                echo '</tr>';
            }
            echo "</table>";
        }

    $obj = new Table(
    [['№', 'Вид работ', 'Ответственный', 'Должность'], 
    ['1', 'Уборка территории', 'Иванов', 'Инженер-механик'],
    ['2', 'Мытье окон', 'Сидоров', 'Инженер-электрик']]);
    echo $obj->showTable();
?>