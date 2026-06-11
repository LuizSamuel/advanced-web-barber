document.addEventListener("DOMContentLoaded", function () {
    // Define the list of products
    const products = [
        {
            image: "holidaysimages/black_crown.jpeg",
            title: "Love Hearts Chocolate",
            price: "ksh 4,500"
        },
        {
            image: "holidaysimages/teddy_orange.jpeg",
            title: "Valentine Teddy Bear",
            price: "ksh 3,500"
        },
        {
            image: "holidaysimages/gold_black.jpeg",
            title: "Heart-Shaped Cake",
            price: "ksh 4,500"
        },
        {
            image: "holidaysimages/men_brown.jpeg",
            title: "Valentine's Teddy Bear",
            price: "ksh 3,500"
        },
        {
            image: "holidaysimages/orange_black.jpeg",
            title: "Couple Watches",
            price: "ksh 4,500"
        },
        {
            image: "holidaysimages/white_orange.jpeg",
            title: "Candle Set",
            price: "ksh 3,500"
        },
        {
            image: "holidaysimages/men_marron.jpeg",
            title: "Personalized Mug",
            price: "ksh 4,500"
        },
        {
            image: "holidaysimages/WhatsApp Image 2025-02-04 at 15.13.56.jpeg",
            title: "Chocolate Gift Box",
            price: "ksh 3,500"
        }
    ];

    let currentProductIndex = 0;

    // Function to update the product details
    function updateProduct() {
        const product = products[currentProductIndex];

        // prevent errors if elements are missing
        if (document.getElementById("product-image")) {
            document.getElementById("product-image").src = product.image;
        }
        if (document.getElementById("product-title")) {
            document.getElementById("product-title").innerText = product.title;
        }
        if (document.getElementById("product-price")) {
            document.getElementById("product-price").innerText = `Price: ${product.price}`;
        }
    }

    // Function to create a countdown for the current product
    function createCountdown(targetDate) {
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                if (document.getElementById("countdown")) {
                    document.getElementById("countdown").innerHTML = "EXPIRED";
                }
                return; // stop updating after expiration
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (document.getElementById("days")) {
                document.getElementById("days").innerText = String(days).padStart(2, "0");
            }
            if (document.getElementById("hours")) {
                document.getElementById("hours").innerText = String(hours).padStart(2, "0");
            }
            if (document.getElementById("minutes")) {
                document.getElementById("minutes").innerText = String(minutes).padStart(2, "0");
            }
            if (document.getElementById("seconds")) {
                document.getElementById("seconds").innerText = String(seconds).padStart(2, "0");
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown();

        return countdownInterval;
    }

    // Set the target date for Valentine's Day (February 14th, midnight)
    const valentinesDay = new Date(2025, 1, 14, 0, 0, 0).getTime();

    // Create the initial countdown
    const countdownInterval = createCountdown(valentinesDay);

    // Update the product every 5 seconds
    setInterval(function () {
        currentProductIndex = (currentProductIndex + 1) % products.length; // Cycle through products
        updateProduct(); // Update the product details
    }, 5000); // 5 seconds

    // Initialize the first product
    updateProduct();

    // Messages for the marquee
    const messages = [
        "🎉 Celebrate Love This Valentine’s Day! Shop Our Exclusive Collection Now ❤️",
        "💝 Hurry! Limited Stock Available on Our Romantic Gifts 💝",
        "🚀 Special Discounts for Valentine's Day - Don't Miss Out! 💖"
    ];

    let currentMessageIndex = 0;
    const marqueeText = document.getElementById("marquee-text");

    function updateMarquee() {
        marqueeText.innerHTML = messages[currentMessageIndex];
        currentMessageIndex = (currentMessageIndex + 1) % messages.length;
    }

    setInterval(updateMarquee, 10000); // Change text every 10 seconds
    updateMarquee(); // Initial call
});