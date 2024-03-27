<?php
header("Content-type: image/jpeg");

$conn = mysqli_connect("localhost", "root", "", "logbook");

$id = $_GET['id'];
$sql = "SELECT image FROM monster WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$image = $row["image"];

echo $image;
?>

