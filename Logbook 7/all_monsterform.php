<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "logbook");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if all form fields are filled
    if (empty($_POST['txtname']) || empty($_FILES['monsterimage']['tmp_name']) || empty($_FILES['monsteraudio']['tmp_name'])) {
        die("Please fill all fields.");
    }

    // Prepare form data
    $name = mysqli_real_escape_string($conn, $_POST['txtname']);
    $image = file_get_contents($_FILES['monsterimage']['tmp_name']);
    $audio = file_get_contents($_FILES['monsteraudio']['tmp_name']);

    // Debugging: Display form data
    echo "Name: $name <br>";
    echo "Image: $image <br>";
    echo "Audio: $audio <br>";

    // Prepare and execute SQL query
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
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<h2>Monster Details</h2>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 Monster name :
 <input type="text" name="txtname" size="15" class="form-control" />
 </br></br>
 Monster image :
 <input  type="file" name="monsterimage" accept="image/jpeg" class="form-control" />
 </br></br>
 Monster Sound :
 <input  type="file" name="monsteraudio" accept="audio/basic" class="form-control"  />
 </br></br>
 <input type="submit" class="btn btn-default" value="Save" />
</form>
</body>
</html>
