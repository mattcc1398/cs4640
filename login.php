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
                        <th><input type="button" class="btn btn-primary" id="home" value="Home" onclick="location.href='home.php';"/></th>
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
      <!--a button that calls the JavaScript function signIn()-->
      <div class="container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> 
         <label>Username: </label>
            <input type="text" name="uname" required /> <br/>  
         <label>Password: </label>
            <input type="password" name="pword" required /> <br/>         
            <input type="submit" value="Login" name="action"  />   
         </form>
         <br>
      </div>
      <div class="container">
         <button type="submit" onclick="location.href='signup.php';">First time? Click here!</button>
      </div>

      <?php
      session_start();

      if (isset($_POST['uname'])) {
         $user = trim($_POST['uname']);
         if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
            echo "Username must be alphanumeric only please. <br>";
         
         if (isset($_POST['pword']))
         {
            $pwd = trim($_POST['pword']);
            if (!ctype_alnum($pwd))
               echo "Password must be alphanumeric only please. <br>";
            else
            {
               $_SESSION['user'] = $user;
               $_SESSION['pwd'] = $pwd;
         
               // relocate the browser to another page using the header() function to specify the target URL
               //header('Location: session-get.php');    
            }
         }
      }

      if (!empty($_POST['action']) && ($_POST['action'] == 'Login'))
      {
         login($_POST['uname'], $_POST['pword']);
      }
      
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