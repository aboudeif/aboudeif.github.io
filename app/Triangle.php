<?php
# triangle class
    class Triangle extends Shape{
      private $right_side;
      private $left_side;
      private $bottom_side;

      public function __construct($right_side=1.4142135623730951, $bottom_side=2, $left_side=1.4142135623730951){
        $this -> right_side = $right_side;
        $this -> left_side = $left_side;
        $this -> bottom_side = $bottom_side;
      }
      public function get_right_side(){
        return $this -> right_side;
      }
      public function get_left_side(){
        return $this -> left_side;
      }
      public function get_bottom_side(){
        return $this -> bottom_side;
      }
      // 
      public function calc_area(){
        # 
        $half_perimeter = (float)($this->right_side + $this->left_side +$this->bottom_side)/2;
        return sqrt($half_perimeter * ($half_perimeter-$this->right_side)*($half_perimeter-$this->left_side)*($half_perimeter-$this->bottom_side));
      }
      public function print_(){
        echo "<table id='table'><caption>Triangle Info</caption><thead><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Area</th></tr></thead><tbody id='table_body'><tr><td>".round($this -> right_side,2)." cm</td><td>".round($this -> left_side,2)." cm</td><td>".round($this -> bottom_side,2)." cm</td><td>".(float)round($this -> calc_area(),2)." cm<sup>2</sup></td></tr></tbody></table>";
        
       }
    }