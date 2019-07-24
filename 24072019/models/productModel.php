<?php

    class productModel extends DB_entity
    {
        function query()
        {
            $this->current_select['SELECT'] = 'product.name AS product_name, product.description, product.price, product.count, product.img, categories.name AS categories_name';
            $this->current_select['FROM'] = 'categories, product';
            $this->current_select['WHERE'] = 'categories.id = product.categories_id';
            return parent::query();
        }
    }
?>