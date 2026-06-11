        <?php
        session_start();


        require('./includephp/cart.inc.php'); 

        $is_logged_in = isset($_SESSION['user_id']);

        if (isset($_GET['action']) && isset($_GET['index'])) {
            $index = (int)$_GET['index'];

            if ($_GET['action'] === 'increase' && isset($_SESSION['cart'][$index])) {
                $_SESSION['cart'][$index]['quantity']++;
            }

            if ($_GET['action'] === 'decrease' && isset($_SESSION['cart'][$index])) {
                if ($_SESSION['cart'][$index]['quantity'] > 1) {
                    $_SESSION['cart'][$index]['quantity']--;
                } else {
                    unset($_SESSION['cart'][$index]); // Optional: remove if quantity < 1
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // reindex
                }
            }

            header("Location: cart.php");
            exit;
        }
        //require('./includephp/cart.inc.php');
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cart</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
            
        </head>
        <?php include 'greatings.php'; ?>
        <body>
        <div class="container mt-4">
            <h2>Cart</h2>
            <div class="row">
                <!-- Left side: Cart items (8/12) -->
                <div class="col-md-6">
                    <?php if (!empty($_SESSION['cart'])) : ?>
                        <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                            <div class="card mb-3">
                            <div class="card-body">
                            <?php if (!empty($item['image'])) : ?>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" 
                                class="img-fluid mb-2" style="max-height: 150px;">
                            <?php endif; ?>
                            <h5 class="card-title"><?= $item['name'] ?></h5>
                            <p class="card-text">Price: Ksh <?= $item['cost'] ?></p>
                            <p class="card-text">
                                <a href="cart.php?action=remove&index=<?= $index ?>" class="btn btn-danger btn-sm me-5">Remove</a>
                                <a href="cart.php?action=decrease&index=<?= $index ?>" class="btn btn-outline-secondary btn-sm ms-5">−</a>
                                <span class="mx-2"><?= $item['quantity'] ?? 1 ?></span>
                                <a href="cart.php?action=increase&index=<?= $index ?>" class="btn btn-outline-secondary btn-sm">+</a>
                                <hr>
                            </p>
                        </div>

                        </div>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-warning">No items in the cart</div>
                    <?php endif; ?>
                </div>

                <!-- Right side: Total & Checkout (4/12) -->
                <div class="col-md-6">
                    <div class="card p-3 bg-white shadow-sm" style="min-width: 100%;">
                        <h4 class="mb-3" style="color: gold;">CART SUMMARY <hr></h4>
                        <p style="color: red;">Sub-Total: <strong>Ksh <span style="color: red;" id="total"><?= $total ?><hr></span></strong></p>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <a href="shopwindows.php" class="btn btn-info flex-fill">Back Shopping</a>

                            <?php if ($is_logged_in): ?>
                                <form method="POST" action="checkout.php" class="flex-fill">
                                    <input type="hidden" name="total" value="<?= $total ?>" />
                                    <button type="submit" class="btn btn-success w-100">Checkout</button>
                                </form>
                            <?php else: ?>
                                <button type="button" class="btn btn-success flex-fill" id="triggerLogin">Checkout</button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>



            <!-- Bootstrap JS and Popper.js -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <script>
                document.getElementById('triggerLogin')?.addEventListener('click', function () {
                    const modal = new bootstrap.Modal(document.getElementById('authModal'));
                    modal.show();
                });
            </script>
                    <?php include 'partials/login-register-modal.php'; ?>
        </body>

        </html>