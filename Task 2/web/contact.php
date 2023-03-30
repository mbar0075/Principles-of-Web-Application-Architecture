<?php
session_start();

require_once __DIR__.'/bootstrap.php';
header("cache-control: private, max-age=86400");

/*Checking if parameter p exists
if yes then the page with the necessaery info is loaded
otherwise the basic page is loaded*/
if(isset($_GET['p'])){
  if($_GET['p']==0){//Loads the page with the required thank you message
    echo $twig->render('contact.html', array(
    "title" => "Contact",
    "mastheadImg" => "masthead-contact",
    "MTitle" => "Contact Us",
    "MSTitle" => "Join us for a tasty meal",
    "tnxMessage" => $_SESSION["tnxMessage"],
    "tnxMessage2" => $_SESSION["tnxMessage2"]));
  }
  elseif($_GET['p']==1){//Loads the page with the specified errors
    echo $twig->render('contact.html', array(
    "title" => "Contact",
    "mastheadImg" => "masthead-contact",
    "MTitle" => "Contact Us",
    "MSTitle" => "Join us for a tasty meal",
    "name" => $_SESSION["name"],
    "mobileNo" => $_SESSION["mobileNo"],
    "noOfPeople" => $_SESSION["noOfPeople"],
    "date" => $_SESSION["date"],
    "message" => $_SESSION["message"],
    "message2" => $_SESSION["message2"],
    "subject" => $_SESSION["subject"],
    "email" => $_SESSION["email"],
    "email2" => $_SESSION["email2"],
    "nameErr" => $_SESSION["nameErr"],
    "mobileNoErr" => $_SESSION["mobileNoErr"],
    "noOfPeopleErr" => $_SESSION["noOfPeopleErr"],
    "dateErr" => $_SESSION["dateErr"],
    "messageErr" => $_SESSION["messageErr"],
    "subjectErr" => $_SESSION["subjectErr"],
    "emailErr" => $_SESSION["emailErr"],
    "emailErr2" => $_SESSION["emailErr2"]));
  }
}
else{//Loading the basic version of the page
    echo $twig->render('contact.html', array(
    "title" => "Contact",
    "mastheadImg" => "masthead-contact",
    "MTitle" => "Contact Us",
    "MSTitle" => "Join us for a tasty meal",
    "tnxMessage" => "",
    "tnxMessage2" => ""));
}
?>
