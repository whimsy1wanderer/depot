<?php
include 'backShop.php'; // Include the PHP file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Pizza Shop</title>
    <style>
    	* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f8f8; /* Light background color */
        margin: 0;
        padding: 0;
        color: #333; /* Text color */
    }

    .header {
    	background: linear-gradient(to bottom, #6b6bff);
        text-align: center;
        padding: 30px;
        background-color: #6b6bff ; /* Coral */
        color: #000; /* Text color */
        font-family: 'Pacifico', cursive;
    }


    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff; /* White container background color */
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .pizza-card {
        display: flex;
        align-items: center;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        background-color: #f5f5f5; /* Light pizza card background color */
    }

    .pizza-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
    }

    .pizza-image {
        flex-shrink: 0;
        width: 200px;
        height: 150px;
        object-fit: cover;
    }

    .pizza-details {
        flex: 1;
        padding: 20px;
    }

    .pizza-name {
        font-weight: bold;
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #333; /* Text color */
    }

    .pizza-description {
        font-size: 1rem;
        margin-bottom: 15px;
        color: #555; /* Slightly darker text color */
    }

    .pizza-price {
        color: #6b6bff ; /* Coral */
        font-size: 1.2rem;
    }

    button {
        background-color: #6b6bff ; /* Coral */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
        background-color: #e64a4a; /* Slightly darker coral on hover */
        transform: scale(1.05);
    }

    .filter {
        margin-top: 20px;
        display: flex;
        align-items: center;
    }

    .filter select {
        margin-right: 10px;
        padding: 8px;
        border: 2px solid #6b6bff ; /* Coral */
        border-radius: 5px;
        background-color: #fff;
        font-size: 1rem;
        transition: border-color 0.3s, background-color 0.3s;
    }

    .filter select:hover {
        border-color: #e64a4a; /* Slightly darker coral on hover */
    }

    .filter select:focus {
        outline: none;
        border-color: #6b6bff ; /* Coral */
        background-color: #fff9f0;
    }

    .filter label {
        font-size: 1rem;
        font-weight: bold;
        color: #333; /* Text color */
    }

    .filter button {
        background-color: #6b6bff ; /* Coral */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s, transform 0.2s;
    }

    .filter button:hover {
        background-color: #e64a4a; /* Slightly darker coral on hover */
        transform: scale(1.05);
    }

    .product-details {
        display: none;
    }

    .product-card.active .product-details {
        display: block;
    }

    .filter button:focus {
        box-shadow: 0 0 10px rgba(255, 111, 97, 0.8); /* Coral shadow on focus */
    }

    .checkout-button {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    /* Additional CSS for fixed window */
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
    .add-to-cart-button,
.filter-button,
.pizza-card {
    transition: transform 0.2s, box-shadow 0.2s;
}

.add-to-cart-button:hover,
.filter-button:hover,
.pizza-card:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
}
.header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.header p {
    font-size: 1.2rem;
}

.primary-color {
    background-color: #6b6bff; /* Primary color */
}

.secondary-color {
    color: #333; /* Text color */
}

button {
    background-color: #6b6bff; /* Button color */
    color: #fff; /* Button text color */
}

    </style>
</head>










