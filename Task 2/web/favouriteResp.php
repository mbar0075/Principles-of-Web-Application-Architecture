<?php
session_start();
//Acquiring bootstrap.php and database.php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//loading the necessary code to send an email
include("PhpMailerConfig.php");

//Get the db object
$db = new Db();
//Setting variable check to 0
$check = 0;
//Performing a query to retrieve all the records from the items table
$items = $db -> select("SELECT * FROM items");
//Performing a query to retrieve all the categories from the menu table
$categories = $db -> select("SELECT * FROM menu");
//Setting all variables to empty
$emailErr = $email = $message = "";

//Check the email field is correct
if(isset($_POST["email"])) {
  if(!empty($_POST["email"])){
    $email = clean_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "*Your email is incorrect*";
    }
    else {
      //Setting the emails which will recieve the message user/owner
      $mail->addAddress($email, '');
      $mail->Subject =  "Favourites List";
      if(is_array($items)){
        foreach($items as $data){
          if (in_array($data['itemId'], $_SESSION['favourites'])) {
            $message .= "Item Name: " . $data['itemName'] . "<br>Item Description: " . $data['itemDescription'] . "<br>Item Price: €" . $data['itemPrice'] . "<br>More Info: " . "http://localhost/ProjectPart2/web/dishDetails.php?requiredItemId=" . $data['itemId'] . "<br><br>";
            $mail->addAttachment($data['itemImage']);
          }
        }
          //Setting the email message
          $mail->Body = $message;
      }
      //Sending the email
      $mail->send();
    }
  }
  else{
    $emailErr = "*The email field must be filled*";
  }
}

//If no errors have occured redirection occurs and the thankyou message is displayed
if ($emailErr == "") {
  $_SESSION['emailError'] = "";
  $_SESSION['email'] = "";
  $_SESSION['tnxMessage'] = "Your favourites list has been sent.";
  //Redirecting to favourites.php and passing p=0 which is used to denote that no erorrs have occured
  header("location: favourites.php?p=0");
}
else {//If errors have occured redirection occurs and the error message is displayed
  $_SESSION['tnxMessage'] = "";
  $_SESSION['emailError'] = $emailErr;
  $_SESSION['email'] = $email;
  //Redirecting to favourites.php and passing p=1 which is used to denote that an erorr has occured
  header("location: favourites.php?p=1");
}
?>
