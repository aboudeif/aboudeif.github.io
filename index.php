<html>
  <head>
    <title>PHP Polymorphism</title>
    <link rel='stylesheet' href='style.css'>
    <script src='script.js'></script>
  </head>
  <body onload='load();'>
    <?php

      # abstract shape class
      abstract class Shape{
        abstract public function calc_area();
        abstract public function print_();
      }

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
      echo "<table id='table'><caption>Square Info</caption><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Top side</th><th>Area</th></tr><tr><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".round($this -> side,2)." cm</td><td>".(float)round($this -> calc_area(),2)." cm<sup>2</sup></td></tr></table>";
      }
    }
      

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
        echo "<table id='table'><caption>Triangle Info</caption><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Area</th></tr><tr><td>".round($this -> right_side,2)." cm</td><td>".round($this -> left_side,2)." cm</td><td>".round($this -> bottom_side,2)." cm</td><td>".(float)round($this -> calc_area(),2)." cm<sup>2</sup></td></tr></table>";
       }
    }

echo " <form method='POST'>
    <div class='shape-selector'><div id='triangle_shape' class='selector' onclick='check(this.id);'>&#9651;</div><div id='square_shape' class='selector' onclick='check(this.id);'>&#9633;</div><button type='submit' name='submit' id='submit'>Calcuate Area</button></div>
          <select name='shape' id='shape' onChange='select_shape(this.value);'>
            <option value='' disabled selected>Select Shape</option>
            <option name='square' value='square'>Square</option>
            <option name='triangle' value='triangle'>Triangle</option>
          </select>
          <div class='select-square'></div>
          
          <br><br>
          <div class='scals'>
          <div class='side sq' id='side_s_r'><input id='slid_s_r' type='range' name='side' min='1' max='15' value='1' class='slider' oninput='change(this.id);'></div>
          <div class='side sq' id='side_s_b'>
          <input id='slid_s_b' type='range' min='1' max='15' value='1' class='slider' disabled></div>
          <div class='side sq' id='side_s_l'>
          <input id='slid_s_l' type='range' min='1' max='15' value='1' class='slider' disabled></div>
          <div class='side sq' id='side_s_t'>
          <input id='slid_s_t' type='range' min='1' max='15' value='1' class='slider' disabled></div>

          <div class='side tr' id='side_t_r'><div class='side_label' id='label_t_r'></div><input id='slid_t_r' type='range' name='slid_t_r' min='1' max='20' value='1' class='slider' oninput='change(this.id);'><input type='hidden' id='h_t_r' name='h_t_r'></div>
            <div class='side tr' id='side_t_b'><div class='side_label' id='label_t_b'></div><input id='slid_t_b' type='range' name='slid_t_b' min='1' max='20' value='1' class='slider' oninput='change(this.id);'><input type='hidden' id='h_t_b' name='h_t_b'></div>
            <div class='side tr' id='side_t_l'><div class='side_label' id='label_t_l'></div><input id='slid_t_l' type='range' name='slid_t_l' min='1' max='20' value='1' class='slider' oninput='change(this.id);'><input type='hidden' id='h_t_l' name='h_t_l'></div>
    </div>
      </form>
<div id='info'></div>
<div id='pallet'></div>";

if(isset($_POST['shape'])){
  
 if($_POST['shape'] == 'square'){
        
        echo "<script>document.getElementById('slid_s_r').value = ".$_POST['side'].";</script>";
        echo "<script>check('".$_POST['shape']."_shape');</script>";
        $square = new Square($_POST['side']);
        echo "<script>document.getElementById('calculations').innerHTML = ".$square->print_().";</script>";
      }

 if($_POST['shape'] == 'triangle'){
        
        echo "<script>fill_data(".$_POST['slid_t_r'].",".$_POST['slid_t_b'].",".$_POST['slid_t_l'].");</script>";
        echo "<script>check('".$_POST['shape']."_shape');</script>";
          $triangle = new Triangle($_POST['h_t_r'],$_POST['h_t_b'],$_POST['h_t_l']);
        echo "<script>document.getElementById('calculations').innerHTML = ".$triangle->print_().";</script>";
      }
}
    ?> 
   
  </body>
</html>