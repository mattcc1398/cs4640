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

   $username = "dtmccs4640"; 
   $password = "pwordfor4640"; 
   $database = "dtmccs4640"; 
   $mysqli = new mysqli("localhost", $username, $password, $database); 
   $query = "SELECT email FROM users WHERE username=:uname";


   $result = $mysqli->query($query);
   echo "this is the result: " . $result;
   }


function login($uname, $psw){
   
}

?>