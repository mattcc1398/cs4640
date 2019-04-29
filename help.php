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
      <title>Help</title>
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
                        <th><input type="button" class="btn btn-primary" id="home" value="Home" onclick="location.href='home.php;"/></th>
                        <th><input type="button" class="btn btn-primary" id="about" value="About"/></th>
                        <th><input type="button" class="btn btn-primary" id="photos" value="Photos"/></th>
                        <th><input type="button" class="btn btn-primary" id="reviews" value="Reviews"/></th>
                        <th><input type="button" class="btn btn-primary" id="contactUs" value="Contact Us"/></th>
                        <th><input type="button" class="btn btn-primary" id="donate" value="Donate" onclick="location.href='donate.html';"/></th>
                        <th><input type="button" class="btn btn-primary" id="signIn" value="Sign In" onclick="location.href='login.php';"/></th>
                        <th><input type="button" class="btn btn-primary" id="help" value="Help"/></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
      <!--the title at the top of the Sign In page-->
      <div class="container">
         <h1 class="h1 logH1">What do you need help with?</h1>
      </div>
      <div class="container">
         <button type="submit" onclick="location.href='update.php';">Update Password?</button>
      </div>
      <div class="container">
          <button type="submit" onclick="location.href='forgot.php';">Forgot Password?</button>
      </div>
    </body>
</html>