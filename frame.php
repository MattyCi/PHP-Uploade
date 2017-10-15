<?php

// Define your username and password
$username = "admin";
$password = "password";

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) {

?>

<h1>Login</h1>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p><label for="txtUsername">Username:</label>
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p>

    <p><label for="txtpassword">Password:</label>
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p>

    <p><input type="submit" name="Submit" value="Login" /></p>

</form>

<?php

}
else {

?>

<html>
<body>
  <div align="left">
      <form action="upload.php" method="post" enctype="multipart/form-data">
    Select PDF to upload:
    <input  type="file" name="fileToUpload" id="fileToUpload"><br /><br />
    Enter date (mm/dd/yyy): <img src="./images/newsroom_date.png" alt="date" style ="vertical-align: text-bottom;">
    <input type="text" name="date" value="<?php echo date('m/d/y');?>"/><br /><br />
    Enter text: <img src="./images/newsroom_text.png" alt="text" style ="vertical-align: text-bottom;">
    <input type="text" name="linktext"/>
    <input type="hidden" name="monthyear" value="<?php echo date("F Y");?>"/><br /><br />
    <input type="submit" value="Upload PDF" name="submit">
    </form>
  </div>
</body>
</html>

<?php

}

?>
