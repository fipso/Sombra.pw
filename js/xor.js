$(document).ready(function() {
  $("#btn").click(function() {
    calc();
  });
  $('input').keyup(function(event){
      if(event.keyCode == 13) {
        calc();
      }
  });
});

function calc(){
  var input = $("#input");
  var output = $("#output");
  var keyInput = $("#key");

  output.val(xorDecode(input.val(), keyInput.val()));
}

function xorDecode(text, key){
  var out="";
  for(var i=0;i<text.length;i++){
    out+=String.fromCharCode(text.charCodeAt(i)^key);
  }
  return out;
}

function hex2a(hexx) {
  var hex = hexx.toString();
  var str = '';
  for (var i = 0; i < hex.length; i += 2)
    str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
  return str;
}
