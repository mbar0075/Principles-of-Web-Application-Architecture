<?php
  session_start();
  //Acquiring bootstrap.php and database.php
  require_once __DIR__.'/bootstrap.php';
  require_once __DIR__.'/database.php';

  //If the session array favourites is not set, it will set declare it as an array
  if (!isset($_SESSION['favourites'])) {
    $_SESSION['favourites'] = array();
  }

  //If statement will only execute if requiredItemId was set
  if(isset($_GET['requiredItemId'])) {

      //Get db object
      $db = new Db();
      //quote used to make the requiredItemId safe for querying
      $menuId = $db -> quote($_GET['requiredItemId']);
      //Performing a query to retrieve all the categories from the menu table
      $categories = $db -> select("SELECT * FROM menu");
      //Performing a query to retrieve the required record which's menuId corresponds to the record's itemId
      $result = $db -> select("SELECT a.*, t.categoryName as type FROM items a inner join menu t on a.categoryId = t.categoryID  WHERE a.itemId=". $menuId);

      //If statement will execute if at least 1 record was retrieved
      if (count($result) > 0){
          //Loading data from result and storing into items
          $items = [
                  'itemId'                => $result[0]['itemId'],
                  'itemName'              => $result[0]['itemName'],
                  'itemPrice'             => $result[0]['itemPrice'],
                  'itemDescription'       => $result[0]['itemDescription'],
                  'itemImage'             => $result[0]['itemImage'],
                  'categoryId'            => $result[0]['categoryId'],
          ];
          //Passing necessary parameters to html template to render the page
          echo $twig->render('dishDetails.html', array("title" => "Dish Details",
            "mastheadImg" => "masthead-dish-details",
            "MTitle" => "Los Pollos Dish Details",
            "MSTitle" => "More Information",
            'foodItems' => $items,
            'foodCategories' => $categories,
            'reqdItemId'=>$_GET['requiredItemId'],
            'favouritesSession' => $_SESSION['favourites']));
        }
      //An error occured, and will redirect the user to the error page
      else
          echo $twig->render('error.html',array("title" => "Error 404","PageImgClass" => "errorPageImage","message" => "The page you requested could not be found."));
    //An error occured, and will redirect the user to the error page
  } else
      echo $twig->render('error.html',array("title" => "Error 404","PageImgClass" => "errorPageImage","message" => "The page you requested could not be found."));
?>
