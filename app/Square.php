<?php
# square class
      class Square extends Shape{
        private $side;

        public function __construct($side){
          $this -> side = $side;
        }
        public function get_side(){
          return $this -> side;
        }
        public function calc_area(){
          return pow($this -> side,2);
        }
        public function print_(){
          $body = "";
      echo "<table id='table'><caption>Square Info</caption><thead id='table_head'><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Top side</th><th>Area</th></tr></thead><tbody id='table_body'><tr><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".(float)round($this -> calc_area(),2)." cm<sup>2</sup></td></tr></tbody></table>";
      // echo "<script>set_history(".$body.");</script>";
      }
      
    }