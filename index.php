<head>
    <title>Home</title>
    <!-- header.php--> <?php include('header.php'); ?> <!-- header.php-->
    <style>
        /* Additional CSS for hover effect */
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
    </style>
</head>

<body>
    <div id="carouselExample" class="carousel slide position-relative">
        <div class="carousel-inner">
            <h1 class="position-absolute start-50 translate-middle-x" style="z-index: 1; padding-top: 35%; color: gold;">Crafting / Motivating / Cultivating Community</h1>
            <div class="carousel-item active position-relative">
                <video class="d-block w-100" style="height: 800px; width: 900px;" autoplay loop muted>
                    <source src="./images/Introvideo.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            </div>
            <!-- Add more carousel items as needed -->
        </div>
    </div>

    <div class="container"> <!--style="padding-top: 25%;" -->
        <div class="row">
            <div class="col-md-8">
                <h1 style="justify-content: center; text-align: center;">⭐----ABOUT US----⭐</h1>
                <p>Welcome to Favor Brand, your premier destination were we specialize in providing top-notch solutions for barber shop, salons, spas, and beyond. With a keen eye for detail and a commitment to quality. At Favor Brand we offer all your business branding and merchandise needs. We offer a comprehensive range of services to elevate your brand presence and delight your customers.</p>
                <p>Whether you're looking to enhance your salon's image with customized apparel, brand your barber shop with unique promotional items, or add a touch of sophistication to your spa with premium gift sets, Favor Brand has you covered. Our extensive catalog features a diverse array of products, including printing services for gift boxes, diaries in various sizes (A5, A4, and B5), executive notebooks, umbrellas, infusion flasks, Bluetooth speakers, water bottles, and T-shirts, all ready to be tailored to your specific needs.</p>
                <!-- <h2>Core Values</h2>
                    <ul>
                        <li>Excellence</li>
                        <li>Innovation</li>
                        <li>Customization</li>
                        <li>Integrity</li>
                        <li>Collaboration</li>
                        <li>Sustainability</li>
                        <li>Customer Satisfaction</li>
                        <li>Continuous Improvement</li>
                    </ul> -->
            </div>

            <div class="col-md-4">
                <!-- Image placeholder -->
                <img src=" ./images/abouts.jpeg" class="img-fluid" alt="Company Image">
            </div>
        </div>
    </div><br>

    <div class="container">
        <div style="justify-content: center; text-align: center;">
            <h1>🔗----Services----🔗</h1>
            <p>"We are dedicated to delivering exceptional quality in all that we do"</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
                                <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0m7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                            </svg> HAIRCUTS & STYLING</h5>
                        <p class="card-text flex-grow-1">
                            Your hairstyle should mirror your personality and complement your lifestyle seamlessly.
                            In Favor Beauty, our team of expert hair stylists is dedicated to crafting a look and styling
                            regimen tailored precisely to your preferences and requirements. Trust in our professionals
                            to offer recommendations that prioritize the health and vitality of your hair, ensuring every
                            cut and style is a true reflection of your individuality.
                        </p>
                        <a href="salonservices" style="text-decoration: none; border-radius: 2px; background-color: silver; width: 35%; margin-top: -10px; margin-left: 100px;">Barber&salon services</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                            </svg> Printing & Branding</h5>
                        <p class="card-text flex-grow-1">
                            Experience the pinnacle of Printing & Branding excellence.
                            Our meticulous attention to detail ensures that every design and promotional material reflects
                            the essence of your brand. From vibrant colors to precise printing, trust us to elevate your
                            brand presence with professionalism and style.
                        </p>
                        <a href="services" style="text-decoration: none; border-radius: 2px; background-color: silver; width: 23%; margin-top: -10px; margin-left: 100px;">Services</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                            </svg> Our Shop</h5>
                        <p class="card-text flex-grow-1">
                            Discover the essence of elegance at Our Shop. From luxurious perfumes to charming gift boxes,
                            sleek diaries, and stylish notebooks, we offer an exquisite selection of curated items.
                            Elevate your everyday with our range of premium water bottles and more.
                            Explore our collection and indulge in sophistication.
                        </p>
                        <a href="shopwindows" style="text-decoration: none; border-radius: 2px; background-color: silver; width: 15%; margin-top: -10px; margin-left: 100px;">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div style="justify-content: center; text-align: center;">
            <h1>🎇----Thougts----🎇</h1>
            <p>" Celebrating Beauty: Our Commitment to Excellence "</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">⭐💫WHY</h5>
                        <p class="card-text flex-grow-1">
                            We take immense joy in celebrating the natural beauty of our clients' hair.
                            With a belief in the uniqueness of each individual's hair, we are dedicated
                            to delivering personalized services tailored exclusively to you.
                            At Favor Beauty Hub, we embrace and cherish the diversity within our community,
                            reveling in the beauty that surrounds us.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">❤ Who</h5>
                        <p class="card-text flex-grow-1">
                            We are a collective of diverse, skilled, and knowledgeable hair stylists based in Nanyuki,
                            dedicated to reigniting your love for your hair. With each stylist offering their own distinctive
                            expertise, we delight in sharing our passion for hair with every client we serve.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card hover-transform h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">🔑What</h5>
                        <p class="card-text flex-grow-1">
                            Our Favor hair salons specialize in creating distinctive hair colors, cuts, and designs tailored
                            to suit every hair type. With a special focus on textured hair, our stylists are committed to
                            celebrating the individual beauty and uniqueness of your mane!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div><br>





    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <h1 style="justify-content: center; text-align: center;">🔊----Testimonials----🔊</h1>
            <div class="carousel-item active">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="testimonial text-center">
                                <div class="testimonial-img">
                                    <!-- <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Testimonial Image"> -->
                                </div>
                                <p>"Visiting Favor beauty salon was an absolute delight! From the moment I stepped in, I was greeted warmly by the
                                    friendly staff, and the ambiance of the salon was so inviting. The attention to detail and professionalism of
                                    the stylists were evident in every step of my experience. Not only did I leave feeling pampered and rejuvenated,
                                    but the results exceeded my expectations! I can confidently say that Favor beauty salon is now my go-to destination
                                    for all my beauty needs. Highly recommended!"</p>
                                <!-- <p class="name">John Doe</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="testimonial text-center">
                                <div class="testimonial-img">
                                    <!-- <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Testimonial Image"> -->
                                </div>
                                <p>
                                    "Discovering Favor's range of products has truly enhanced my lifestyle. From their exquisite perfumes to charming gift boxes and beautifully crafted diaries, each item exudes elegance and quality. Their attention to detail and commitment to excellence are evident in every product. Whether I'm treating myself or finding the perfect gift for a loved one, Favor never disappoints. I highly recommend exploring their diverse collection for a touch of luxury and sophistication in everyday life."</p>
                                <!-- <p class="name">Jane Smith</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">
                << /span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div><br>


    <!-- footer.php -->
    <?php require('footer.php'); ?>
    <!-- footer.php -->

    <!-- Add jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Enable the carousel to auto slide
        $('.carousel').carousel({
            interval: 2000
        });

        $(document).ready(function() {
            // Add hover effect on cards
            $('.card').hover(
                function() {
                    $(this).addClass('hovered');
                },
                function() {
                    $(this).removeClass('hovered');
                }
            );
        });
    </script>

</body>

</html>