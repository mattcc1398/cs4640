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
  
  <title>Sign Up!</title>    
</head>
<body>
  
  <div class="container">
  <h3>Sign Up!</h3>
  <br/>
  
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <label>Username: </label>
      <input type="text" name="uname" required /> <br/>
      <label>Password: </label>      
      <input type="text" name="pword" size="40" required /> <br/>
      <label>Email: </label>      
      <input type="text" name="eml" size="40" required /> <br/>              
      <input type="submit" value="Sign Up" name="action"  />   
  </form>

  </div>
<?php
   if (!empty($_POST['action']) && ($_POST['action'] == 'Sign Up'))
   {
      addUser($_POST['uname'], $_POST['pword'], $_POST['eml']);
      header('Location: home.php');
   }
?>
</body>
</html>