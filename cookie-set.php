<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

<?php
session_start();
// Define a function to handle failed validation attempts 
function reject($entry)
{
   echo 'Exiting';
   exit();    // exit the current script, no value is returned
}

if (isset($_SESSION['user']))
{
   $user = trim($_SESSION['user']);
   if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
      reject('User Name');
   
   if (isset($_SESSION['pwd']))
   {
      $pwd = trim($_SESSION['pwd']);
      if (!ctype_alnum($pwd))
         reject('Password');
      else
      {
      	 // setcookie(name, value, expiery-time)
      	 // setcookie() function stores the submitted fields' name/value pair
         setcookie('user', $user, time()+3600);         
         setcookie('pwd', md5($pwd), time()+3600);  // create a hash conversion of password values using md5() function
         
         // relocate the browser to another page using the header() function to specify the target URL
         header('Location: cookie-get.php');    
      }
   }
}
else  
   header('Location: login.php');

?>