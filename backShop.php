<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (isset($_POST['buttonId'])) {
    $buttonId = $_POST['buttonId'];

    // Get the cus_id for the current user
    $cus_id = $_SESSION['cus_id'];

    // Check if there is an existing row in cartlist for the current user and pizza
    $sqlCheck = "SELECT * FROM cartlist WHERE cus_id = ? AND piz_id = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ii", $cus_id, $buttonId);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows == 0) {
        // If no existing row, initialize quantity to 0
        $quantity = 0;
    } else {
        // If an existing row is found, fetch the quantity from the database
        $row = $result->fetch_assoc();
        $quantity = $row['quantity'];
    }

    // Increment the click count for the specific button
    $quantity++;

    // Update or insert the data into the database
    if ($result->num_rows == 0) {
        // If no existing row, insert new data
        $sqlInsert = "INSERT INTO cartlist (cus_id, piz_id, quantity) VALUES (?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("iii", $cus_id, $buttonId, $quantity);

        if ($stmtInsert->execute()) {
            echo "Data inserted into cartlist successfully.";
        } else {
            echo "Error inserting data: " . $stmtInsert->error;
        }

        // Close the insert statement
        $stmtInsert->close();
    } else {
        // If an existing row is found, update the quantity
        $sqlUpdate = "UPDATE cartlist SET quantity = ? WHERE cus_id = ? AND piz_id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("iii", $quantity, $cus_id, $buttonId);

        if ($stmtUpdate->execute()) {
            echo "Data updated in cartlist successfully.";
        } else {
            echo "Error updating data: " . $stmtUpdate->error;
        }

        // Close the update statement
        $stmtUpdate->close();
    }

    // Return the updated click count as a response
    echo "Button with ID $buttonId has been clicked " . $quantity . " times.";
}

// Close the database connection
$conn->close();
?>