<body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<div class="header">
        <h1>Delicious Pizza</h1>
        <p>Your favorite pizza shop</p>
    </div>
    <form id="sortForm" method="post" action="">
        <div class="filter">
            <!-- Sort by -->
            <label for="sort">Sort by:</label>
            <select id="sort" name="sort">
                <option value="default">Default</option>
                <option value="cheaper">Price: Cheaper First</option>
                <option value="expensive">Price: More Expensive First</option>
            </select>
            <button class="filter-button">Default</button>
        </div>
    </form>





    <div class="container">
        <div class="pizza-card mac-cheese" id="1" data-pizza-id="1">
            <img class="pizza-image" src="https://www.cicis.com/media/d21b0xj1/mac-and-cheese-pizza.png" alt="Mac-Cheese">
            <div class="pizza-details">
                <p class="pizza-name">Mac & Cheese</p>
                <p class="pizza-description">Rich macaroni,cheese on garlic butter brushed crust.</p>
                <p class="pizza-price">2000 KZT</p>
            </div>
            <button class="add-to-cart-button" data-pizza-id="1">Add to Cart</button>
        </div>
        <div class="pizza-card hawaiian" id="2" data-pizza-id="2">
        <img class="pizza-image" src="https://www.cicis.com/media/ghabwz4w/buffalo-chicken-pizza.png" alt="Hawaiian Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Hawaiian Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, ham, pineapple</p>
            <p class="pizza-price">1600 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="2">Add to Cart</button>
    </div>
     <div class="pizza-card four-cheese" id="3" data-pizza-id="3">
        <img class="pizza-image" src="aaa2.png" alt="Four Cheese Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Four Cheese Pizza</p>
            <p class="pizza-description">Mozzarella, cheddar, parmesan, gouda</p>
            <p class="pizza-price">1500 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="3">Add to Cart</button>
    </div>
        
        <div class="pizza-card pepperoni" id="4" data-pizza-id="4">
            <img class="pizza-image" src="https://www.cicis.com/media/epqkbwjg/menu-section_pizza.png" alt="Pepperoni Pizza">
            <div class="pizza-details">
                <p class="pizza-name">Pepperoni Pizza</p>
                <p class="pizza-description">Classic tomato sauce, mozzarella, spicy pepperoni</p>
                <p class="pizza-price">1500 KZT</p>
            </div>
            <button class="add-to-cart-button" data-pizza-id="4">Add to Cart</button>
        </div>
    <div class="pizza-card veggie-supreme" id="5" data-pizza-id="5">
        <img class="pizza-image" src="https://www.cicis.com/media/5jzgsmbq/supreme-pizza.png" alt="Veggie Supreme Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Veggie Supreme Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, bell peppers, mushrooms, onions, olives</p>
            <p class="pizza-price">1400 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="5">Add to Cart</button>
    </div>

    <div class="pizza-card supreme" id="6" data-pizza-id="6">
        <img class="pizza-image" src="aaa6.png" alt="Supreme Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Supreme Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, pepperoni, sausage, bell peppers, onions, olives</p>
            <p class="pizza-price">1700 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="6">Add to Cart</button>
    </div>

    <div class="pizza-card meat-lovers" id="7" data-pizza-id="7">
        <img class="pizza-image" src="https://wisemart2.com/wp-content/uploads/2019/07/small-12-inches-large-16-inches-meat-lovers-pizza-wisemart2.png" alt="Meat Lovers Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Meat Lovers Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, pepperoni, sausage, bacon, ham</p>
            <p class="pizza-price">1800 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="7">Add to Cart</button>
    </div>
    <div class="pizza-card margherita" data-sort="popularity" id="8" data-pizza-id="8">
            <img class="pizza-image" src="aaa1.png" alt="Margherita Pizza">
            <div class="pizza-details">
                <p class="pizza-name">Margherita Pizza</p>
                <p class="pizza-description">Classic tomato sauce, mozzarella, fresh basil</p>
                <p class="pizza-price">1200 KZT</p>
            </div>
            <button class="add-to-cart-button" data-pizza-id="8">Add to Cart</button>
        </div>
    <div class="pizza-card bbq-chicken" id="9" data-pizza-id="9">
        <img class="pizza-image" src="aaa0.png" alt="BBQ Chicken Pizza">
        <div class="pizza-details">
            <p class="pizza-name">BBQ Chicken Pizza</p>
            <p class="pizza-description">BBQ sauce, mozzarella, grilled chicken, red onions, cilantro</p>
            <p class="pizza-price">1600 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="9">Add to Cart</button>
    </div>
    <div class="pizza-card pesto-chicken" id="10" data-pizza-id="10">
        <img class="pizza-image" src="aaa4.png" alt="Pesto Chicken Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Pesto Chicken Pizza</p>
            <p class="pizza-description">Pesto sauce, mozzarella, grilled chicken, sun-dried tomatoes, spinach</p>
            <p class="pizza-price">1700 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="10">Add to Cart</button>
    </div>

    <div class="pizza-card buffalo-chicken" id="11" data-pizza-id="11">
        <img class="pizza-image" src="https://joesbrooklynpizza.com/wp-content/uploads/2022/10/Veggie.png" alt="Buffalo Chicken Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Buffalo Chicken Pizza</p>
            <p class="pizza-description">Buffalo sauce, mozzarella, grilled chicken, red onions, ranch drizzle</p>
            <p class="pizza-price">2200 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="11">Add to Cart</button>
    </div>

    <div class="pizza-card veggie-deluxe" id="12" data-pizza-id="12">
        <img class="pizza-image" src="https://pizza-brew.com/wp-content/uploads/2018/11/pp.png" alt="Veggie Deluxe Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Veggie Deluxe Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, mushrooms, bell peppers, onions, tomatoes, olives</p>
            <p class="pizza-price">1500 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="12">Add to Cart</button>
    </div>

    <div class="pizza-card garlic-shrimp" id="13" data-pizza-id="13">
        <img class="pizza-image" src="https://www.cicis.com/media/trbhzybx/pepperoni-jalapeno-pizza.png" alt="Garlic Shrimp Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Garlic Shrimp Pizza</p>
            <p class="pizza-description">Garlic sauce, mozzarella, shrimp, roasted garlic, spinach</p>
            <p class="pizza-price">1800 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="13">Add to Cart</button>
    </div>

    <div class="pizza-card spicy-italian" id="14" data-pizza-id="14">
        <img class="pizza-image" src="aaa5.png" alt="Spicy Italian Pizza">
        <div class="pizza-details">
            <p class="pizza-name">Spicy Italian Pizza</p>
            <p class="pizza-description">Tomato sauce, mozzarella, spicy sausage, pepperoni, jalapeños</p>
            <p class="pizza-price">1600 KZT</p>
        </div>
        <button class="add-to-cart-button" data-pizza-id="14">Add to Cart</button>
    </div>
