<?php
session_start();

// initializing variables
//$username = "";
//$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","","attendance");//It is advisable to use mysqli
    if (!$db)
    {
      //  die('Could not connect: ' . mysqli_error());
    }else{
        echo("success");
    }
    //add PDF
    /*    $upload_dir = 'C:\xampp\htdocs\attendance/';//Where you want to save the CSV file for future use.
    $upload_file = $upload_dir . $_FILES['fileToUpload']['name'];
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $upload_file)) {
        $i=0;
        $uploadMessage = "";
        $file = fopen($upload_file,"r");
        while(!feof($file))
        {
            $i++;
            $dataLine = fgets($file);
            $dataArray = explode(",",$dataLine);

             if(count($dataArray) == 9){    
                //Get each column data
                $col1 = $dataArray[0];
                $col2 = $dataArray[1];
                 $col3 = $dataArray[2];
                  $col4 = $dataArray[3];
                   $col5 = $dataArray[4];
                    $col6 = $dataArray[5];
                     $col7 = $dataArray[6];
                      $col8 = $dataArray[7];
                 $col9 = $dataArray[8];

                //Continue Like This(if number field is more) and User your Table Name and Column as per your DB table.
$query = "INSERT INTO users (username,password,mobile,email,year,activity,meet,stars,team)VALUES('$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9',)";
              
                if(mysqli_query($con,$query)){
                    $uploadMessage .= "<br/>Sucess, Row ".$i ." is inserted into DB successfully";
                }
    
                  else{
                    $uploadMessage .= "<br/> Erroe, Row ".$i ." is Not inserted into DB successfully" .mysqli_error();
                }
            }
}}*/
    //add meet
if(isset($_POST['madd']))
{
$username=$_POST['username'];
$meet=$_POST['meet']+1;
$query="UPDATE users SET meet='$meet' WHERE username='$username'" ;
mysqli_query($db, $query);
}
//add Activity
if(isset($_POST['actadd']))
{
$username=$_POST['username'];
$activity=$_POST['activity']+1;
$query="UPDATE users SET activity='$activity' WHERE username='$username'" ;
mysqli_query($db, $query);
}
//add star
if(isset($_POST['stadd']))
{
$username=$_POST['username'];
$stars=$_POST['stars']+1;
$query="UPDATE users SET stars='$stars' WHERE username='$username'" ;
mysqli_query($db, $query);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username =  $_POST['username'];
  $year= $_POST['year'];
  $mobile= $_POST['mobile'];
  $email = $_POST['email'];
  $team=$_POST['team'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($year)) { array_push($errors, "Year is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username,password,mobile,email,year,activity,meet,stars,team) 
  			  VALUES('$username','$password','$mobile','$email','$year',0,0,0,'$team')";
  	mysqli_query($db, $query);
     $query1="INSERT INTO teamwork(username,team,attendance,star,mention)
                          VALUES('$username','$team',0,0,'nil')";
                mysqli_query($db, $query1);          
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	// header('location: index.php');
  }
}
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
     $query = "SELECT * FROM users WHERE username='$username' AND password='$password'AND year='BE' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $row=mysqli_fetch_assoc($results);
      $_SESSION['mobile']=$row['mobile'];
      $_SESSION['activity']=$row['activity'];
      $_SESSION['meet']=$row['meet'];
      header('location: admin2.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND year!='BE' LIMIT 1";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $row=mysqli_fetch_assoc($results);
      $_SESSION['mobile']=$row['mobile'];
      $_SESSION['activity']=$row['activity'];
      $_SESSION['meet']=$row['meet'];
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>

