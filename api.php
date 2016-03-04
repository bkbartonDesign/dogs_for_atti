<?php

  include("globals.php");

  $auth = "https://api.instagram.com/oauth/authorize/?client_id=d96ed8e9ff184b0ba8b700b8899f76e5&redirect_uri=http://localhost/dogs_for_atti&response_type=code";
  $url = "https://api.instagram.com/v1/tags/dogsofinstgram/media/recent?access_token=";



function getUrlContent($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  $data = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  print_r($data);
  curl_close($ch);
  return ($httpcode>=200 && $httpcode<300) ? $data : false;
}

  $res = getUrlContent($url);

  //print_r($res);

?>
