<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->

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
            <input type="text" name="uname"/> <br/>  
         <label>Password: </label>
            <input type="password" name="pword"/> <br/>         
            <input type="submit" value="Login" name="action"  />
            <input type="submit" value="Logout" name="action2" />   
         </form>
         <br>
      </div>
      <div class="container">
         <button type="submit" onclick="location.href='signup.php';">First time? Click here!</button>
      </div>

      <?php
      session_start();

      if (isset($_POST['uname']) && (!empty($_POST['action']))) {
         $user = trim($_POST['uname']);
         if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
            echo "Username must be alphanumeric only please. <br>";
         
         if (isset($_POST['pword']) && (!empty($_POST['action'])))
         {
            $pwd = trim($_POST['pword']);
            if (!ctype_alnum($pwd))
               echo "Password must be alphanumeric only please. <br>";
            else
            {
               // Set session variables to save session
               $_SESSION['user'] = $user;
               $_SESSION['pwd'] = $pwd;
         
               // relocate the browser to another page using the header() function to specify the target URL
            }
         }
      }
      // Display who is logged in and log out if button is pressed
      if (!empty($_POST['action']) && ($_POST['action'] == 'Login'))
      {
         login($_POST['uname'], $_POST['pword']);
      }
      if (isset($_SESSION['user']) && empty($_POST['action2'])) {
         echo "<br>";
         echo "Logged in as " . $_SESSION['user'];
      } else if (isset($_SESSION['user']) && !empty($_POST['action2']) && $_POST['action2'] == 'Logout') {
         logout();
      }

      
      ?>
   </body>
</html>