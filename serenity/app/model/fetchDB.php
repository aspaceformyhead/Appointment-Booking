<?php
include 'database.php'; // Ensure this file creates a PDO instance named $pdo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['Address'];
    $email = $_POST['signup-email'];
    $password = $_POST['signup-password'];
    $confirmPassword = $_POST['signup-confirm-password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL statement
    $sql = "INSERT INTO customers (c_Fname, c_Lname, c_Phone, c_email, c_Address, password, acc_created)
            VALUES ('$firstName', '$lastName', '$phone', '$email', '$address', '$hashedPassword', NOW())";

    // Execute the SQL statement
    $pdo->exec($sql);

    // Output a success message
    echo "User registered successfully.";
}

