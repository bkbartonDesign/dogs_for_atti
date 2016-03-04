<?php
  include("globals.php");

  if(!isset($_SESSION["access_token"])){
    header('Location: ./auth.php');
  }
?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="app.css"/>
    <script>
    </script>
  </head>
  <body>

    <h1>yo.</h1>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>
