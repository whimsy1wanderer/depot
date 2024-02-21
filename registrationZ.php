<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
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
            background-color: #28a745; /* Green color for Login button */
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>
            
            <input type="submit" value="Register">
        </form>
        <input type="button" value="Login" onclick="location.href='signInZ.php'">
    </div>
</body>
</html>
