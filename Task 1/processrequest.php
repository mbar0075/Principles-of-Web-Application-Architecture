<?php
// Starting a session
session_start();
?>

<html>
<body>

<h1>Dealing with Get and Post requests</h1>

<!--Form dealing with post requests-->
<h2>Post Method</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fnameP"><br>
  Age: <input type="number" name="fageP"><br>
  <input type="submit">
</form>

<!--Form dealing with get requests-->
<h2>Get Method</h2>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fnameG"><br>
  Age: <input type="number" name="fageG"><br>
  <input name = "submit" type="submit">
</form>

<?php
if (isset($_POST['fnameP']) and isset($_POST['fageP']) and $_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $_SESSION['fname'] =  $_POST['fnameP'];
  $_SESSION['fage'] = $_POST['fageP'];
}
elseif (isset($_GET['fnameG']) and isset($_GET['fageG']) and $_SERVER["REQUEST_METHOD"] == "GET") {
  // collect value of input field
  $_SESSION['fname'] = $_GET['fnameG'];
  $_SESSION['fage'] = $_GET['fageG'];
}
?>

</body>
</html>
