<?php     
    $conn = mysqli_connect("localhost", "euan", "", "logbook");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selweek'])) {
        $selectedWeek = $_POST['selweek'];

        // Query to get the lottery numbers for the selected week
        $sql = "SELECT * FROM lotto WHERE wk = ?;";
        
        // Prepare the SQL statement to prevent SQL injection
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind parameters and execute
            mysqli_stmt_bind_param($stmt, "s", $selectedWeek);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Display the lottery numbers for the selected week
            if ($row = mysqli_fetch_array($result)) {
                echo "Lottery numbers for week " . htmlspecialchars($selectedWeek) . ": ";
                echo htmlspecialchars($row['number1']) . ", ";
                echo htmlspecialchars($row['number2']) . ", ";
                echo htmlspecialchars($row['number3']) . ", ";
                echo htmlspecialchars($row['number4']) . ", ";
                echo htmlspecialchars($row['number5']) . ", ";
                echo htmlspecialchars($row['number6']) . "<br/>";
            } else {
                echo "No lottery numbers found for the selected week.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing query: " . mysqli_error($conn);
        }
    }

    // Form to select the lottery week
    echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>"; 
    echo "<label for='selweek'>Select the lottery week:</label> ";
    echo "<select name='selweek' id='selweek'>";
    
    // Query to get distinct weeks
    $sql = "SELECT DISTINCT wk FROM lotto ORDER BY wk ASC;";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . htmlspecialchars($row['wk']) . "'>" . htmlspecialchars($row['wk']) . "</option>"; 
    }
    echo "</select>";
    echo "<input type='submit' value='Select' />";
    echo "</form>";

    mysqli_close($conn);
?>