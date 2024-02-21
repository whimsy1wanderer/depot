




<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "titan";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT cus_id, name FROM customers WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Store user information in session variables
        $_SESSION['cus_id'] = $row['cus_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $email;

        // Redirect to the shop.php page
        header("Location: shop.php");
        exit(); // Make sure to exit after sending the header
    } else {
        echo "<p>Login failed. Please check your email and password.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"], input[type="button"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="button"] {
            background-color: #28a745; /* Green color for Register button */
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Sign In">
        </form>
        <input type="button" value="Register" onclick="location.href='registrationZ.php'">
    </div>
</body>
</html>
