<?php
session_start();

require_once __DIR__.'/bootstrap.php';
header("cache-control: private, max-age=86400");

//loading the necessary code to send an email
include("PhpMailerConfig.php");

//Setting all variables to empty
$nameErr = $emailErr = $emailErr2 = $mobileNoErr = $noOfPeopleErr = $dateErr = $messageErr = $subjectErr = "";
$name = $mobileNo = $noOfPeople = $date = $message = $message2 = $subject = $email = $email2 = $thankYouMsg = "";

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["mobile-no"]) && isset($_POST["no-of-people"]) && isset($_POST["date"])) {
  //Check the name field is correct
  if(!empty($_POST["name"])){
    $name = clean_input($_POST["name"]);
  }
  else{
    $nameErr = "*The name field must be filled*";
  }

  //Check the email field is correct
  if(!empty($_POST["email"])){
    $email = clean_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "*Your email is incorrect*";
    }
    else{
      //Setting the emails which will recieve the message user/owner
      $mail->addAddress($email, '');
      $mail->addAddress($config['replyToEmail'], $config['replyToAlias']);
    }
  }
  else{
    $emailErr = "*The email field must be filled*";
  }

  //Check the mobileNo field is correct
  if(!empty($_POST["mobile-no"])){
    $mobileNo = clean_input($_POST["mobile-no"]);
    if(strlen($mobileNo) > 8 || strlen($mobileNo) < 8){
      $mobileNoErr = "*Your mobileNo must be 8 characters long*";
    }
  }
  else{
    $mobileNoErr = "*The mobileNo field must be filled*";
  }

  //Check the noOfPeople field is correct
  if(!empty($_POST["no-of-people"])){
    $noOfPeople = clean_input($_POST["no-of-people"]);
    if($noOfPeople > 30 || $noOfPeople < 0){
      $noOfPeopleErr = "*invlaid number of people per booking*";
    }
  }
  else{
    $noOfPeopleErr = "*The no of people field must be filled*";
  }

  //Check the date field is correct
  if(!empty($_POST["date"])){
    $date = clean_input($_POST["date"]);

    $orderdate = explode('-', $date);
    $month =  intval($orderdate[1]);
    $day   =  intval($orderdate[2]);
    $year  =  intval($orderdate[0]);

    if(checkdate($month,$day,$year) == false){
        $dateErr = "*The date field is invalid*";
    }
    else{
      $now = date('Y/m/d', time());
      if(strtotime($date) < strtotime($now)){
        $dateErr = "*The date field is in the past*";
      }
    }
  }
  else{
    $dateErr = "*The date field must be filled*";
  }

  //Setting the email message
  $mail->Body = "Name: " . $name . "<br>" . "Mobile No: " . $mobileNo . "<br>" . "No of people: " . $noOfPeople . "<br>" . "Booked Date: " . $date;
  //Setting the email subject
  $mail->Subject = "Booking";

  //If no error were found the email is sent otherwise the necessary error messages are passed to the page to be displayed to the user
  if($nameErr == $mobileNoErr && $mobileNoErr == $emailErr && $emailErr == $noOfPeopleErr && $noOfPeopleErr == $dateErr && $dateErr == ""){
    //Sending the email
    $mail->send();
    //Assigning the required thankyou message
    $_SESSION["tnxMessage"] = "Booking received.";
    $_SESSION["tnxMessage2"] = "";
    //Resetting the variable values
    $name = $mobileNo = $noOfPeople = $date = $message = $message2 = $subject = $email = $email2 = "";
  }
  else{//Passing on the required error messages
    $_SESSION["name"] = $name;
    $_SESSION["mobileNo"] = $mobileNo;
    $_SESSION["noOfPeople"] = $noOfPeople;
    $_SESSION["date"] = $date;
    $_SESSION["message"] = $message;
    $_SESSION["message2"] = $message2;
    $_SESSION["subject"] = $subject;
    $_SESSION["email"] = $email;
    $_SESSION["email2"] = $email2;
    $_SESSION["nameErr"] = $nameErr;
    $_SESSION["mobileNoErr"] = $mobileNoErr;
    $_SESSION["noOfPeopleErr"] = $noOfPeopleErr;
    $_SESSION["dateErr"] = $dateErr;
    $_SESSION["messageErr"] = $messageErr;
    $_SESSION["subjectErr"] = $subjectErr;
    $_SESSION["emailErr"] = $emailErr;
    $_SESSION["emailErr2"] = $emailErr2;
    //Redirecting to contact.php and passing p=1 which is used to denote that an erorr has occured
    header("location: contact.php?p=1");
  }
}

