<!DOCTYPE html>
<!--Matthew Castello (mcc8ny) and Danny Thompson (djt5pf)-->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <!--This function directs the cursor to the comment box-->
      <script type="text/javascript">
         function setFocus()
         {
            document.getElementById("comment").focus(); 
         }
      </script>
      <!--For input validation, red error messages appear below forms-->
      <style>
         .error {
         color: red; 
         font-style: italic;
         }
      </style>
   </head>
   <!--Custom external style sheet-->
   <link rel="stylesheet" href="styles/mystyle.css" />
   <body>
      <h1>ALPHA SIGMA PHI</h1>
      <h2>
         Zeta Upsilon Chapter 
         <div class="5u 12u(medium)">
            <img src="images/asig.jpg" width="300px" height="300px">
         </div>
      </h2>
      <h3>University of Virginia</h3>
      <!--Jumbotron banner displays toolbar with link to each page on the site-->
      <div class="jumbotron">
         <div class="container">
            <div id="todo">
               <table id="todoTable" class="table" >
                  <thead>
                     <tr>
                        <th><input type="button" onclick="location.href='home.php';"class="btn btn-primary" id="home" value="Home"/></th>
                        <th><input type="button" class="btn btn-primary" id="about" value="About"/></th>
                        <th><input type="button" class="btn btn-primary" id="photos" value="Photos"/></th>
                        <th><input type="button" class="btn btn-primary" id="reviews" value="Reviews"/></th>
                        <th><input type="button" class="btn btn-primary" id="contactUs" value="Contact Us"/></th>
                        <th><input type="button" onclick="location.href='donate.html';"class="btn btn-primary" id="donate" value="Donate"/></th>
                        <th><input type="button" class="btn btn-primary" id="signIn" value="Sign In" onclick="location.href='login.php';"/></th>
                        <th><input type="button" class="btn btn-primary" id="help" value="Help" onclick="location.href='help.php';"/></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
      </div>
      <div class="container">
         <h1>News</h1>
         <p>We are excited to announce our partnership with Chipotle to promote brain cancer research. This Monday, 3/18/19,
            from 5-9PM, 1/3 of all profits made by the Chipotle on Barracks Road will be donated to The American Brain 
            Tumor Association at no additional cost to you. Please come and support the cause!
         </p>
         <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <dl>
               <dt>Name:
               <dd><input type="text" id="name" name="userName" 
                  value="<?php
                     if (isset($_POST['userName']))
                         echo $_POST['userName'];
                     ?>" /></dd>
               <dt>Comment:
               <dd><textarea rows="5" cols="40" id="comment" name="userComment" 
                  value="<?php
                     if (isset($_POST['userComment']))
                         echo $_POST['userComment'];
                     ?>"></textarea> </dd>
            </dl>
            <input type="submit" class="btn btn-light" id="add" value="Post Comment" onclick="addRow()"/> 
         </form>
         <?php
            $name = $comment = NULL;
          
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['userName']))
                    echo "Please enter your name <br />";
                else
                    $name = trim($_POST['userName']);
                
                if (empty($_POST['userComment']))
                    echo "Please enter comment <br />";
                else
                    $comment = trim($_POST['userComment']);
            }
            ?>
         <br/>
      </div>
      <br/> 
      <hr/>
      <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $comment = $_POST['userComment'];
             $name = $_POST['userName'];
         }
         
         if ($name != NULL && $comment != NULL) {
            echo $name . " wrote: " . $comment . "<br>";
         }
         
         ?>
   </body>
</html>