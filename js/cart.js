// Add event listeners for card hover and hover out
document.querySelectorAll('.card').forEach(function (card) {
    card.addEventListener('mouseenter', function () {
        // Hide buttons on other cards
        document.querySelectorAll('.card .btn').forEach(function (button) {
            button.classList.add('d-none');
        });

        // Show buttons on the hovered card
        card.querySelectorAll('.btn').forEach(function (button) {
            button.classList.remove('d-none');
        });
    });

    card.addEventListener('mouseleave', function () {
        // Hide buttons on mouse leave
        card.querySelectorAll('.btn').forEach(function (button) {
            button.classList.add('d-none');
        });
    });
});
 // Handle click event on cart icon
        document.getElementById('cart-icon').addEventListener('click', function() {
            // Redirect to cart.php
            window.location.href = './cart';
        });

        // Add event listener for Add to Cart buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevents the click event from bubbling up to the cart icon
                const name = button.dataset.name;
                const cost = parseFloat(button.dataset.cost);
                // const image_path = button.closest('.card').querySelector('.card-img-top').src; // Get the image path from the closest card
                // Add product to cart
                addToCart(name, cost);
                updateCartCount(); // Update cart count on the icon
            });
        });

        // Function to add item to cart
        function addToCart(name, cost, image_path) {
            // Send product data to cart.php
            fetch(`cart.php?action=add&name=${name}&cost=${cost}&image_path=${encodeURIComponent(image_path)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to add item to cart');
                    }
                    // Update cart count after adding the item
                    document.getElementById('cart-count').textContent = parseInt(document.getElementById('cart-count').textContent) + 1;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Function to update cart count on the icon
        function updateCartCount() {
            fetch('./cart.php?action=count')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.count;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }