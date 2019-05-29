<?php
    class DB_entity 
    {
        protected $link;
        protected $table_name;
        protected $default_select = [
            'SELECT' => '*', 
            'FROM' => null, 
            'WHERE' => null, 
            'GROUP BY' => null, 
            'HAVING' => null, 
            'ORDER_BY' => null, 
            'LIMIT' => null];
        protected $current_select = [];

        function __construct($link, $table_name)
        {
            $this->link = $link;
            $this->table_name = $table_name;
            $this->current_select['FROM'] = $this->table_name;
        }

        function get_sql()
        {
            $sql = '';
            foreach (array_merge($this->default_select, $this->current_select) as $k => $v) {
                if (!empty($v)) {
                    $sql .= "$k $v\n";
                }
            }
            return $sql;
        }

        function query()
        {
            $query_result = $this->link->query($this->get_sql());
            $result = [];
            while ($row = $query_result -> fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }

        function add_where_condition($str)
        {
            if (!empty($this->current_select['WHERE'])) {
                $this->current_select['WHERE'] .= " AND $str";
            } else {
                $this->current_select['WHERE'] = $str;
            }
        }

        function reset_where_condition()
        {
            unset($this->current_select['WHERE']);
        }

        function add_order_by_asc($str)
        {
            if (!empty($this->current_select['ORDER BY'])) {
                $this->current_select['ORDER BY'] .= ", $str";
            } else {
                $this->current_select['ORDER BY'] = $str;
            }
        }

        function add_order_by_desc($str)
        {
            if (!empty($this->current_select['ORDER BY'])) {
                $this->current_select['ORDER BY'] .= ", $str DESC";
            } else {
                $this->current_select['ORDER BY'] = "$str DESC";
            }
        }

        function reset_order_by()
        {
            unset($this->current_select['ORDER BY']);
        }

        function reset_select()
        {
            //$this->current_select['SELECT'] = null;
            unset($this->current_select['SELECT']);
        }

        function add_select($str)
        {
            $this->current_select['SELECT'] = !empty($this->current_select['SELECT']) ? $this->current_select['SELECT'].", $str" : $str; 
        }

        function set_page($page, $page_size = 2)
        {
            $this->current_select['LIMIT'] = $page * $page_size.", $page_size"; 
        }

        function reset_page()
        {
            unset($this->current_select['LIMIT']);
        }

        function set_group_by($str)
        {
            if (!empty($this->current_select['GROUP BY'])) {
                $this->current_select['GROUP BY'] .= ", $str";
            } else {
                $this->current_select['GROUP BY'] = "$str";
            }
        }

        function reset_group_by()
        {
            unset($this->current_select['GROUP BY']);
        }

        function add_having($str)
        {
            if (!empty($this->current_select['HAVING'])) {
                $this->current_select['HAVING'] .= " AND $str";
            } else {
                $this->current_select['HAVING'] = $str;
            }
        }

        function reset_having()
        {
            unset($this->current_select['HAVING']);
        }
    }
?>