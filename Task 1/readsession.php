<?php
// Starting a session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h1>Displaying Session variables from processrequest.php</h1>

<?php
// Checks if the session variables are empty and displays an appropriate message
if (empty($_SESSION['fname']) or empty($_SESSION['fage'])) {
  echo "<u>(Session Variables)</u><br> The U_Name or U_Age session parameters are not set";
}
else{
  echo "<u>(Session Variables)</u><br> Username: " . $_SESSION['fname'] . ", " . "Age: " . $_SESSION['fage'];
}
?>

<!--
A session is created everytime the user visits the website if there is no session currently active.
Each user is given a user id which is stored in a cookie this is used to identify the respective session for each user.
Whenever a request is issued for a session varible the user id which is stored as a cookie is used
to check which variables the user has access to. Then the server returns the respective session variables based on the user id.
By default a session lasts until the user closes their browser but this can be changed from within the php.ini file on the web server.
-->

</body>
</html>
