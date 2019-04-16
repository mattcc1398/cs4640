<?php
require('connect-db.php');
require('course_db.php');   
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  
  <title>Forgot Password</title>    
</head>
<body>
  
  <div class="container">
  <h3>Forgot Password?</h3>
  <p>Please enter your username.</p>
  <br/>
  
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label>Username: </label>
      <input type="text" name="uname" required /> <br/>            
      <input type="submit" value="Send" name="action"  />   
      <input type="submit" value="Return to Sign in" onclick="location.href='login.php';" />
  </form>

  </div>
<?php
   if (!empty($_POST['action']) && ($_POST['action'] == 'Send'))
   {
      forgotPword($_POST['uname']);
   }
?>


</body>
</html>