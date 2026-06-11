
    <title>Contact Us</title>
    <!-- header.php--> <?php include('header.php'); ?> <!-- header.php-->
    <!-- Bootstrap CSS -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        CSS for map container #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!--?php include('header.php'); ?>-->
    <!--header-->

    <!-- Contact Us Section -->
    <section class="map" style="padding-top: 9%;">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3989.8183131537307!2d37.06172827496446!3d0.0034395999965300527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwMDAnMTIuNCJOIDM3wrAwMyc1MS41IkU!5e0!3m2!1sen!2ske!4v1708943924087!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section><br>

    <section class="Contact-Us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-2">
                            <i class="material-icons">home</i>
                        </div>
                        <div class="col-10">
                            <h5>Kichinjio (Abbatoir), Nanyuki - Marura Rd, Nanyuki</h5>
                            <p>Kichinjio (Abbatoir), Nanyuki, Kenya</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <i class="material-icons">phone</i>
                        </div>
                        <div class="col-10">
                            <h5>0722-108-955</h5>
                            <p>Monday to Saturday, 8AM to 9PM</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="col-10">
                            <h5>info@favornjebrands.co.ke</h5>
                            <p>Email Us</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="form-handler.php" method="post">
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter your name" required>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Enter email address" required>
                        <input type="text" name="subject" class="form-control mb-3" placeholder="Enter your subject" required>
                        <textarea rows="7" name="message" class="form-control mb-3" placeholder="Message" required></textarea>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section><br>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Maps API -->
    <script src="https://maps.google.com/maps?q=0.0034396%2C37.0643032&z=17&hl=en" async defer></script>

    <!-- footer -->
    <?php include('footer.php'); ?>
    <!-- footer -->
</body>

</html>