var running = false;
var tasksDone = 0;

$(document).ready(function() {
  $("#btn").click(function() {
    //On Button Click -> doItNow()
    doItNow();
  });
});

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      //On Enter -> dont submit -> doItNow()
      event.preventDefault();
      doItNow();
      return false;
    }
  });
});

function doItNow(){
  if(!running){
    //If not running already
    running = true;
    tasksDone = 0;
    //Convert to lower case
    if($("#lower").is(":checked")){
      $("#password").val($("#password").val().toLowerCase());
    }
    //Clear output Box
    $("#dataBox p").remove();
    $("#dataBox br").remove();
    //Set button to disabled
    $("#btn").addClass("disabled");
    //Make GET with form data
    var blinks = 1;
    if($("#hardcore").is(":checked")){
      blinks = 16;
    }
    for(var i = 0; i < blinks; i++){
      $("#blink").val(i);
      $.get(
      "/php/password.php",
      $('#myForm').serialize(),
      function(data) {
        var blinkP = document.createElement("p");
        var blinkNode = document.createTextNode("Input: " + data.input);
        blinkP.className = "p-s";
        blinkP.appendChild(blinkNode);
        $("#dataBox").append(blinkP);
        //loop throught every line
        for(var key in data.output){
          //get b64 line from json
          var b64 = data.output[key];
          //decode b64 to UTF-8
          var txt = Base64.decode(b64);
          //If box is NOT checked -> output as txt
          var out = b64;
          if($("#b64").is(":checked") == false){
            out = txt;
          }
          //Set <p> color
          var colroClass = "p-r";
          if(byteLength(txt) <= 93 && isText(txt)){
            colroClass = "p-g";
          }
          //add <p>
          var para = document.createElement("p");
          var node = document.createTextNode(key + ": " + out);
          //add color class to <p>
          para.className = "p-s " + colroClass;
          //add dat shit to #dataBox
          para.appendChild(node);
          $("#dataBox").append(para);
        }
        //add spacer
        $("#dataBox").append(document.createElement("br"));
        //Check if all tasks are done
        tasksDone++;
        if((blinks == 16 && tasksDone == 15) || (blinks == 1 && tasksDone == 1)){
          //Mark button as active
          $("#btn").removeClass("disabled");
          //Running = false
          running = false;
        }
      });
    }
  }
}

function isText(s){
  var validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!#*`.áéíñóúü¿¡0123456789= ";
  var validFound = 0;
  for(var i = 0; i < s.length; i++){
    for(var j = 0; j < validChars.length; j++){
      if(s[i] == validChars[j]){
        validFound++;
      }
    }
  }
  if(validFound / s.length >= 0.85){
    return true;
  }
  return false;
}

function byteLength(str) {
  // returns the byte length of an utf8 string
  var s = str.length;
  for (var i=str.length-1; i>=0; i--) {
    var code = str.charCodeAt(i);
    if (code > 0x7f && code <= 0x7ff) s++;
    else if (code > 0x7ff && code <= 0xffff) s+=2;
    if (code >= 0xDC00 && code <= 0xDFFF) i--; //trail surrogate
  }
  return s;
}
