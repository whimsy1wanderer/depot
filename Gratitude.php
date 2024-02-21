<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gratitude Page</title>
    <style>
        body {
            background-color: #f8f8f8;
            color: #333;
            font-family: Arial, sans-serif;
        }
        
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(83, 83, 83, 0.2);
        }
        
        .gratitude-message {
            color: #6b6bff;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .thank-you {
            color: #555;
        }
        
        .back-to-cart a {
            color: #e64a4a;
            text-decoration: none;
            font-weight: bold;
        }
        
        .back-to-cart a:hover {
            color: #fff9f0;
            background-color: #e64a4a;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .center-image {
            text-align: center;
        }

        /* Reduce the image size */
        .center-image img {
            width: 2000px; /* Adjust the width to your preference */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="gratitude-message">Thank you for your order!</p>
        <p class="thank-you">We appreciate your business and look forward to serving you again.</p>
        <div class="back-to-cart">
            <a href="shop.php">Back to Menu</a>
        </div>
    </div>
    <div class="center-image">
    </div>
</body>
</html>
