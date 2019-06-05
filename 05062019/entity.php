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
        public $error_list = [];

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
            $query_result = $this->execute_sql($this->get_sql());
            if($query_result !== false) {
                return $this->result_query_table($query_result);
            } else {
                return false;
            }

            return $this->result_query_table($this->execute_sql($this->get_sql()));
        }

        protected function execute_sql($sql)
        {
            $query_result = $this->link->query($sql);
            if (!empty($this->link->error)) {
                $this->error_list[] = $this->link->error;
            }
            return $query_result;
        }

        function result_query_table($query_result)
        {
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
            return $this;
        }

        function reset_where_condition()
        {
            unset($this->current_select['WHERE']);
            return $this;
        }

        function add_order_by_asc($str)
        {
            if (!empty($this->current_select['ORDER BY'])) {
                $this->current_select['ORDER BY'] .= ", $str";
            } else {
                $this->current_select['ORDER BY'] = $str;
            }
            return $this;
        }

        function add_order_by_desc($str)
        {
            if (!empty($this->current_select['ORDER BY'])) {
                $this->current_select['ORDER BY'] .= ", $str DESC";
            } else {
                $this->current_select['ORDER BY'] = "$str DESC";
            }
            return $this;
        }

        function reset_order_by()
        {
            unset($this->current_select['ORDER BY']);
            return $this;
        }

        function reset_select()
        {
            //$this->current_select['SELECT'] = null;
            unset($this->current_select['SELECT']);
            return $this;
        }

        function add_select($str)
        {
            $this->current_select['SELECT'] = !empty($this->current_select['SELECT']) ? $this->current_select['SELECT'].", $str" : $str; 
            return $this;
        }

        function set_page($page, $page_size = 2)
        {
            $this->current_select['LIMIT'] = $page * $page_size.", $page_size"; 
            return $this;
        }

        function reset_page()
        {
            unset($this->current_select['LIMIT']);
            return $this;
        }

        function set_group_by($str)
        {
            if (!empty($this->current_select['GROUP BY'])) {
                $this->current_select['GROUP BY'] .= ", $str";
            } else {
                $this->current_select['GROUP BY'] = "$str";
            }
            return $this;
        }

        function reset_group_by()
        {
            unset($this->current_select['GROUP BY']);
            return $this;
        }

        function add_having($str)
        {
            if (!empty($this->current_select['HAVING'])) {
                $this->current_select['HAVING'] .= " AND $str";
            } else {
                $this->current_select['HAVING'] = $str;
            }
            return $this;
        }

        function reset_having()
        {
            unset($this->current_select['HAVING']);
            return $this;
        }

        function reset_default_select()
        {
            $this -> current_select = [];
            $this -> current_select['FROM'] = $this->table_name;
            return $this;
        }

        function get_fields()
        {
            return array_column($this->result_query_table($this->execute_sql('SHOW COLUMNS FROM '.$this->table_name)), 'Field');
        }

        function delete_from($id)
        {
            $this->execute_sql("DELETE FROM $this->table_name WHERE id = $id");
            return $this->link->affected_rows;

        }

        function add($array)
        {
            $this->execute_sql("INSERT INTO `$this->table_name`(".implode(',', array_keys($array)).") VALUES ('".implode("','", $array)."')");
            return $this->link->affected_rows;
        }
    }