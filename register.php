<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="">
  	</div>
    <div class="input-group">
      <label>Year</label>
      <input type="text"placeholder="FE/SE/TE/BE" name="year" value="">
    </div>
    <div class="input-group">
      <label>Mobile Number</label>
      <input type="text" name="mobile" value="">
    </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
    <div class="input-group">
      <label>Technical</label>
      <input type="radio" name="team" value="technical">
      <label>Blog</label>
      <input type="radio" name="team" value="BLOG">
      <label>Art</label>
      <input type="radio" name="team" value="art">
       <label>Multimedia</label>
      <input type="radio" name="team" value="multimedia">
    </div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  <div>
     <form action="server.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit"><br/>
    </form>
  </div>
</body>
</html>
