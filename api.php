<?php
  error_reporting(E_ALL);


$auth = "https://api.instagram.com/oauth/authorize/?client_id=2ec444ecc7b8433a86e8415a1b1aa31b&redirect_uri=www.bkbarton.com&response_type=code";


$url = "https://api.instagram.com/v1/tags/dogsofinstgram/media/recent?access_token=2ec444ecc7b8433a86e8415a1b1aa31b";

function getUrlContent($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  $data = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  curl_close($ch);
  return ($httpcode>=200 && $httpcode<300) ? $data : false;
}

  $res = getUrlContent($auth);

  print_r($res);
  echo($res);
  echo "HI";
?>
