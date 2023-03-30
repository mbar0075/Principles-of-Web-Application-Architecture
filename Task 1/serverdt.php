<!DOCTYPE html>
<html>
<body>

<h1>Returning current server time</h1>

<?php
// Starting a session
session_start();
// Getting and storing current date and time
$_SESSION['time'] = date('d/m/Y h:i:s a', time());
// printing the contents of the data variable on screen
echo $_SESSION['time'];
?>

</body>
</html>
