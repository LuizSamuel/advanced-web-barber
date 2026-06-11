<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') : 'Favornje Brands Tours'; ?></title>
    <meta name="title" content="Favor Beauty Hub">
    <meta name="description" content="Favor Beauty Hub, Book online">
    <meta name="keywords" content="Favor Beauty Hub, Favor Beauty salon,Favor Beauty Barber Shop, Favor Beauty BarberShop, Favor Beauty, Favor, Perfumes, Shop With Us, Book Now, Salon, Barbershop, Barber">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
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
    </style>
</head>

    

<!--?php include 'holidays.html'; ?>-->
<body>
    
    
<br>
<br>
<br>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: black;  margin-top:0px;  padding-top:0px;">
        <a class="navbar-brand mr-auto" href="#">
            <img src="./logos/logo.jpeg" alt="" width="105" height="105" padding="10" style="border-radius: 50%;">
            </a>
        <!-- margin-top:-30px padding-top:-20px-->

            <?php include 'greatings.php'; ?>
            <button class="navbar-toggler mx-3" style="..." type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

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
                        Services </a>
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
                    <a class="nav-link" href="blogs">Blogs</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="contactus">Contact Us</a>
                </li>


                <?php if (isset($_SESSION['user_id'])): ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning fw-bold me-5" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> Account
        </a>
        <ul class="dropdown-menu dropdown-menu-end me-5" aria-labelledby="userDropdown">
            <!-- <li><a class="dropdown-item" href="accountsusers/profiles.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="policy.php">Policy</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger fw-bold" href="logout.php">Logout
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 
                0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
            </a></li>
        </ul>
    </li>
<?php else: ?>
    <button type="button" class="btn btn-sm btn-black me-3 fw-bold" style="color: gold;" data-bs-toggle="modal" data-bs-target="#authModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gold" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
        Login/Register
    </button>
<?php endif; ?>


            </ul>
        </div>
    </nav>
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>
    <?php include 'partials/auth-modal.php'; ?>
    
