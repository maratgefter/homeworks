<?php
  class List_html
  {
      protected $array;

      public function __construct($data)
      {
          $this->set_data($data);
      }

      public function set_data($data)
      {
          $this->array = $data;
      }

      protected function str_li()
      {
          $str = "";
          foreach ($this->array as $val) {
              $str .= "<li>$val</li>";
          }
          return $str;
      }

      public function get_num()
      {
          return "<ol type='1'>".$this->str_li()."</ol>";
      }

      public function get_num1()
      {
          return "<ul>".$this->str_li()."</ul>";
      }
  }  

  $arr1 = ["one", "two", "three"];
  $obj = new List_html($arr1);
  echo $obj->get_num();
  $arr2 = ["один", "два", "три"];
  $obj->set_data($arr2);
  echo $obj->get_num1();
?>