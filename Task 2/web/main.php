<?php
  //Acquiring bootstrap.php and database.php
  require_once __DIR__.'/bootstrap.php';
  require_once __DIR__.'/database.php';

  //Setting Cache Control
  header("cache-control: public, max-age=86400");

  //Get the db object
  $db = new Db();

  //Performing a query to retrieve all the records from the locations table
  $locations = $db -> select("SELECT * FROM locations");
  //Performing a query to retrieve all the categories from the opening_hours table
  $openingHours = $db -> select("SELECT * FROM opening_hours");

  //Passing necessary parameters to html template to render the page
  echo $twig->render('main.html', array("title" => "Main Page",
  "mastheadImg" => "masthead-main",
  "MTitle" => "Welcome to Los Pollos Hermanos",
  "MSTitle" => "It's finger lickin good",
  "locations" => $locations,
  "openingHours" => $openingHours));
?>
