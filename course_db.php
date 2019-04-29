<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

<?php
// Add new user to database
function addUser($uname, $pword, $eml)
{
   global $db;
   $query = "INSERT INTO users (username, password, email) VALUES (:uname, :pword, :eml)";
   $statement = $db->prepare($query);
   $statement->bindValue(':uname', $uname);
   $statement->bindValue(':pword', $pword);
   $statement->bindValue(':eml', $eml);
   $statement->execute();
   $statement->closeCursor();
 
}

// Update a given user's password in database
function updatePword($uname, $pword, $newPword)
{
   global $db;	
   
   $query = "UPDATE users SET password=:newPword WHERE username=:uname AND password=:pword";
   $statement = $db->prepare($query);
   $statement->bindValue(':uname', $uname);
   $statement->bindValue(':pword', $pword);
   $statement->bindValue(':newPword', $newPword);
   $statement->execute();
   $statement->closeCursor();
}

// Finds email of user (if it exists) and sends an email to the user's address so they can reset password
function forgotPword($uname){
   global $db;
   $user = $uname;
   $con=mysqli_connect("localhost", "mattcc1398", NULL, "mattcc1398");
   if(!$con) {
      echo "Could not connect.";
   }
   $query = "SELECT email FROM users WHERE username= '$_POST[uname]'";
   $result = mysqli_query($con, $query) or die(mysqli_error($con));
   while ($row=mysqli_fetch_array($result, MYSQLI_BOTH)){
      echo "Your password has been sent to: " . $row['email'];
   }
}

// Login an existing user
function login($uname, $password){
   global $db;
   $user = $uname;
   $con=mysqli_connect("localhost", "mattcc1398", NULL, "mattcc1398");
   if(!$con) {
      echo "Could not connect.";
   }
   $query = "SELECT psw FROM users WHERE username= '$_POST[uname]'";
   $result = mysqli_query($con, $query) or die(mysqli_error($con));

   $foundPsw = NULL;
   while ($row=mysqli_fetch_array($result, MYSQLI_BOTH)){
      $foundPsw = $row['psw'];
   }
   
   if ($foundPsw == $password && $foundPsw != NULL) {
      $_SESSION['user'] = $uname;
      $_SESSION['pwd'] = $password;
      echo $uname . ", you have successfully logged in! <br>";
      echo '<a href="cookie-set.php">View Cookie</a>';
   } else {
      echo "Username or password are incorrect.";
   }
}

// Destroys session and cookie from a signed in user
function logout() {
   if (count($_COOKIE) > 0)
{
   foreach ($_COOKIE as $key => $value)
   {
   	  // Deletes the variable (array element) where the value is stored in this PHP.
   	  // However, the original cookie still remains intact in the browser.
   	  // unset($_COOKIE[$key]);    
   	
      // To completely remove cookies from the client, set the expiration time to be in the past
      setcookie($key, '', time() - 3600);  
   }
}
if (count($_SESSION) > 0)
{   
   foreach ($_SESSION as $key => $value)
   {
      // Deletes the variable (array element) where the value is stored in this PHP.
      // However, the session object still remains on the server.    	
      unset($_SESSION[$key]);
   }      
   session_destroy();     // complete terminate the session
}
   echo "Successfully logged out";
}
?>