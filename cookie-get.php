<?php

if (isset($_COOKIE['user']))
{
   $user = trim($_COOKIE['user']);
   echo "<h1>Welcome $user ! </h1> <hr />";
   echo '<a href="cookie-data.php">View Cookie</a>';
}
else  
   echo 'Please <a href="login.php">Log in</a>';

?>