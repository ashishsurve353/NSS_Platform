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
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PICT NSS ADMIN PAGE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

                <h1><center>ADMIN PAGE</center></h1>
                <link rel="stylesheet" type="text/css" href="style1.css">

<br>
<br>
<br>

</head>

<section>
		<div class="search-box">
		<input class="search-txt" type="text" name="" placeholder="Type to search">
		<a class="search-btn" href="#">
			
		</a>
	</div>



</section>
<br>
<br>

<body>
	
 
</h3>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				

				

				

				<div class="table100 ver6 m-b-110">
					<table data-vertable="ver6">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Team</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Year</th>
								<th class="column100 column4" data-column="column4">Activities</th>
								<th class="column100 column5" data-column="column5">Meetings</th>
								<th class="column100 column6" data-column="column6">stars</th>
								<th class="column100 column7" data-column="column7">percentage</th>
				
							</tr>
						</thead>
						
								<?php
		/* Attempt MySQL server connection. Assuming you are running MySQL
				server with default setting (user 'root' with no password) */
				$link = mysqli_connect("localhost", "root", "", "attendance");
 
					// Check connection
					if($link === false){
    					die("ERROR: Could not connect. " . mysqli_connect_error());
							}

							$sql = "SELECT * FROM users ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

    				while($row = mysqli_fetch_array($result)){?>
    					<tbody>
						<tr class="row100">
						<?php
								echo"<td>" . $row['team'] ."</td>";
								echo"<td >" . $row['username'] ."</td>";
								echo"<td >" . $row['year'] ."</td>";?>
								
<td> <form method="post" action="admin2.php"><input type="text" name="username" value="<?php echo $row['username']?>">
	<input type="text" name="activity" value="<?php echo $row['activity']?>"><button type="submit" class="btn" name="actadd">Add
</button></form></td>


<td> <form method="post" action="admin2.php"><input type="text" name="username" value="<?php echo $row['username']?>">
	<input type="text" name="meet" value="<?php echo $row['meet']?>"><button type="submit" class="btn" name="madd">Add
</button></form></td>
							
								
<td> <form method="post" action="admin2.php"><input type="text" name="username" value="<?php echo $row['username']?>">
	<input type="text" name="stars" value="<?php echo $row['stars']?>"><button type="submit" class="btn" name="stadd">Add
</button></form></td> 	 
								<?php echo"<td>" . $row['team'] ."</td>";
							
							echo"</tr>";

							}
							
						echo"</tbody>";
					echo"</table>";
					 } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
	 <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php //endif ?>
</div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                   <h1>TEAM WORK</h1>
               </div>

               <!-- MENU LINKS -->
               
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="technical.php" class="smoothScroll">TECHNICAL TEAM</a></li>
                         <li><a href="#about" class="smoothScroll"></a></li>
                         <li><a href="blog.php" class="smoothScroll">BLOG TEAM</a></li>
                         <li><a href="multimedia.php" class="smoothScroll">MULTIMEDIA TEAM</a></li>
                         <li><a href="art.php" class="smoothScroll">ART TEAM</a></li>
                         <!--<li><a href="#contact" class="smoothScroll">Contact</a></li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         
                    </ul>
           

          </div>
     </section>
</html>