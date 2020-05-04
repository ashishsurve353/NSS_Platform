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
$sql = "SELECT * FROM teamwork WHERE team='art' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      echo "<h2>HTML Table</h2>";
        echo "<table>";
            echo "<tr>";
               
                echo "<th>Name</th>";
                echo "<th>Attendance</th>";
                 echo "<th>Star</th>";
                echo "<th>Mention</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['attendance'] . "</td>";
                echo "<td>" . $row['star'] . "</td>";
                echo "<td>" . $row['mention'] . "</td>";
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