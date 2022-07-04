<?php
  include('server.php');
  $title = "Register"; 
  include ('header.php') ;
  $category = "MacBook Pro" ;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
.regpadding{
padding: 15px;
  }
</style>
</head>
<body >

    <div class="container regpadding">
      <div class="row center">
        <div class="col-md-6 offset-md-3"> 
          <h2>Register</h2>
        </div>
      </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">  
          <form method="post" action="register.php">

            <div class="form-group">
              <label>Username</label>
              <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
            
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="password_1">
            </div>
            <div>
              <label>Confirm Password</label>
              <input  class="form-control" type="password" name="password_2">
            </div>
            </div>
            <div class="input-group">
              <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
            </div>
            <p>
              Already a member? <a href="login.php">Sign in</a>
            </p>
          </form>
    </div>
    </div>
    </div>
</body>
</html>

<?php include ('footer.php') ?>