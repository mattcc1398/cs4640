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
  
  <title>Change Password</title>    
</head>
<body>
  
  <div class="container">
  <h3>Update Password</h3>
  <p>Please enter your username, current password, and new password.</p>
  <br/>
  
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label>Username: </label>
      <input type="text" name="uname" required /> <br/>
      <label>Current Password: </label>      
      <input type="text" name="pword" size="40" required /> <br/>
      <label>New Password: </label>      
      <input type="text" name="newPword" size="40" required /> <br/>              
      <input type="submit" value="Update" name="action"  />   
      <input type="submit" value="Return to Sign in" onclick="location.href='login.php';" />
  </form>

  </div>
<?php
   if (!empty($_POST['action']) && ($_POST['action'] == 'Update'))
   {
      updatePword($_POST['uname'], $_POST['pword'], $_POST['newPword']);
      $message = "You've successfully changed your password!";
      echo "<script type='text/javascript'>alert('$message');</script>";
   }
?>


</body>
</html>