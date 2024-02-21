<?php


// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";
$dbname2 = "titan";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname2);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// Start the session
session_start();

// Get the cus_id from the session
$cus_id = $_SESSION['cus_id'];

// SQL query to select rows where cus_id matches the session value







// Close the database connection







$queryX = "SELECT cus_id, piz_id, quantity FROM cartlist WHERE cus_id = $cus_id";

$resultX = $conn->query($queryX);

// Check if the query was successful
if ($resultX) {
    $resultX->free();
} else {
    echo "Error: " . $mysqli->error;
}


$resultX = $conn->query($queryX);

if (isset($_POST['checkout'])) {
    // Optionally, you can redirect the user to a payment page or order confirmation page.
    while ($row8 = $resultX->fetch_assoc()) {
        $ii = "INSERT INTO purchase (cus_id, piz_id, quantity) VALUES ($cus_id, {$row8['piz_id']}, {$row8['quantity']})";
        if ($conn2->query($ii) === TRUE) {
            // Query executed successfully
        } else {
            echo "Error: " . $conn2->error;
        }
    }
    $ie = "DELETE FROM cartlist WHERE cus_id = $cus_id";
    if ($conn->query($ie) === TRUE) {
        // Query executed successfully
    } else {
        echo "Error: " . $conn->error;
    }

    header("Location: Gratitude.php");
    exit; // Exit to prevent further processing.
}










?>




<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Cart</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
        }

        /* Header styles */
        .header {
            background: linear-gradient(to bottom, #6bff6b);
            text-align: center;
            padding: 30px;
            background-color: #6b6bff;
            color: #000;
            font-family: 'Pacifico', cursive;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2rem;
        }

        /* Cart container styles */
        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            transition: background-color 0.25s, transform 0.15s;
        }
        th:hover {
        	background-color: #5640f7;
            color:#fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Checkout button styles */
        button {
            background-color: #6b6bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #e64a4a;
            transform: scale(1.05);
        }
        .fixed-window {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #333; /* Dark background color */
        padding: 10px 0;
        text-align: center;
        display: flex;
        justify-content: space-between;
    }
        #scrollMenu,
    #scrollCart {
        color: #fff;
        font-size: 15px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    #scrollMenu:hover,
    #scrollCart:hover {
        background-color: #6b6bff ; /* Coral */
        color:#000;
        transform: scale(1.05);
    }
    .asdfjkl {
    	color:white;
    }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="header">
        <h1>Delicious Pizza</h1>
        <p>Cart</p>
    </div>
<form method="post">
    <div class="cart-container">
        <h2>Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            	<?php
                $all = 0;
                $resultX = $conn->query($queryX); // Reuse the existing connection for this query


                if ($resultX) {
    // Use a loop to generate table rows
    while ($row = $resultX->fetch_assoc()) {
            $query = "SELECT piz_id,piz_name,price,description FROM pizza WHERE piz_id = {$row['piz_id']}";
            $result = $conn2->query($query);
            while ($row2 = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row2['piz_name']}</td>";
                echo "<td>{$row2['price']}</td>";
                echo "<td>{$row['quantity']}</td>";
                $integerKZT = filter_var($row2['price'], FILTER_SANITIZE_NUMBER_INT);
                $total = $integerKZT * $row['quantity'];
                echo "<td>$total</td>";
                $all = $all + $total;
            }
    }
} else {
    echo "Error: " . $conn->error; // Use the connection for error handling
}

// Close the database connection
$conn->close();
        // Use a loop to generate table rows
        
        ?>
            </tbody>
        </table>
        <h6 class="asdfjkl">.</h6>
        <?php
echo "Total: " . strval($all);
        ?>
        <h6 class="asdfjkl">.</h6>
        <button name="checkout" type="submit">Checkout</button>
    </div>
</form>
    <h1 class="asdfjkl">.</h1>
    <h1 class="asdfjkl">.</h1>
    <h1 class="asdfjkl">.</h1>
    <div class="fixed-window">
    </div>
<!-- Fixed window with buttons -->
    <div class="fixed-window">
        <div id="scrollMenu" onclick="scrollMenu()">Go to Menu</div>
        <div id="scrollCart" onclick="scrollCart()">Go to Cart</div>
    </div>



    <script>
    	function scrollMenu() {
        window.location.href = "shop.php";
    }
     function scrollCart() {
        window.location.href = "cart.php";
    }
    </script>
</body>
</html>
