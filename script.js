function load(){
  document.getElementById('pallet').innerHTML = "<div style='color:gold;'>Select a shape [ &#9651; or &#9633; ] to start <br>اختر شكلاً [ &#9651; أو &#9633; ] للبدء</div>";
}
function set_history(history) {
  var shape = document.getElementById('shape').value;
  var pallet = document.getElementById('pallet').innerHTML;
  history[history.length] = "<div class='element'>"+(history.length+1)+"- "+shape+" at "+ new Date()+"<table id='_"+history.length+"'>"+document.getElementById('table_body').innerHTML+"</table></div>";
  sessionStorage.setItem("h_",JSON.stringify(history));
}
function get_history() {
  var history = [];
    
  if (sessionStorage.getItem('h_')){
  history  = JSON.parse(sessionStorage.getItem('h_'));
  set_history(history);
  for(var item in history)
    document.getElementById('history').innerHTML +="<label></label>"+history[item];
  
     }
  else{
    set_history(history);
     history  = JSON.parse(sessionStorage.getItem('h_'));
    for(var item in history)
      document.getElementById('history').innerHTML +="<label></label>"+history[item];
  }
   
}
function check(id) {
  document.getElementById('triangle_shape').classList.remove('checked');
  document.getElementById('square_shape').classList.remove('checked');
  document.getElementById(id).classList.add('checked');
  select_shape(id.slice(0,-6));
}
function fill_data(slid) {
  document.getElementById('slid_s_r').value = slid;
}
function fill_data(slid_r,slid_b,slid_l) {
document.getElementById('slid_t_r').value= slid_r;
document.getElementById('slid_t_b').value= slid_b;
document.getElementById('slid_t_l').value= slid_l;
document.getElementById('h_t_l').value = Math.hypot(slid_l,slid_b);
document.getElementById('h_t_r').value = Math.hypot(slid_r,slid_b);
document.getElementById('h_t_b').value = parseFloat(slid_r)+parseFloat(slid_l);
}
function select_shape(value) {
  const squares = document.getElementsByClassName('sq');
  const triangles = document.getElementsByClassName('tr');
  // document.getElementById('calculations').innerHTML = '';
  if(value == 'square'){
    document.getElementById('shape').selectedIndex  = 1;
    for (let i = 0; i < squares.length; i++) 
      squares[i].style.display ='block';
    for (let i = 0; i < triangles.length; i++)
      triangles[i].style.display ='none';
    change(document.getElementById('slid_s_r').id);
  }
  if(value == 'triangle'){
    document.getElementById('shape').selectedIndex  = 2;
    for (let i = 0; i < triangles.length; i++)
       triangles[i].style.display = 'block';
    for (let i = 0; i < squares.length; i++)
      squares[i].style.display = 'none';
    change(document.getElementById('slid_t_r').id);
    change(document.getElementById('slid_t_l').id);
    change(document.getElementById('slid_t_b').id);
  }
}
function change(id){
  var slider = document.getElementById(id).value;
  if(id == 'slid_s_r')
    link('rblt',slider);

if(id[5] == 's'){
document.getElementById('pallet').innerHTML = "<style>.square {margin: 0 auto;background-color: cadetblue;width: 0;height: 0;border-right: "+slider+"cm solid cadetblue;border-bottom: "+slider+"cm solid cadetblue;border-left: "+slider+"cm solid cadetblue;border-top: "+slider+"cm solid cadetblue;}</style><div class='square'></div>";

document.getElementById('info').innerHTML = "<label>Left side ="+slider+" cm</label><br><label>Right side ="+slider+" cm</label><br><label>Bottom side ="+slider+" cm</label><br><label>Top side ="+slider+" cm</label><br>";
document.getElementById('table').innerText = '';
}
if(id[5] == 't'){

var slid = {r:parseFloat(document.getElementById('slid_t_r').value),b:parseFloat(document.getElementById('slid_t_b').value),l:parseFloat(document.getElementById('slid_t_l').value)};

document.getElementById('h_t_l').value = Math.hypot(slid['l'],slid['b']);
document.getElementById('h_t_r').value = Math.hypot(slid['r'],slid['b']);
document.getElementById('h_t_b').value = parseFloat(slid['r'])+parseFloat(slid['l']);
document.getElementById('pallet').innerHTML = "<style>.triangle {margin: 0 auto;position: relative;width: 0;height: 0;border-right: "+slid['r']+"cm solid transparent;border-bottom: "+slid['b']+"cm solid cadetblue;border-left: "+slid['l']+"cm solid transparent;}</style><div class='triangle'></div>";

document.getElementById('info').innerHTML = "<label>Left side ="+Math.hypot(slid['l'],slid['b'])+" cm</label><br><label>Right side ="+Math.hypot(slid['r'],slid['b'])+" cm</label><br><label>Bottom side ="+parseFloat(slid['r'] + slid['l'])+" cm</label><br>";
document.getElementById('table').innerHTML = '';
  }
}

function link(str,slider) {
  for (var index = 1; index < str.length; index++) {
    var link = 'slid_s_' + str[index];
    document.getElementById(link).value = slider;
  }
}