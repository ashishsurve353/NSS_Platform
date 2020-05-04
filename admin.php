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
    <?php // if (isset($_SESSION['username'])) : ?>
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

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM users ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<h2>HTML Table</h2>";
        echo "<table>";
            echo "<tr>";
               
                echo "<th>Name</th>";
                echo "<th>Mobile</th>";
                 echo "<th>Activity</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['activity'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
<!-- <h2>HTML Table</h2> 

<table>
  <tr>
    <th>Fields</th>
    <th>Records</th>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php //echo $_SESSION['username'];?></td>
    
  </tr>
  <tr>
    <td>Mobile NO</td>
    <td><?php //echo $_SESSION['mobile'];?></td>
   
  </tr>
  <tr>
    <td>Activity</td>
    <td><?php //echo $_SESSION['activity'];?></td>
    
  </tr>
  <tr>
    <td>Meetings</td>
    <td>4</td>
   
  </tr>
  <tr>
    <td>Average Attendance</td>
    <td>100</td>
    
  </tr>
</table>
-->
</body>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php //endif ?>
</div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
</body>
</html>