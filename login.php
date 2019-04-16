<?php
require('connect-db.php');
require('course_db.php');   
?>

<!--Sign In Page for the site-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <title>Sign In</title>
   </head>
   <!--call in the css file-->
   <link rel="stylesheet" href="styles/mystyle.css" />
   <!--has the same format as the donate page for the jumbotron task bar-->
   <body class = "donBody">
      <div class = "jumbotron">
         <div class = "container">
            <div id = "todo">
               <table id = "todoTable" class = "table">
                  <thead>
                     <tr>
                        <th><input type="button" class="btn btn-primary" id="home" value="Home" onclick="location.href='home.html';"/></th>
                        <th><input type="button" class="btn btn-primary" id="about" value="About"/></th>
                        <th><input type="button" class="btn btn-primary" id="photos" value="Photos"/></th>
                        <th><input type="button" class="btn btn-primary" id="reviews" value="Reviews"/></th>
                        <th><input type="button" class="btn btn-primary" id="contactUs" value="Contact Us"/></th>
                        <th><input type="button" class="btn btn-primary" id="donate" value="Donate" onclick="location.href='donate.html';"/></th>
                        <th><input type="button" class="btn btn-primary" id="signIn" value="Sign In" onclick="location.href='login.php';"/></th>
                        <th><input type="button" class="btn btn-primary" id="help" value="Help" onclick="location.href='help.php';"/></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
      <!--the title at the top of the Sign In page-->
      <div class="container">
         <h1 class="h1 logH1">Sign In</h1>
      </div>
      <!--a label that allows for the input of a username-->
      <div class="container">
         <label for="uname"><b>Username</b></label>
         <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
      </div>
      <!--a label that allows for the input of a password-->
      <div class="container">
         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      </div>
      <!--a button that calls the JavaScript function signIn()-->
      <div class="container">    
         <button type="submit" value="Login" name="action">Login</button>
         <!--the Cancel button take the user back to the home screen-->
         <button type="button" class="cancelbtn" onclick="location.href='home.html';">Cancel</button>
         <p id="alert"></p>
      </div>
      <div class="container">
         <button type="submit" onclick="location.href='signup.php';">First time? Click here!</button>
      </div>

      <?php
      if (isset($_POST["Login"]) ){
        $host = "localhost";
        $username = "dtmccs4640";
        $password = "pwordfor4640";
        $dbname = "dtmccs4640";
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_POST["Login"])){
          $uname = $conn->escape_string($_POST['username']);
          $sql = "SELECT password FROM users
          WHERE username ='" .$uname."'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc())
          {
            $passwordReq =  $row['password'];
          }
        echo "this is the password:" . $passwordReq;
        }
    }
        
        
       // {
       //     login($_POST['uname'], $_POST['psw']);
       // }
      ?>

      <!--<script>
         /*function that checks the values entered into */
         function signIn(){
             var username = document.getElementById("uname").value;
             var password = document.getElementById("psw").value;
         
            /*if a field is empty, a message will tell them to enter a valid input.*/
             if(username == "" || password == ""){
                 document.getElementById("alert").innerHTML = "Please Enter a Username and/or Password."
             }
             /*if both are entered, it provides feedback and clears the fields.*/
             else{
                 document.getElementById("alert").innerHTML = "You have successfully logged in!"
                 document.getElementById("uname").value = '';
                 document.getElementById("psw").value = '';
             }
         }
      </script>-->
   </body>
</html>