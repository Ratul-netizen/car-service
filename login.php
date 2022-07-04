<?php
  include('server.php');
  $title = "Login"; 
  include ('header.php') ;
  $category = "MacBook Pro" ;
?>
<style type="text/css">
.loginpadding{
padding: 75px;
  }
</style>
<div class="container loginpadding" >
<div class="row center">
  <div class="col-md-6 offset-md-3">
    <h3>Login</h3>
  </div>
</div>
<div class="row">
    <div class="col-md-6 offset-md-3">
      <form method="post" action="login.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="username">
          <small id="emailHelp" class="form-text text-muted">Enter username. Not Email</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
        <p>
          Not yet a member? <a href="register.php">Sign up</a>
        </p>
      </form>
    </div>
</div>
</div>

<?php include ('footer.php') ?>





