<?php
// ------------------------
// VULNERABLE CODE
// ------------------------

echo $_GET['name'];


// ------------------------
// SECURE CODE - Method 1
// htmlspecialchars()
// ------------------------

echo htmlspecialchars(
    $_GET['name'],
    ENT_QUOTES,
    'UTF-8'
);


// ------------------------
// SECURE CODE - Method 2
// strip_tags()
// ------------------------

echo strip_tags($_GET['name']);


// ------------------------
// SECURE CODE - Method 3
// Content Security Policy
// ------------------------

header(
"Content-Security-Policy: default-src 'self'; script-src 'self'"
);
?><?php
// Vulnerable code
echo $_GET['name'];

// Secure code using htmlspecialchars
echo htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');

// Another secure method
echo strip_tags($_GET['name']);
?>
