<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['user'];
  $password = $_POST['password'];
  if ($username == 'host' && $password == 'pass') {
    $_SESSION['confirmation'] = $_POST['confirmation'];
    echo '<div id="msg">Login Successfully!</div>';
  } else {
    echo '<div id="msg">Error! Login Failed!</div>';
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $confirmation = $_POST['confirmation'];
  if (isset($_SESSION['confirmation']) && $_SESSION['confirmation'] === $confirmation) {
    echo '<div id="msg">Session variable and confirmation value are equal!</div>';
  } else {
    echo '<div id="msg">Session variable and confirmation value are not equal!</div>';
  }
}
?>

<div id="msg"></div><br />
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <label for="user">Username:</label><br />
  <input type="text" name="user" value="<?php if(isset($_POST['user'])) echo htmlspecialchars($_POST['user']); ?>"><br />
  <label for="password">Password:</label><br />
  <input type="password" name="password" value="<?php if(isset($_POST['pwd'])) echo htmlspecialchars($_POST['pwd']); ?>"><br /><br />
  <label for="confirmation">Confirmation:</label><br />
  <input type="text" name="confirmation" value="<?php if(isset($_POST['confirmation'])) echo htmlspecialchars($_POST['confirmation']); ?>"><br /><br />
  <input type="submit" name="submit" value="Submit">
</form>