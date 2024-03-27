<?php
$conn = mysqli_connect("localhost", "root", "", "logbook");

$sql = "SELECT id FROM monster";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<img src='getjpg.php?id=" . $row['id'] . "'/>";
}

mysqli_close($conn);
?>
