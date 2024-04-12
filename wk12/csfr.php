<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['user'];
  $password = $_POST['password'];
  if ($username == 'host' && $password == 'pass') {
    echo '<div id="msg">Login Successfully!</div>';
  } else {
    echo '<div id="msg">Error! Login Failed!</div>';
  }
}
?>

<div id="msg"></div><br />
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <label for="user">Username:</label><br />
  <input type="text" name="user" value="<?php if(isset($_POST['user'])) echo htmlspecialchars($_POST['user']); ?>"><br />
  <label for="pwd">Password:</label><br />
  <input type="password" name="pwd" value="<?php if(isset($_POST['pwd'])) echo htmlspecialchars($_POST['pwd']); ?>"><br /><br />
  <input type="submit" name="submit" value="Submit">
</form>