<?php
$users = array(
  "mary"=>"test0", "matt"=>"test1", "lisa"=>"test2"
);

if ( ! isset($users[$postuser]) || $users[$postuser] != $postpass) {

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
