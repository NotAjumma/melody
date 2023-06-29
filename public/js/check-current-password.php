<?php


$currentPassword = $_POST["current_password"];
$db_password = $_POST["db_password"];
$username = $_POST["username"];




// $dbPassword = $session->get('password');
// $username = $session->get('username');

// $userModel = new UserModel(); // Replace with your actual user model
// $user = $userModel->find($username);

if (password_verify($currentPassword, $db_password)) {
    // Current password is correct
    $response = ['valid' => true];
} else {
    // Current password is incorrect
    $response = ['valid' => false];
}

// Send the JSON response
header("Content-Type: application/json");
echo json_encode($response);
