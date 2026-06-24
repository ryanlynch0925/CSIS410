<?php
function cleanOutput($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function formatMoney($amount) {
    return "$" . number_format($amount, 2);
}

function getProductById($productId, $products) {
    if (isset($products[$productId])) {
        return $products[$productId];
    } else {
        return false;
    }
}

function calculateCartSubtotal($cart, $products) {
    $subtotal = 0;

    foreach ($cart as $productId => $quantity) {
        if (isset($products[$productId])) {
            $price = $products[$productId]["price"];
            $subtotal = $subtotal + ($price * $quantity);
        }
    }

    return $subtotal;
}

function calculateTax($subtotal) {
    $taxRate = 0.07;
    return $subtotal * $taxRate;
}

function calculateCartTotal($subtotal, $tax) {
    return $subtotal + $tax;
}

function calculateCartItemCount($cart) {
    $itemCount = 0;

    foreach ($cart as $productId => $quantity) {
        $itemCount = $itemCount + $quantity;
    }

    return $itemCount;
}

function isLoggedIn() {
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
        return true;
    } else {
        return false;
    }
}

function userHasRole($role) {
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["role"]) && $_SESSION["role"] === $role) {
        return true;
    } else {
        return false;
    }
}

function userHasAnyRole($allowedRoles) {
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["role"])) {
        foreach ($allowedRoles as $role) {
            if ($_SESSION["role"] === $role) {
                return true;
            }
        }
    }

    return false;
}

function passwordIsStrong($password) {
    $hasLength = strlen($password) >= 8;
    $hasUppercase = preg_match("/[A-Z]/", $password);
    $hasLowercase = preg_match("/[a-z]/", $password);
    $hasNumber = preg_match("/[0-9]/", $password);
    $hasSpecial = preg_match("/[^A-Za-z0-9]/", $password);

    if ($hasLength && $hasUppercase && $hasLowercase && $hasNumber && $hasSpecial) {
        return true;
    } else {
        return false;
    }
}

function emailIsValidBasic($email) {
    if (strpos($email,"@") !== false) {
        return true;
    } else {
        return false;
    }
}

function numbersOnly($value) {
    if (ctype_digit($value)) {
        return true;
    } else {
        return false;
    }
}