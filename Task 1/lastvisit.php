<!DOCTYPE html>
<?php
// Starting a session
session_start();
?>

<html>
<body>

<h1>Working out the time passed between website visits.</h1>

<?php
if(isset($_SESSION['Date']))
{
    // Retrieves the time stored in the session variables from the previous page instance and converts it to seconds
    $timeBefore = strtotime($_SESSION['Date']);
    // Retrieves the current time and converts it to seconds
    $timeNow = strtotime(date('Y/m/d H:i:s'));
    // Works out the difference in seconds between the two times
    $duration = $timeNow - $timeBefore;
    // Displays a message
    echo "You first used this page ". $duration . " seconds ago";
}
else
{
  // Sets the time session variable the first time the page is visited
  $_SESSION['Date'] = date('Y/m/d H:i:s');
  echo "This is your first time visiting the page";
}
?>
<!--
session_start() is used to indicate the start of a session
strtotime is used to convert a date string into seconds
echo is used to display the relevant message

How it works:

1. A session is created
2. Checks if the Time session variable is set
    if No, then it retrieves the current server date and stores it within the session variable
    (This indicates that the user visited the site for the first time) and outputs "This is your first time visiting the page";

    if Yes, then it retrieves the current date, converts both dates to seconds and subtracts them from each other to get the time passed in seconds and
    outputs "You first used this page X seconds ago"
3. The session is terminated if all instances of the website are closed.
-->
</body>
</html>
