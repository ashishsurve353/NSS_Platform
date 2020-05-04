<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information--> 
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>

    	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
  <tr>
    <th>Fields</th>
    <th>Records</th>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $_SESSION['username'];?></td>
    
  </tr>
  <tr>
    <td>Mobile NO</td>
    <td><?php echo $_SESSION['mobile'];?></td>
   
  </tr>
  <tr>
    <td>Activity</td>
    <td><?php echo $_SESSION['activity'];?></td>
    
  </tr>
  <tr>
    <td>Meetings</td>
    <td><?php echo $_SESSION['meet'];?></td>
   
  </tr>
  <tr>
    <td>Average Attendance</td>
    <td><?php  $p=$_SESSION['activity']+$_SESSION['meet'] ;
    			echo $p; ?></td>
    
  </tr>
</table>

</body>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>