<?php
  require 'globals.php';

  if(!isset($_GET["code"])){
    header('Location: '.$auth_url); // go to instagram get authenticated
  }
  else{
      $code = $_GET['code'];
      $data = authPost($code);
      $token = $data->access_token;
      $_SESSION["access_token"] = $token;
      //var_dump($_SESSION);
  }


$_SESSION['client_id'] = 'd96ed8e9ff184b0ba8b700b8899f76e5';
$_SESSION['client_secret'] = '45097f35a7a0427e847e44838329a0f9';
$_SESSION['grant_type'] = 'authorization_code';
$_SESSION['redirect_uri'] = 'http://localhost/dogs_for_atti';
$auth_url = "https://api.instagram.com/oauth/authorize/?client_id=d96ed8e9ff184b0ba8b700b8899f76e5&redirect_uri=http://localhost/dogs_for_atti&response_type=code";


// function getToken(){
//   $_SESSION['access_token'] = "";
//   authPost($_SESSION['access_token']);
// }

function authPost($code){
  $oauth_access_token_url = "https://api.instagram.com/oauth/access_token";
  $payload_string = "";
  $payload = array(
    'client_id' => $_SESSION['client_id'],
    'client_secret' => $_SESSION['client_secret'],
    'grant_type' => $_SESSION['grant_type'],
    'redirect_uri' => $_SESSION['redirect_uri'],
    'code' => $code
  );
  $p = json_encode($payload, 128);
  $output = array();

  foreach($payload as $key=>$value) { $payload_string .= $key.'='.$value.'&'; }
  rtrim($payload_string, '&');



  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $oauth_access_token_url);
  curl_setopt($ch,CURLOPT_POST, count($payload));
  curl_setopt($ch,CURLOPT_POSTFIELDS, $payload_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 90);
  //execute post
  $result = curl_exec($ch);
  if (!$result) {
      throw new InstagramException('Error: _makeOAuthCall() - cURL error: ' . curl_error($ch));
  }
  curl_close($ch);

  $data = json_decode($result);

  return $data;
}

?>


?>