</div>




<h1>.</h1>
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
    const sortForm = document.getElementById('sortForm');
        const pizzaContainer = document.querySelector('.container');
        const pizzaCards = Array.from(pizzaContainer.querySelectorAll('.pizza-card'));

        function sortPizzaCards(sortingOption) {
            pizzaCards.sort((a, b) => {
                const aSortValue = a.getAttribute('data-sort');
                const bSortValue = b.getAttribute('data-sort');

                if (sortingOption === 'default') {
                    return 0; // Maintain current order
                } else if (sortingOption === 'popularity') {
                    return aSortValue.localeCompare(bSortValue); // Sort alphabetically
                } else if (sortingOption === 'novelty') {
                    return aSortValue.localeCompare(bSortValue); // Sort alphabetically
                } else if (sortingOption === 'cheaper') {
                    return parseFloat(a.querySelector('.pizza-price').textContent) - parseFloat(b.querySelector('.pizza-price').textContent);
                } else if (sortingOption === 'expensive') {
                    return parseFloat(b.querySelector('.pizza-price').textContent) - parseFloat(a.querySelector('.pizza-price').textContent);
                }
            });

            pizzaContainer.innerHTML = '';

            pizzaCards.forEach((pizzaCard) => {
                pizzaContainer.appendChild(pizzaCard);
            });
        }

        sortForm.addEventListener('change', function () {
            const sortingOption = sortForm.sort.value;
            sortPizzaCards(sortingOption);
        });

        const buttons = document.querySelectorAll('.add-to-cart-button');
buttons.forEach(button => {
    button.addEventListener('click', function() {
        // Retrieve the unique identifier from the button's data attribute
        const buttonId = this.getAttribute('data-pizza-id');

        // You can use AJAX to send the buttonId to a PHP script
        const xhr = new XMLHttpRequest();
        const url = 'backShop.php'; // Replace with the actual path to your PHP script
        const params = 'buttonId=' + encodeURIComponent(buttonId);

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the PHP script if needed
                console.log(xhr.responseText);
            }
        };

        xhr.send(params);
    });
});

   </script>
</body>