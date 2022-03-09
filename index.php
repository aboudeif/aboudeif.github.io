<html>
  <head>
    <title>PHP Polymorphism</title>
    <link rel='stylesheet' href='style.css'>
    <script src='script.js'></script>
  </head>
  <body>
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
          return pow(2,$this -> side);
        }
        public function print_(){
        echo "<table><caption>Square Info</caption><tr>
        <th>Right side</th>
        <th>Bottom side</th>
        <th>Left side</th>
        <th>Top side</th>
        <th>Area</th></tr>
        <tr><td>".$this->get_side()." px</td>
        <td>".$this->get_side()." px</td>
        <td>".$this->get_side()." px</td>
        <td>".$this->get_side()." px</td>
        <td>". $this->calc_area()." px</td></tr>
         </table>";
        echo "<style>
      .square 
      {
      width: 0;
      height: 0;
      border-right: ".$this->side."px solid red;
      border-bottom: ".$this->side."px solid red;
      border-left: ".$this->side."px solid red;
      border-top: ".$this->side."px solid red;
      
      }
      </style>";
      echo "<div class='square'></div>";
      }
    }
      

    # triangle class
    class Triangle extends Shape{
      private $right_side;
      private $left_side;
      private $bottom_side;

      public function __construct($right_side, $left_side, $bottom_side){
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
      public function find_hypotenuse($hypotenuse){
          if($hypotenuse == 'right')
            return sqrt(pow(2,$this->bottom_side) + pow(2,$this->right_side));
          if($hypotenuse == 'left')
            return sqrt(pow(2,$this->bottom_side) + pow(2,$this->left_side));
        }
      // new calc ====================================================================================
      public function calc_area(){
        $right = $this->find_hypotenuse('right');
        $left = $this->find_hypotenuse('left');
        $base =  ($this->left_side + $this->right_side);
        
        $half_perimeter = ($right + $left +$base)/2;
        return sqrt($half_perimeter * ($half_perimeter-$right)*($half_perimeter-$left)*($half_perimeter-$base));
      }
      public function print_(){
        $right = $this->find_hypotenuse('right');
        $left = $this->find_hypotenuse('left');
        $base =  $this->left_side + $this->right_side;
        echo "<table><caption>Triangle Info</caption><tr><th>Right side</th><th>Left side</th><th>Bottom side</th><th>Area</th></tr><tr><td>".$right." px</td><td>".$left." px</td><td>".$base." px</td><td>".$this->calc_area()." px</td></tr></table>";

       }
    }
    if(isset($_GET)){
      $tri = new Triangle(50,80,60);//($_POST['slid_r'],$_POST['slid_l'],$_POST['slid_b']);
      echo "<script>document.getElementById('info').innerHTML = ".$tri->print_().";</script>";
    }
    // echo $_POST['str'];
    ?> 
    <!-- <form method='POST'> -->
    <label>Shape is </label>
          <select name='shape' onChange='select_shape(this.value);'>
            <option value='' disabled selected>Select Shape</option>
            <option name='square' value='square'>Square</option>
            <option name='triangle' value='triangle'>Triangle</option>
          </select>
          <button type='submit' name='submit'>Draw</button>
          <br><br>
          <div class='side sq' id='side_s_r'><div class='side_label' id='label_s_r'></div><input id='slid_s_r' type='range' name='side' min='1' max='500' value='1' class='slider' oninput='change(this.id);'><label id='output_s_r'> px</label></div>
          <div class='side sq' id='side_s_b'><div class='side_label' id='label_s_b'></div>
          <input id='slid_s_b' type='range' min='1' max='500' value='1' class='slider' disabled><label id='output_s_b'> px</label></div>
          <div class='side sq' id='side_s_l'><div class='side_label' id='label_s_l'></div>
          <input id='slid_s_l' type='range' min='1' max='500' value='1' class='slider' disabled><label id='output_s_l'> px</label></div>
          <div class='side sq' id='side_s_t'><div class='side_label' id='label_s_t'></div>
          <input id='slid_s_t' type='range' min='1' max='500' value='1' class='slider' disabled><label id='output_s_t'> px</label></div>

          <div class='side tr' id='side_t_r'><div class='side_label' id='label_t_r'></div><input id='slid_t_r' type='range' name='side_t_r' min='1' max='500' value='1' class='slider' oninput='change(this.id);'><label id='output_t_r'> px</label></div>
            <div class='side tr' id='side_t_b'><div class='side_label' id='label_t_b'></div><input id='slid_t_b' type='range' name='side_t_b' min='1' max='500' value='1' class='slider' oninput='change(this.id);'><label id='output_t_b'> px</label></div>
            <div class='side tr' id='side_t_l'><div class='side_label' id='label_t_l'></div><input id='slid_t_l' type='range' name='side_t_l' min='1' max='500' value='1' class='slider' oninput='change(this.id);'><label id='output_t_l'> px</label></div>
 <!-- </form> -->
    <div id='pallet'></div>
    <div id='info'></div>
  </body>
</html>