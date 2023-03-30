<?php
  //Acquiring bootstrap.php
  require_once __DIR__.'/bootstrap.php';
  require_once __DIR__.'/database.php';

  //Setting Cache Control
  header("cache-control: private, max-age=86400");

  //Get the db object
  $db = new Db();

  //Performing a query to retrieve all the records from the locations table
  $workers = $db -> select("SELECT * FROM worker_info");

  //Passing necessary parameters to html template to render the page
  echo $twig->render('workers.html', array("title" => "Workers",
  "mastheadImg" => "masthead-workers",
  "MTitle" => "Workers",
  "MSTitle" => "Meet the crew",
  "workers" => $workers));

?>
