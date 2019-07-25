<?php

    class productModel extends DB_entity
    {
        function productQueryPrepare()
        {
            $this->current_select['SELECT'] = 'product.id AS id, product.name AS product_name, product.description, product.price, product.count, product.img, categories.name AS categories_name';
            $this->current_select['FROM'] = 'categories, product';
            $this->current_select['WHERE'] = 'categories.id = product.categories_id';
            return $this;
        }

        function set_table_name($table_name)
        {
            $this->current_select['FROM'] = ($this->table_name = $table_name);
            return $this;
        }
    }

    
?>