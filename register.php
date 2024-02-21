<?php
$servername = "localhost";   // Change this if your database server is on a different host
$username = "root";          // Default username for XAMPP MySQL
$password = "";              // Default password for XAMPP MySQL
$dbname = "titan";   // Replace with the name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to database: " . $dbname;


//-------------------------------------------- getting info

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
}

// Insert data into the customers table
$sql = "INSERT INTO customers (name, surname, email, password, address) VALUES ('$name', '$surname', '$email', '$password', '$address')";

if ($conn->query($sql) === TRUE) {
    header("Location: signInZ.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
