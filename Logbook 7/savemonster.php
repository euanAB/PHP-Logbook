<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "logbook");

    // Check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['txtname']);
    $image = addslashes(file_get_contents($_FILES['monsterimage']['tmp_name'])); // Add addslashes to handle special characters
    $audio = addslashes(file_get_contents($_FILES['monsteraudio']['tmp_name'])); // Add addslashes to handle special characters

    // Insert data into the database
    $sql = "INSERT INTO monster (name, image, audio) VALUES ('$name', '$image', '$audio')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
