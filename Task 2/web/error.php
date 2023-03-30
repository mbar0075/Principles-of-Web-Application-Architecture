<?php
  //Acquiring bootstrap.php
  require_once __DIR__.'/bootstrap.php';
  //Setting Cache Control
  header("cache-control: public, max-age=86400");

  //Retrieving server ip/name
  $ip = $_SERVER['SERVER_NAME'];

  /*Depending on the type of error, the necessary parameters are passed to html template to render the page*/
  if(http_response_code() == 404){
    echo $twig->render('error.html',array("title" => "Error 404","PageImgClass" => "errorPageImage","message" => "The page you requested could not be found.", "ip" => $ip));
  }
  elseif(http_response_code() == 403){
    echo $twig->render('error.html',array("title" => "Error 403","PageImgClass" => "errorPageImage","message" => "Forbidden Access.", "ip" => $ip));
  }

?>
