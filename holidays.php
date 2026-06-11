<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floating Product with Interchange</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles for the floating product box */
        .floating-product {
           position: fixed;
            top: 40px; /* Adjust to position */
            left: 50%;
            transform: translateX(-50%);
            width: 350px;
            max-width: 90%;
            /*background: rgba(0, 0, 0, 0.8); /* Ensure visibility 
            color: white; /* Text color for contrast */
            padding: 15px;
            border-radius: 10px;
            z-index: 9999; /* Ensure it stays on top */
        }

        .product-card {
            border: 2px solid #F44336;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-card .card-body {
            text-align: center;
        }

        .product-card .btn-primary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .product-card .btn-primary:hover {
            background-color: #e75480;
            border-color: #e75480;
        }

        #countdown span {
            font-size: 14px;
            font-weight: bold;
            padding: 5px 10px;
            background-color: #ff69b4;
            color: white;
            border-radius: 5px;
            gap: 5px;
        }

        /* Marquee container */
        .marquee-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-color: #ff69b4;
            border: 2px solid red;
            border-radius: 0; /* Removed border-radius to touch edges */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            z-index: 1001; /* Ensure it's above other content */
        }

        /* Marquee text */
        .marquee-item {
            position: absolute;
            display: inline-block;
            font-size: 32px;
            color: #ffffff;
            padding: -1px 20px;
            white-space: nowrap;
            animation: marquee 15s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100vw);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>
    <div class="marquee-container">
        <div class="marquee-item" id="marquee-text">
            🎉 Celebrate Love This Valentine’s Day! Shop Our Exclusive Collection Now ❤️
        </div>
    </div>

    <!-- Floating Product Box -->
    <div class="floating-product">
        <div class="card product-card">
            <img id="product-image" src="https://via.placeholder.com/300x200?text=Product+1" alt="Product Image" class="card-img-top">
            <div class="card-body">
                <h6 id="product-title" class="card-title">Love Hearts Chocolate</h6>
                <p id="product-price" class="card-text"> </p>
                <div class="countdown-timer mt-2">
                    <h6>Hurry! Offer Ends In:</h6>
                    <div id="countdown" class="d-flex justify-content-center align-items-center">
                        <span id="days" class="me-1">00</span>d :
                        <span id="hours" class="me-1">00</span>h :
                        <span id="minutes" class="me-1">00</span>m :
                        <span id="seconds">00</span>s
                    </div>
                </div>
               <!--<button class="btn btn-primary add-to-cart" data-name="' . $row["name"] . '" data-cost="' . $row["cost"] . '">Add to Cart</button>-->
            </div>
        </div>
    </div>

    <!-- Fallback for JavaScript Disabled -->
    <noscript>
        <p style="color: red; text-align: center;">JavaScript is required for the product interchange and countdown timer to function.</p>
    </noscript>

    <!-- Bootstrap JS and Popper.js (optional for advanced features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>