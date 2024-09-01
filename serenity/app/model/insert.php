<?php
session_start();
include 'database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = new Database();
$conn = $database->getConn();

function signUp($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['signup-email'];
        $phone = $_POST['phone'];
        $address = $_POST['Address'];
        $password = $_POST['signup-password'];
        $conf_password = $_POST['signup-confirm-password'];

        if ($password !== $conf_password) {
            return "Passwords do not match.";
        }
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $check = "SELECT * FROM customers WHERE c_email = ?";
        $stmt = $conn->prepare($check);
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            return 'User already exists';
        } else {
            $insert = "INSERT INTO customers (username, c_email, c_Phone, c_Address, acc_created, password, role) 
                       VALUES (?, ?, ?, ?, NOW(), ?, 'guest')";
            $insertStmt = $conn->prepare($insert);

            try {
                $result = $insertStmt->execute([$username, $email, $phone, $address, $hashed_password]);

                if ($result) {
                    header("Location: ../../home/pages/form.php");
                    exit();
                } else {
                    return "Insertion failed.";
                }
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $message = signUp($conn);
    if ($message) {
        echo $message;
    }
}
