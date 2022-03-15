<?php
# rectangle class
      class Rectangle extends Shape{
        private $width;
        private $height;

        public function __construct($width,$height){
          $this -> width = $width;
          $this -> height = $height;
        }
        public function get_width(){
          return $this -> width;
        }
        public function get_height(){
          return $this -> height;
        }
        public function calc_area(){
          return ($this -> width * $this -> height);
        }
        public function print_(){
          $body = "";
      echo "<table id='table'><caption>Rectangle Info</caption><thead id='table_head'><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Top side</th><th>Area</th></tr></thead><tbody id='table_body'><tr><td>".round($this -> height,2)." cm</td><td>".round($this -> height,2)." cm</td><td>".round($this -> width,2)." cm</td><td>".round($this -> width,2)." cm</td><td>".(float)$this -> calc_area()." cm<sup>2</sup></td></tr></tbody></table>";
      }
      
    }