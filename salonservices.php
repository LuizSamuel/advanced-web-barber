<?php
session_start(); // Start the session
require('./admin/databases/db_connect.php');
// SQL query to fetch products data from the database
$sql = "SELECT name, description, cost, image_path1 FROM salonservices";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber & Beauty Studio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
    <style>
        .nav-link {
            color: white;
            margin-right: 20px;
        }

        .nav-link:hover {
            color: rgb(255, 165, 11);
        }

        .navbar-toggler-icon:hover {
            background-color: red !important;
        }

        .navbar-nav .nav-item:hover>.nav-link,
        .navbar-nav .nav-item.active>.nav-link,
        .navbar-nav .nav-item.show>.nav-link {
            color: rgb(255, 165, 11);
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: rgba(255, 165, 11, 0.2);
            color: black;
        }

        .hover-transform {
            /* transition: transform 0.3s ease; */
            -webkit-box-shadow: 0 1px 1px rgba(72, 78, 85, .6);
            box-shadow: 0 1px 1px rgba(72, 78, 85, .6);
            -webkit-transition: all .2s ease-out;
            -moz-transition: all .2s ease-out;
            -ms-transition: all .2s ease-out;
            -o-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        .hover-transform:hover {
            /* transform: translateY(-10px); */
            -webkit-box-shadow: 0 20px 40px rgba(72, 78, 85, .6);
            box-shadow: 0 20px 40px rgba(72, 78, 85, .6);
            -webkit-transform: translateY(-15px);
            -moz-transform: translateY(-15px);
            -ms-transform: translateY(-15px);
            -o-transform: translateY(-15px);
            transform: translateY(-15px);
        }

        /* Position the cart icon */
        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999;
            cursor: pointer;
        }
    </style>
</head>

<body style=" background: linear-gradient(to right, black 20%, gray 80%)">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style=" background: linear-gradient(to right, black, gray);  margin-top:-30px;  padding-top:-30px;">
        <a class="navbar-brand mr-auto" href="#">
            <img src="./logo/logo.png" alt="" width="105" height="105" padding="10" style="border-radius: 50%;">
        </a>
        
        <?php include 'greatings.php'; ?>
        <!-- <button class="btn btn-primary position-absolute " style="position: fixed;
    top: 80%; right: 90px; transform: translateY(-50%); z-index: 1000;"
    onclick="window.location.href='https://guppyfishweb.com/web-design/text-alignment-center/'" type="button">
    Button
    </button> -->
        <button class="navbar-toggler mx-3" style="border: none; background: white; border-radius: 50px; height: 45px; color: rgb(255, 165, 11);" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <svg style="width: 20px; cursor: pointer; fill: rgb(255, 165, 11);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item active">
                    <a class="nav-link text-white" href="./">Home <span class="sr-only text-success">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="aboutus">About Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="aboutUsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="aboutUsDropdown">
                        <a class="dropdown-item" href="branding">Branding</a>
                        <a class="dropdown-item" href="printing">Printing</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="salonservices">Barber & Beauty Studio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="shopwindows">Shop</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="blogs">Blog</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="contactus">Contact Us</a>
                </li>


                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php" class="btn btn-sm btn-danger me-3">Logout

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                    </a>
                <?php else: ?>
                    <button type="button" class="btn btn-sm btn-black me-3 fw-bold" style="color: gold; " data-bs-toggle="modal" data-bs-target="#authModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gold" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                        Login/Register
                    </button>
                <?php endif; ?>

                <!-- <li class="nav-item" style="margin-right: 20px;">
                    <button class="shadow-lg fs-4 shadow animate__animated animate__infinite animate__pulse text-white btn_festive" style="margin-top: -2px; background: linear-gradient(45deg, #b78727, #FFD700, #b78727);" onclick="window.location.href='book'" type="button">
                        Book Now
                    </button>
                </li> -->

            </ul>
        </div>
    </nav>
    <div id="carouselExample" class="carousel slide position-relative">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <video class="d-block w-100" style="height: 5%;" autoplay loop muted>
                    <source src="./images/womanvd.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            </div>
            <!-- Add more carousel items as needed -->
        </div>
    </div>


    </div>
    </div><br>
    <br>
    <div class="salonservices text-center " style="color: whitesmoke;">
        <h1>Services Offered</h1>
    </div>

    <div class="container">
        <div class="row" style="padding-top: 30px;"> <!-- Added padding-top -->
            <div class="col-12 mt-5">
                <!-- Sorting Form
                <form method="get" action="">
                    <label style="color: aqua;" for="sort">Sort by:</label>
                    <select name="sort" id="sort" onchange="this.form.submit()">
                        <option value="id">Product ID</option>
                        <option value="name">Name</option>
                        <option value="cost">Cost</option>
                    </select>
                </form> -->

                <!-- Searching Form -->
                <form method="get" action="">
                    <label style="color: aqua;" for="search">Search:</label>
                    <input type="text" name="search" id="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button style="background-color: gold; border: none;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div><br>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- loop through the fetched data -->
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col">
                <div class="card hover-transform h-100" style="width: 15rem; margin-bottom: 20px;">
                    <img class="card-img-top" src="./admin/uploads/' . $row["image_path1"] . '" alt="' . $row["name"] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["name"] . '</h5>
                        <p class="card-text">' . $row["description"] . '</p>
                        <p>Cost: ksh ' . $row["cost"] . '</p>
                    <button class="btn btn-primary Book-now d-none" data-name="' . $row["name"] . '" data-cost="' . $row["cost"] . '">Book Now</button>

                    </div>
                </div>
            </div>';
                }
            } else {
                echo "0 results";
            }
            ?>

        </div>
    </div>
    <!-- <p style="padding-top: 5%; padding-left: 3%; justify-content: space-between;">
                            <button class="btn btn-primary add-to-cart" data-name="' . $row["name"] . '" data-cost="' . $row["cost"] . '">continue</button>
                        </p> -->

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>




    <script>
        // Function to filter and display products based on search input
        document.getElementById('search').addEventListener('input', function() {
            const searchValue = this.value.trim().toLowerCase();
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                const productName = card.querySelector('.card-title').textContent.trim().toLowerCase();
                if (productName.startsWith(searchValue)) {
                    card.style.display = ''; // Show the card
                } else {
                    card.style.display = 'none'; // Hide the card
                }
            });
        });

        // Add event listeners for card hover and hover out
        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                // Hide buttons on other cards
                document.querySelectorAll('.card .btn').forEach(function(button) {
                    button.classList.add('d-none');
                });

                // Show buttons on the hovered card
                card.querySelectorAll('.btn').forEach(function(button) {
                    button.classList.remove('d-none');
                });
            });

            card.addEventListener('mouseleave', function() {
                // Hide buttons on mouse leave
                card.querySelectorAll('.btn').forEach(function(button) {
                    button.classList.add('d-none');
                });
            });
        });

        // Add event listeners for "Book Now" buttons
        document.querySelectorAll('.Book-now').forEach(function(button) {
            button.addEventListener('click', function() {
                // Extract the name and cost from the clicked button
                var serviceName = this.getAttribute('data-name');
                var serviceCost = this.getAttribute('data-cost');

                // Redirect the user to payment.php with the cost as a query parameter
                window.location.href = 'bookingpayments?serviceName=' + encodeURIComponent(serviceName) + '&serviceCost=' + encodeURIComponent(serviceCost);
            });
        });
    </script>

    <!-- footer.php -->
    <?php require('footer.php'); ?>
    <!-- footer.php -->
    <?php include 'partials/login-register-modal.php'; ?>
</body>

</html>