<?php
  session_start();
  //Acquiring bootstrap.php and database.php
  require_once __DIR__.'/bootstrap.php';
  require_once __DIR__.'/database.php';

  //If the session array favourites is not set, it will set declare it as an array
  if (!isset($_SESSION['favourites'])) {
    $_SESSION['favourites'] = array();
  }

  //Get the db object
  $db = new Db();
  //Setting variable check to 0
  $check = 0;
  //Performing a query to retrieve all the records from the items table
  $items = $db -> select("SELECT * FROM items");
  //Performing a query to retrieve all the categories from the menu table
  $categories = $db -> select("SELECT * FROM menu");

  /*Checking whether it was the first time the user accessed the website
   *If p is set, this would imply that this isn't the first time the user accessed
   *the website*/
  if(isset($_GET['p'])){
    //If statement that will execute if the email was sent successfully
    if($_GET['p']==0){
      /*Passing necessary parameters to html template to render the page
       *One of said parameters being a thank you message, since email was sent successfully
       */
      echo $twig->render('favourites.html', array("title" => "Favourites",
      "mastheadImg" => "masthead-favourite",
      "MTitle" => "Favourites List",
      "MSTitle" => "Always a Delight",
      'foodItems' => $items,
      'foodCategories' => $categories,
      'favouritesSession' => $_SESSION['favourites'],
      'check' => $check,
      'tnxMessage' => $_SESSION['tnxMessage']));
    }
    //If statement that will execute if an error occured and email was not sent
    elseif($_GET['p']==1){
      /*Passing necessary parameters to html template to render the page
       *Parameters include the incorrect email entered by the user, as
       *the error which occured.
       */
      echo $twig->render('favourites.html', array("title" => "Favourites",
      "mastheadImg" => "masthead-favourite",
      "MTitle" => "Favourites List",
      "MSTitle" => "Always a Delight",
      'foodItems' => $items,
      'foodCategories' => $categories,
      'favouritesSession' => $_SESSION['favourites'],
      'check' => $check,
      'emailError' => $_SESSION['emailError'],
      'email' => $_SESSION['email']));
    }
  }
  //Else statement will only execute if it was the first time the user accessed the website
  else{
    //Passing necessary parameters to html template to render the page
    echo $twig->render('favourites.html', array("title" => "Favourites",
    "mastheadImg" => "masthead-favourite",
    "MTitle" => "Favourites List",
    "MSTitle" => "Always a Delight",
    'foodItems' => $items,
    'foodCategories' => $categories,
    'favouritesSession' => $_SESSION['favourites'],
    'check' => $check,
    'tnxMessage' => ""));
  }

?>
