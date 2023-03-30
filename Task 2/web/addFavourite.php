<?php
  session_start();
  //Saving the variables passed from the get requests
  $itemId = $_GET['itemId'];
  $redirection = $_GET['redirect'];
  $requiredItemId = $_GET['requiredItemId'];

  //If the session array favourites is not set, it will set declare it as an array
  if(!isset($_SESSION['favourites'])) {
    $_SESSION['favourites'] = array();
  }

  //Checking if the itemId is not in session array favourites
  if (!in_array($itemId, $_SESSION['favourites'])) {
    //Adding item to list
    array_push($_SESSION['favourites'], $itemId);
  }//Checking if the itemId is in session array favourites
  elseif (in_array($itemId, $_SESSION['favourites'])) {
    //Removing item from list
    $_SESSION['favourites'] = array_values(array_diff($_SESSION['favourites'], array($itemId)));
  }

  //If original page sources is dishDetails.php
  if ($redirection == 0) {
    //Checking if required item is set
    if (isset($requiredItemId)) {
      //Redirecting to dishDetails.php
      header ("location: dishDetails.php?requiredItemId=$requiredItemId");
    } else {
      //Redirecting to menu.php
      header ("location: menu.php");
    }
  }//If original page sources is favourites.php
  else if ($redirection == 1) {
    header ("location: favourites.php");
  }
?>
