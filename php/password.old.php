<html>
<head>
  <meta charset="utf-8">
  <style>
  .p-s { font-size: 12px; margin: 0; padding: 0;}
  .p-r { background-color: rgb(255,0,0); }
  .p-g { background-color: rgb(0,255,0); }
  </style>
</head>
<p>If you find something useful, talk to us on the discord</p>
<p>Green means you got a result with more then 80% ascii like characters (maybe right password)</p>
<p>Red means you got a result with less (wrong password)</p>
<p><a href="password.html">back</a></p>
<br>

<?php

if (isset($_POST["password"])){

  $base64 = isset($_POST["base64"]);

  $password = $_POST["password"];

  $ciphers = [ "AES-128-CFB", "AES-128-CFB1", "AES-128-CFB8", "AES-128-CTR", "AES-128-OFB", "AES-192-CFB", "AES-192-CFB1", "AES-192-CFB8", "AES-192-CTR", "AES-192-OFB", "AES-256-CFB", "AES-256-CFB1", "AES-256-CFB8", "AES-256-CTR", "AES-256-OFB", "BF-CFB", "BF-OFB", "CAST5-CFB", "CAST5-OFB", "DES-CFB", "DES-CFB1", "DES-CFB8", "DES-EDE-CFB", "DES-EDE-OFB", "DES-EDE3-CFB", "DES-EDE3-CFB1", "DES-EDE3-CFB8", "DES-EDE3-OFB", "DES-OFB", "IDEA-CFB", "IDEA-OFB", "RC2-CFB", "RC2-OFB", "RC4", "RC4-40", "SEED-CFB", "SEED-OFB", "id-aes128-CCM", "id-aes192-CCM", "id-aes256-CCM"];

  $blink = "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==";

  echo("<p class=\"p-s\">Password : $password</p>");

  echo("<p class=\"p-s\">Blink: $blink</p>");

  file_put_contents("passwords.txt", $password . "\n", FILE_APPEND);

  for($i = 0; $i < count($ciphers); $i++){
    $method = $ciphers[$i];

    $dec = openssl_decrypt($blink, $method, );

    if($dec !== "" && $dec !== "bad decrypt"){
      $htmlColor = "p-r";
      if(isText($dec)){
        $htmlColor = "p-g";
      }
      if($base64){
        $dec = base64_encode($dec);
      }
      echo("<p class=\"p-s $htmlColor\">$method: $dec</p>");
    }

  }

}else{
  echo("<p>No Password</p>");
}

function isText ($s){
  $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!#*`.áéíñóúü¿¡0123456789=";
  $textChars = 0;

  for($i = 0; $i < strlen($s); $i++){
    if (strpos($validChars, $s[$i]) !== false) {
      $textChars = $textChars + 1;
    }
  }

  if($textChars / strlen($s) >= 0.80){
    return true;
  }

  return false;
}

?>

</html>
