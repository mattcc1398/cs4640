<?php
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
      echo $uname . ", you have successfully logged in! <br>";
      echo '<a href="cookie-set.php">View Cookie</a>';
   } else {
      echo "Username or password are incorrect.";
   }
}
?>