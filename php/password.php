<?php

//Json class
class json
{
  function json(){
    $input;
    $output;
    $password;
  }
}

//Set Content-Type to json
header('Content-Type: application/json');

//Check if GET data exists
if (isset($_GET["password"]) && isset($_GET["blink"])){

  $blinks = ["U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqklaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRlipRkwB0K1Y96Qsv2Lm+31cmzaAlLwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqlHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX1+vupppZksvRf5pq5g5XjFRIipRkwB0K1Y96Qsv2Lm+31cmzaAILwytX/z66ZVWEQM/ccf1g+9m5Ubu1+sit+A9cenDxxqkIaxbm4cMeh2oKhqIHhdaBKOi6XX2XDWpa6+P5o9MQw==", "U2FsdGVkX19aNZWCoshntRGFLfhtA32hPFwbUIFZu+8fTq2S"];

  //Set blink by index from $blinks
  $blink = $blinks[intval($_GET["blink"])];

  //urldecode password
  $password = urldecode($_GET["password"]);

  //Set ciphers
  $ciphers = [ "AES-128-CFB", "AES-128-CFB1", "AES-128-CFB8", "AES-128-CTR", "AES-128-OFB", "AES-192-CFB", "AES-192-CFB1", "AES-192-CFB8", "AES-192-CTR", "AES-192-OFB", "AES-256-CFB", "AES-256-CFB1", "AES-256-CFB8", "AES-256-CTR", "AES-256-OFB", "BF-CFB", "BF-OFB", "CAST5-CFB", "CAST5-OFB", "DES-CFB", "DES-CFB1", "DES-CFB8", "DES-EDE-CFB", "DES-EDE-OFB", "DES-EDE3-CFB", "DES-EDE3-CFB8", "DES-EDE3-OFB", "DES-OFB", "RC2-CFB", "RC2-OFB", "RC4", "RC4-40", "SEED-CFB", "SEED-OFB"];

  //Create an empty array
  $list = [];

  //Add $password to passwords.txt, if it`s the first request
  if($blink == $blinks[0]){
    file_put_contents("/var/www/html/passwords.txt", $password . "\n", FILE_APPEND);
  }

  //Encrypt for every method
  for($i = 0; $i < count($ciphers); $i++){
    $method = $ciphers[$i];

    $dec = exec("echo $blink | openssl $method -base64 -d -k " . escapeshellarg($password). " 2>&1 | base64");

    $list[$method] = $dec;

  }

  //Build json output
  $json = new json();
  $json->input = $blink;
  $json->password = $password;
  $json->output = $list;
  echo(json_encode($json));

}else{
  echo(json_encode("err"));
}

?>
