<?php
session_start();

// Generate CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] =
        bin2hex(random_bytes(32));
}

// Form
?>

<form method="POST">
    <input type="password"
           name="password_new"
           placeholder="New Password">

    <input type="hidden"
           name="csrf_token"
           value="<?php
           echo $_SESSION['csrf_token'];
           ?>">

    <input type="submit"
           value="Change Password">
</form>

<?php

// Validate token
if (isset($_POST['password_new'])) {

    if (
        $_POST['csrf_token']
        ===
        $_SESSION['csrf_token']
    ) {

        echo "Password changed safely!";

    } else {

        die("CSRF attack detected!");

    }
}
?>
