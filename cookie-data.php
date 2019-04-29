<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

<?php

// Loop through cookies, showing data for each one
if (count($_COOKIE) > 0)
{
   echo '<dl>';
   foreach ($_COOKIE as $key => $value)
   {
      echo "<dt>Key: $key";
      echo "<dd>Value: $value";
   }
   echo '</dl><hr />';
   echo '<a href="login.php">Return</a>';
}
else
   echo 'Please <a href="login.php" >Log in</a>';

?>