if(isset($_POST["message"]) && isset($_POST["email2"]) && isset($_POST["subject"])) {

  //Check the message field is correct
  if(!empty($_POST["message"])){
    $message2 = clean_input($_POST["message"]);
    if(strlen($message2) > 500){
      $messageErr = "*Your Message must be less than 500 characters*";
    }
    else{
      //Setting the email message
      $mail->Body = $message2;
    }
  }
  else{
    $messageErr = "*You must leave a message*";
  }

  //Check the email field is correct
  if(!empty($_POST["email2"])){
    $email2 = clean_input($_POST["email2"]);
    if(!filter_var($email2, FILTER_VALIDATE_EMAIL)){
      $emailErr2 = "*Your email is incorrect*";
    }
    else{
      $mail->addAddress($email2, '');
      $mail->addAddress('pollosowner@gmail.com', 'Los Pollos Owner');
    }
  }
  else{
    $emailErr2 = "*The email field must be filled*";
  }

  //Check the subject field is correct
  if(!empty($_POST["subject"])){
    $subject = clean_input($_POST["subject"]);
  }
  else{
    $subjectErr = "*The subject field must be selected*";
  }

  //If no error were found the email is sent otherwise the necessary error messages are passed to the page to be displayed to the user
  if($messageErr == $emailErr && $emailErr == $subjectErr && $subjectErr == ""){
    //Setting the email subject
    $mail->Subject = $_POST["subject"];
    //Sending the email
    $mail->send();
    //Assigning the required thankyou message
    $_SESSION["tnxMessage"] = "";
    $_SESSION["tnxMessage2"] = $_POST["subject"]." received";
    //Resetting the variable values
    $name = $mobileNo = $noOfPeople = $date = $message = $message2 = $subject = $email = $email2 = "";
  }
  else{//Passing on the required error messages
    $_SESSION["name"] = $name;
    $_SESSION["mobileNo"] = $mobileNo;
    $_SESSION["noOfPeople"] = $noOfPeople;
    $_SESSION["date"] = $date;
    $_SESSION["message"] = $message;
    $_SESSION["message2"] = $message2;
    $_SESSION["subject"] = $subject;
    $_SESSION["email"] = $email;
    $_SESSION["email2"] = $email2;
    $_SESSION["nameErr"] = $nameErr;
    $_SESSION["mobileNoErr"] = $mobileNoErr;
    $_SESSION["noOfPeopleErr"] = $noOfPeopleErr;
    $_SESSION["dateErr"] = $dateErr;
    $_SESSION["messageErr"] = $messageErr;
    $_SESSION["subjectErr"] = $subjectErr;
    $_SESSION["emailErr"] = $emailErr;
    $_SESSION["emailErr2"] = $emailErr2;
    $_SESSION["tnxMessage"] = "";
    $_SESSION["tnxMessage2"] ="";
    //Redirecting to contact.php and passing p=1 which is used to denote that an erorr has occured
    header("location: contact.php?p=1");
  }
}

//If no errors occur the page is redirected to with p=0 signallign no errors and displayign the relevant error message
if($nameErr == $emailErr && $emailErr == $emailErr2 &&
$emailErr2 == $mobileNoErr && $mobileNoErr == $noOfPeopleErr &&
$noOfPeopleErr == $dateErr && $dateErr == $messageErr &&
$messageErr == $subjectErr && $subjectErr == ""){
  //Redirecting to contact.php and passing p=0
  header("location: contact.php?p=0");
}
?>
