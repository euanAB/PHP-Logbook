<?php
// Connect to server and select database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logbook"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM test";
$result = $conn->query($sql);
?>

<html>
<body>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<a href=\"wk6ex2action.php?id=$row[name]\">$row[name]</a><br>";   
}
?>

</body>
</html>

<?php
$conn->close();
?>


