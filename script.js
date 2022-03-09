function fill_data(side) {
  
}
// function fill_data(side1,side2,side3) {
//   document.getElementById('side_t_r').value= side1;
//   document.getElementById('side_t_b').value= side2;
//   document.getElementById('side_t_l').value= side3;
// }
function select_shape(value) {
  const squares = document.getElementsByClassName('sq');
  const triangles = document.getElementsByClassName('tr');
  if(value == 'square'){
    for (let i = 0; i < squares.length; i++) 
      squares[i].style.display ='block';
    for (let i = 0; i < triangles.length; i++)
      triangles[i].style.display ='none';
  }
  if(value == 'triangle'){
    for (let i = 0; i < triangles.length; i++)
       triangles[i].style.display = 'block';
    for (let i = 0; i < squares.length; i++)
      squares[i].style.display = 'none';
  }
}
function change(id){
  var label = 'output'+id.slice(4);
  var slider = document.getElementById(id).value;
  document.getElementById(label).innerHTML = slider + ' px';
  if(id == 'slid_s_r')
    link('rblt',slider);
 // var str = "<table><caption>Square Info</caption><tr><th>Right side</th><th>Bottom side</th><th>Left side</th><th>Top side</th><th>Area</th></tr><tr><td>"+slider+" px</td><td>"+slider+" px</td><td>"+slider+" px</td><td>"+slider+" px</td><td> px</td></tr></table>"; 
 

if(id[5] == 's')
document.getElementById('pallet').innerHTML = "<style>.square {width: 0;height: 0;border-right: "+slider+"px solid red;border-bottom: "+slider+"px solid red;border-left: "+slider+"px solid red;border-top: "+slider+"px solid red;}</style><div class='square'></div>";

if(id[5] == 't'){
let slid_r = document.getElementById('slid_t_r').value;
let slid_b = document.getElementById('slid_t_b').value;
let slid_l = document.getElementById('slid_t_l').value;
document.getElementById('pallet').innerHTML = "<style>.triangle {width: 0;height: 0;border-right: "+slid_r+"px solid blue;border-bottom: "+slid_b+"px solid red;border-left: "+slid_l+"px solid yellow;}</style><div class='triangle'></div>";

var str = "";
 var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("info").innerHTML = this.responseText;
        // alert(this.responseText);
      }
    };
    xmlhttp.open("POST","slid_r=" + slid_r+"&slid_l=" + slid_l+"&slid_b="+slid_b , true);
    xmlhttp.send();
  }
}
//}
//"<?php $square = new Square(slider); ?> <div class='square'></div> <php? $square->print_(); ?>";
//}

function link(str,slider) {
  for (var index = 1; index < str.length; index++) {
    var link = 'slid_s_' + str[index];
    document.getElementById(link).value = slider;
    document.getElementById('output'+link.slice(4)).innerHTML = slider + ' px';
  }
}