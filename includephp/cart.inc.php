<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    if (isset($_GET['name']) && isset($_GET['cost'])) {
        $name = $_GET['name'];
        $cost = $_GET['cost'];
        $image = isset($_GET['image_path']) ? $_GET['image_path'] : '';
        $found = false;

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] === $name) {
                $item['quantity'] = isset($item['quantity']) ? $item['quantity'] + 1 : 2;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = [
                'name' => $name,
                'cost' => $cost,
                'image' => $image,
                'quantity' => 1
            ];
        }
    }
}

// Remove from cart
if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    if (isset($_GET['index'])) {
        $index = (int)$_GET['index'];
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $qty = isset($item['quantity']) ? $item['quantity'] : 1;
    $total += $item['cost'] * $qty;
}
