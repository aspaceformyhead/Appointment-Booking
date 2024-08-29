<?php
session_start();
include 'database.php'; // include your database connection file

$database=new Database();
$conn=$database->getConn() ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['logEmail'];
    $password = $_POST['password'];

    // Query the database for the user
    $query = "SELECT * FROM customers WHERE c_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$email]);
    $user= $stmt->fetch(PDO::FETCH_ASSOC);  
    echo $password;
    if ($user) {

        // Verify the password
        if ($password=$user['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user['c_id'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: ../../home/pages/admin.php");
            } else {
                header("Location: ../../home/homepg.php");
            }
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }
}

