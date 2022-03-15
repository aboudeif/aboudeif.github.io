<html>
  <head>
    <title>PHP Polymorphism</title>
    <link rel='stylesheet' href='styles/form.css'>
    <link rel='stylesheet' href='styles/panels.css'>
    <script src='script.js'></script>
  </head>
  <body>
    <?php

    include "app/Shape.php";
    include "app/Square.php";
    include "app/Triangle.php";
    include "app/Rectangle.php";
    include "views/form.html";
    include "views/panels.html";
    
if(isset($_POST['shape'])){
  
 if($_POST['shape'] == 'square'){
        
        echo "<script>document.getElementById('slid_s_r').value = ".$_POST['side'].";</script>";
        echo "<script>check('".$_POST['shape']."_shape');</script>";
        $square = new Square($_POST['side']);
        echo "<script>document.getElementById('calculations').innerHTML = ".$square->print_().";</script>";
        // echo "<script>document.getElementById('history').innerHTML = ".$square->make_history().";</script>";
        echo "<script>get_history();</script>";
        // echo "<script>set_history();</script>";
      }

 if($_POST['shape'] == 'triangle'){
        
        echo "<script>fill_data(".$_POST['slid_t_r'].",".$_POST['slid_t_b'].",".$_POST['slid_t_l'].");</script>";
        echo "<script>check('".$_POST['shape']."_shape');</script>";
          $triangle = new Triangle($_POST['h_t_r'],$_POST['h_t_b'],$_POST['h_t_l']);
        echo "<script>document.getElementById('calculations').innerHTML += ".$triangle->print_().";</script>";
        echo "<script>get_history();</script>";
        // echo "<script>set_history();</script>";
      }
  if($_POST['shape'] == 'rectangle'){
        
         echo "<script>fill_data(".$_POST['slid_r_r'].",".$_POST['slid_r_t'].");</script>";
         echo "<script>check('".$_POST['shape']."_shape');</script>";
        $rectangle = new Rectangle($_POST['slid_r_r'],$_POST['slid_r_t']);
         echo "<script>document.getElementById('calculations').innerHTML += ".$rectangle->print_().";</script>";
         echo "<script>get_history();</script>";
      }
    }
else
  echo "<script>load();</script>";
    ?> 
   
  </body>
</html>