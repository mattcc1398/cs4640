<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

<?php

if (isset($_COOKIE['user']))
{
   // Retrieve cookie data
   $user = trim($_COOKIE['user']);
   echo "<h1>Welcome $user ! </h1> <hr />";
   echo '<a href="cookie-data.php">View Cookie</a>';
}
else  
   // If a cookie has not been set for the user they need to log in to get one
   echo 'Please <a href="login.php">Log in</a>';

?>