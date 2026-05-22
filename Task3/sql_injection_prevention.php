<?php
// -------------------------------
// VULNERABLE CODE (SQL Injection)
// -------------------------------

$id = $_GET['id'];

$query = "SELECT first_name, last_name 
FROM users 
WHERE user_id = '$id'";

// Unsafe query execution
$result = mysqli_query($conn, $query);


// ----------------------------------------
// SECURE CODE (Prepared Statements Fix)
// ----------------------------------------

$id = $_GET['id'];

// Prepare SQL statement
$stmt = $conn->prepare(
    "SELECT first_name, last_name 
     FROM users 
     WHERE user_id = ?"
);

// Bind parameter safely
$stmt->bind_param("i", $id);

// Execute query
$stmt->execute();

// Get result
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
    echo $row['first_name'] . " " . $row['last_name'];
}
?>
