<?php
header("Content-type: audio/wav");

$conn = mysqli_connect("localhost", "root", "", "logbook");

$id = $_GET['id'];
$sql = "SELECT audio FROM monster WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$audio = $row["audio"];

echo $audio;
?>
