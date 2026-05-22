<?php
// VULNERABLE CODE
$page = $_GET['page'];
include($page);


// SECURE CODE (Whitelist)
$allowed_pages = [
    'file1.php',
    'file2.php',
    'file3.php'
];

$page = $_GET['page'];

if (in_array($page, $allowed_pages)) {
    include($page);
} else {
    die("Access denied!");
}
?>
