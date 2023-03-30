<?php
  //Acquiring bootstrap.php and database.php
  require_once __DIR__.'/bootstrap.php';
  require_once __DIR__.'/database.php';

  //Get the db object
  $db = new Db();

  //Performing a query to retrieve all the records from the items table
  $items = $db -> select("SELECT * FROM items");
  //Performing a query to retrieve all the categories from the menu table
  $categories = $db -> select("SELECT * FROM menu");
  //Passing necessary parameters to html template to render the page
  echo $twig->render('menu.html', array("title" => "Menu",
  "mastheadImg" => "masthead-menu",
  "MTitle" => "LOS POLLOS HERMANOS MENU",
  "MSTitle" => "Choose your Meal!",
  'foodItems' => $items,
  'foodCategories' => $categories));
?>
