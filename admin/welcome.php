<?php require('./phpincludes/welcome.inc.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for the toggle button */
        #sidebarCollapse {
            display: none;
            /* Hide the button by default on larger screens */
        }

        @media (max-width: 768px) {
            #sidebarCollapse {
                display: block;
                /* Show the button on smaller screens */
            }

            .sidebar {
                display: none;
                /* Hide the sidebar by default on smaller screens */
            }

            .sidebar.active {
                display: block;
                /* Show the sidebar when active on smaller screens */
            }
        }

        .nav-link {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #BFA100;
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            width: 160px;
        }

        .nav-link:hover {
            background-color: #FFD700;
        }
    </style>
</head>

<body style=" background: linear-gradient(to right, #B2BEB5, #C0C0C0,#D4AF37)">
    <div style="color: #D4AF37; font-weight: bold; font-size: 36px;">
        <marquee width="90%" direction="left" height="50px">
            Favor Brands 
        </marquee>
    </div>
    <div class="container-fluid">
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Content Here -->
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            Welcome Back, <?php echo $username; ?>!
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="profile">
                <label for="profile_picture">
                    <img src="uploads/<?php echo $profile_picture; ?>" alt="Profile Picture" style="width:50px;height:50px;border-radius:50%; cursor: pointer; float:left; margin-top: -80px;">
                </label>
                <input type="file" name="profile_picture" id="profile_picture_input" accept="image/*" style="display: none;" onchange="this.form.submit()">
                <form action="phpincludes/upload_profile_picture.inc.php" method="POST" enctype="multipart/form-data" style="display: inline;">
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required style="display: none;" onchange="this.form.submit()">
                    <!-- <button type="submit" class="btn btn-primary">Upload</button> -->
                </form>
            </div>
            
        </main>
        <div class="row">
            <!-- Toggle button for small screens -->
            <button id="sidebarCollapse" class="btn btn-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>
            <!-- Side Navbar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar" style="padding-left: -120px;">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <a class="nav-link active" style="text-decoration: none; display: block;" aria-current="page" href="add_product.php">Add Product</a>
                        <a class="nav-link" style="text-decoration: none; display: block;" href="categories.php">Categories</a>
                        <a class="nav-link" style="text-decoration: none; display: block;" href="viewproduct.php">View Product</a>
                        <a class="nav-link" style="text-decoration: none; display: block;" href="add_salonservice.php">Add Salon Services</a>
                        <a class="nav-link" style="text-decoration: none; display: block;" href="veiwsalonservices.php">Veiw Salon Services</a>

                        <a class="nav-link" style="text-decoration: none; display: block;" href="logout.php">Logout</a>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    
    <div style="text-align: center; margin-top: -500px;">
        <img id="rotatingImage" src=" ../logo/logo.png" alt="Description of the earring" style="height: 250px; width: auto; max-width: 100%; float:right">
    </div>

    <!-- jQuery and Bootstrap Bundle (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript to handle the toggle button functionality
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
    
     <script>
        let angle = 0;

        function rotateImage() {
            angle = (angle + 1) % 360; // Increment the angle
            document.getElementById('rotatingImage').style.transform = `rotate(${angle}deg)`;
            requestAnimationFrame(rotateImage); // Call the function again for the next frame
        }

        rotateImage(); // Start the rotation
    </script>
    
</body>

</html>